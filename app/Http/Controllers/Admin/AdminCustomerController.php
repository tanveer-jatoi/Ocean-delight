<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'customer')->withCount('orders');

        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $customers = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.customers.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = User::where('role', 'customer')->with(['orders' => function ($q) {
            $q->orderBy('created_at', 'desc');
        }])->findOrFail($id);

        return view('admin.customers.show', compact('customer'));
    }

    public function toggleStatus($id)
    {
        $customer = User::where('role', 'customer')->findOrFail($id);
        $customer->is_active = !$customer->is_active;
        $customer->save();

        $statusMsg = $customer->is_active ? 'activated' : 'deactivated';
        return back()->with('success', "Customer account {$customer->name} has been {$statusMsg}.");
    }
}
