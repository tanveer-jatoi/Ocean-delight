<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        
        // Recalculate totals dynamically from latest database prices
        $subtotal = 0;
        $cartItems = [];

        foreach ($cart as $id => $item) {
            $product = Product::active()->find($id);
            if ($product) {
                $qty = min($item['quantity'], $product->stock);
                if ($qty > 0) {
                    $lineTotal = $product->price * $qty;
                    $subtotal += $lineTotal;

                    $cartItems[$id] = [
                        'product_id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug,
                        'price' => (float) $product->price,
                        'weight_unit' => $product->weight_unit,
                        'image' => $product->image,
                        'stock' => $product->stock,
                        'quantity' => $qty,
                        'line_total' => $lineTotal,
                    ];
                }
            }
        }

        // Save refreshed cart back to session
        session()->put('cart', $cartItems);

        $deliveryFee = (float) (Setting::getByKey('delivery_fee', 250));
        $minOrderAmount = (float) (Setting::getByKey('min_order_amount', 1000));
        $grandTotal = $subtotal > 0 ? $subtotal + $deliveryFee : 0;

        return view('cart.index', compact('cartItems', 'subtotal', 'deliveryFee', 'minOrderAmount', 'grandTotal'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1|max:50',
        ]);

        $product = Product::active()->findOrFail($request->product_id);

        if ($product->stock < 1) {
            return back()->with('error', 'Sorry, ' . $product->name . ' is currently out of stock.');
        }

        $cart = session()->get('cart', []);
        $currentQty = isset($cart[$product->id]) ? $cart[$product->id]['quantity'] : 0;
        $newQty = $currentQty + (int) $request->quantity;

        if ($newQty > $product->stock) {
            return back()->with('error', 'Only ' . $product->stock . ' kg available in stock for ' . $product->name);
        }

        $cart[$product->id] = [
            'product_id' => $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'price' => (float) $product->price,
            'weight_unit' => $product->weight_unit,
            'image' => $product->image,
            'stock' => $product->stock,
            'quantity' => $newQty,
            'line_total' => $product->price * $newQty,
        ];

        session()->put('cart', $cart);

        if ($request->wantsJson()) {
            $totalCount = array_sum(array_column($cart, 'quantity'));
            return response()->json([
                'success' => true,
                'message' => $product->name . ' added to your shopping cart!',
                'cart_count' => $totalCount,
            ]);
        }

        if ($request->has('buy_now')) {
            return redirect()->route('checkout.index');
        }

        return back()->with('success', $product->name . ' added to your shopping cart!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:0|max:50',
        ]);

        $cart = session()->get('cart', []);
        $productId = $request->product_id;

        if (isset($cart[$productId])) {
            $quantity = (int) $request->quantity;
            $product = Product::find($productId);

            if ($quantity <= 0) {
                unset($cart[$productId]);
                session()->put('cart', $cart);
                return back()->with('info', 'Item removed from cart.');
            }

            if ($product && $quantity > $product->stock) {
                return back()->with('error', 'Only ' . $product->stock . ' kg available in stock.');
            }

            $cart[$productId]['quantity'] = $quantity;
            $cart[$productId]['line_total'] = $cart[$productId]['price'] * $quantity;
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Cart updated successfully.');
    }

    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
        ]);

        $cart = session()->get('cart', []);
        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Item removed from cart.');
    }

    public function clear()
    {
        session()->forget('cart');
        return back()->with('info', 'Cart cleared successfully.');
    }
}
