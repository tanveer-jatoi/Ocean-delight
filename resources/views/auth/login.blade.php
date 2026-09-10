@extends('layouts.app')

@section('title', 'Login - Ocean Delight')

@section('content')

<div class="container" style="padding-top: 3rem; padding-bottom: 4rem; max-width: 460px;">
    <div class="card-box">
        <h1 style="font-family: var(--font-heading); font-size: 1.85rem; text-align: center; color: var(--color-ocean-dark); margin-bottom: 0.5rem;">
            Customer Login
        </h1>
        <p style="text-align: center; color: var(--color-text-muted); font-size: 0.9rem; margin-bottom: 2rem;">
            Sign in to access your Karachi orders & account
        </p>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Email Address *</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus>
                @error('email') <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <label for="password" class="form-label">Password *</label>
                    <a href="{{ route('password.request') }}" style="font-size: 0.8rem; color: var(--color-ocean-blue);">Forgot password?</a>
                </div>
                <input type="password" name="password" id="password" class="form-control" required>
                @error('password') <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div> @enderror
            </div>

            <div class="form-group" style="display: flex; align-items: center; gap: 0.5rem;">
                <input type="checkbox" name="remember" id="remember" style="accent-color: var(--color-ocean-blue);">
                <label for="remember" style="font-size: 0.875rem; color: var(--color-text-muted);">Remember Me</label>
            </div>

            <button type="submit" class="btn btn-ocean btn-block" style="padding: 0.85rem; font-size: 1rem; margin-top: 1rem;">
                Sign In
            </button>
        </form>

        <div style="text-align: center; margin-top: 1.5rem; padding-top: 1.25rem; border-top: 1px solid var(--color-border); font-size: 0.9rem; color: var(--color-text-muted);">
            Don't have an account? <a href="{{ route('register') }}" style="color: var(--color-ocean-blue); font-weight: 600;">Register Now</a>
        </div>
    </div>
</div>

@endsection
