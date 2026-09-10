<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('account.orders', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->with('items.product')->firstOrFail();

        // IDOR Security Check: Ensure order belongs to logged-in user unless user is admin
        if ($order->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized access to order details.');
        }

        return view('account.order-detail', compact('order'));
    }
}
