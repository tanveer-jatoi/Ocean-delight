<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Setting;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            session(['url.intended' => route('checkout.index')]);
            return redirect()->route('login')->with('warning', 'Please sign in or register an account before proceeding to checkout.');
        }

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('products.index')->with('warning', 'Your shopping cart is currently empty.');
        }

        // Validate stock and recompute subtotal server-side
        $subtotal = 0;
        $validatedCart = [];

        foreach ($cart as $id => $item) {
            $product = Product::active()->find($id);
            if (!$product || $product->stock < 1) {
                unset($cart[$id]);
                session()->put('cart', $cart);
                return redirect()->route('cart.index')->with('error', 'One or more items in your cart are no longer available.');
            }

            $qty = min($item['quantity'], $product->stock);
            $lineTotal = $product->price * $qty;
            $subtotal += $lineTotal;

            $validatedCart[$id] = [
                'product' => $product,
                'quantity' => $qty,
                'line_total' => $lineTotal,
            ];
        }

        $minOrderAmount = (float) (Setting::getByKey('min_order_amount', 1000));
        if ($subtotal < $minOrderAmount) {
            return redirect()->route('cart.index')->with('error', 'Minimum order amount for Karachi delivery is PKR ' . number_format($minOrderAmount, 0));
        }

        $deliveryFee = (float) (Setting::getByKey('delivery_fee', 250));
        $grandTotal = $subtotal + $deliveryFee;

        $user = auth()->user();
        $karachiAreas = array_map('trim', explode(',', Setting::getByKey('supported_areas', 'DHA, Clifton, Gulshan-e-Iqbal, PECHS, North Nazimabad, Saddar, Bahria Town, Korangi, Malir, Federal B Area, Defence View, Tariq Road, SMCHS, Bath Island')));

        return view('checkout.index', compact('user', 'validatedCart', 'subtotal', 'deliveryFee', 'grandTotal', 'karachiAreas'));
    }

    public function process(CheckoutRequest $request)
    {
        $user = auth()->user();
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('products.index')->with('error', 'Your shopping cart is empty.');
        }

        // Server-Side Calculation & Stock Lock Transaction
        try {
            $order = DB::transaction(function () use ($request, $user, $cart) {
                $subtotal = 0;
                $orderItemsData = [];

                foreach ($cart as $id => $item) {
                    $product = Product::where('id', $id)->lockForUpdate()->first();

                    if (!$product || !$product->is_active) {
                        throw new \Exception("Product {$item['name']} is no longer available.");
                    }

                    if ($product->stock < $item['quantity']) {
                        throw new \Exception("Insufficient stock for {$product->name}. Only {$product->stock} kg left.");
                    }

                    $unitPrice = (float) $product->price;
                    $qty = (int) $item['quantity'];
                    $lineTotal = $unitPrice * $qty;
                    $subtotal += $lineTotal;

                    // Deduct stock safely
                    $product->stock -= $qty;
                    $product->save();

                    $orderItemsData[] = [
                        'product_id' => $product->id,
                        'product_name' => $product->name,
                        'weight_unit' => $product->weight_unit,
                        'unit_price' => $unitPrice,
                        'quantity' => $qty,
                        'line_total' => $lineTotal,
                    ];
                }

                $deliveryFee = (float) (Setting::getByKey('delivery_fee', 250));
                $grandTotal = $subtotal + $deliveryFee;

                $orderNumber = 'OD-' . date('Ymd') . '-' . strtoupper(Str::random(5));

                $newOrder = Order::create([
                    'order_number' => $orderNumber,
                    'user_id' => $user->id,
                    'customer_name' => $request->customer_name,
                    'customer_email' => $request->customer_email,
                    'customer_phone' => $request->customer_phone,
                    'delivery_area' => $request->delivery_area . ', Karachi',
                    'delivery_address' => $request->delivery_address,
                    'order_notes' => $request->order_notes,
                    'subtotal' => $subtotal,
                    'delivery_fee' => $deliveryFee,
                    'grand_total' => $grandTotal,
                    'payment_method' => 'Cash on Delivery',
                    'order_status' => 'Pending',
                ]);

                foreach ($orderItemsData as $itemData) {
                    $itemData['order_id'] = $newOrder->id;
                    OrderItem::create($itemData);
                }

                return $newOrder;
            });

            // Clear Cart after successful order
            session()->forget('cart');

            return redirect()->route('checkout.success', $order->order_number)
                ->with('success', 'Order placed successfully! Cash on Delivery confirmed.');

        } catch (\Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function success($orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)
            ->where('user_id', auth()->id())
            ->with('items')
            ->firstOrFail();

        return view('checkout.success', compact('order'));
    }
}
