<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\ContactMessage;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalSales = Order::where('order_status', '!=', 'Cancelled')->sum('grand_total');
        $totalOrders = Order::count();
        $pendingOrders = Order::where('order_status', 'Pending')->count();
        $deliveredOrders = Order::where('order_status', 'Delivered')->count();
        $cancelledOrders = Order::where('order_status', 'Cancelled')->count();
        
        $totalCustomers = User::where('role', 'customer')->count();
        $totalProducts = Product::count();
        $lowStockProducts = Product::where('stock', '<=', 5)->get();

        $recentOrders = Order::with('user')->orderBy('created_at', 'desc')->take(7)->get();
        $recentCustomers = User::where('role', 'customer')->orderBy('created_at', 'desc')->take(5)->get();
        $unreadMessagesCount = ContactMessage::where('is_read', false)->count();

        return view('admin.dashboard', compact(
            'totalSales', 'totalOrders', 'pendingOrders', 'deliveredOrders', 'cancelledOrders',
            'totalCustomers', 'totalProducts', 'lowStockProducts', 'recentOrders', 'recentCustomers', 'unreadMessagesCount'
        ));
    }
}
