<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\Setting;

class AccountController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $recentOrders = Order::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $totalOrdersCount = Order::where('user_id', $user->id)->count();
        $deliveredOrdersCount = Order::where('user_id', $user->id)->where('order_status', 'Delivered')->count();

        $karachiAreas = array_map('trim', explode(',', Setting::getByKey('supported_areas', 'DHA, Clifton, Gulshan-e-Iqbal, PECHS, North Nazimabad, Saddar, Bahria Town, Korangi, Malir, Federal B Area, Defence View, Tariq Road, SMCHS, Bath Island')));

        return view('account.index', compact('user', 'recentOrders', 'totalOrdersCount', 'deliveredOrdersCount', 'karachiAreas'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'area' => 'required|string|max:255',
            'address' => 'required|string|max:500',
        ]);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'area' => $request->area,
            'address' => $request->address,
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match our records.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }
}
