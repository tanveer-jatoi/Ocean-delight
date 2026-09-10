<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'delivery_fee' => 'required|numeric|min:0',
            'min_order_amount' => 'required|numeric|min:0',
            'supported_areas' => 'required|string',
            'contact_phone' => 'required|string',
            'contact_email' => 'required|email',
            'contact_address' => 'required|string',
        ]);

        Setting::setByKey('delivery_fee', $request->delivery_fee, 'delivery');
        Setting::setByKey('min_order_amount', $request->min_order_amount, 'delivery');
        Setting::setByKey('supported_areas', $request->supported_areas, 'delivery');
        Setting::setByKey('contact_phone', $request->contact_phone, 'contact');
        Setting::setByKey('contact_email', $request->contact_email, 'contact');
        Setting::setByKey('contact_address', $request->contact_address, 'contact');

        return back()->with('success', 'Website delivery & store settings updated successfully!');
    }
}
