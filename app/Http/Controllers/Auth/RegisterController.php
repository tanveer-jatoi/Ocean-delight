<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Setting;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        if (auth()->check()) {
            return redirect()->route('account.index');
        }

        $karachiAreas = array_map('trim', explode(',', Setting::getByKey('supported_areas', 'DHA, Clifton, Gulshan-e-Iqbal, PECHS, North Nazimabad, Saddar, Bahria Town, Korangi, Malir, Federal B Area, Defence View, Tariq Road, SMCHS, Bath Island')));

        return view('auth.register', compact('karachiAreas'));
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'area' => $request->area . ', Karachi',
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 'customer',
            'is_active' => true,
        ]);

        Auth::login($user);

        if (session()->has('url.intended')) {
            $intended = session()->get('url.intended');
            session()->forget('url.intended');
            return redirect($intended)->with('success', 'Account created successfully! You are now logged in.');
        }

        return redirect()->route('account.index')->with('success', 'Welcome to Ocean Delight! Your account has been registered successfully.');
    }
}
