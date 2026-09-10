<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contactPhone = Setting::getByKey('contact_phone', '+92 300 8282363');
        $contactEmail = Setting::getByKey('contact_email', 'support@oceandelight.pk');
        $contactAddress = Setting::getByKey('contact_address', 'Dockyard Road, Near Fishery Wharf, Karachi, Pakistan');

        return view('pages.contact', compact('contactPhone', 'contactEmail', 'contactAddress'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject ?? 'General Inquiry',
            'message' => $request->message,
        ]);

        return back()->with('success', 'Thank you! Your message has been submitted. Our Karachi customer team will contact you shortly.');
    }
}
