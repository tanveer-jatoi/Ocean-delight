@extends('layouts.app')

@section('title', 'Forgot Password - Ocean Delight')

@section('content')

<div class="container" style="padding-top: 3rem; padding-bottom: 4rem; max-width: 460px;">
    <div class="card-box">
        <h1 style="font-family: var(--font-heading); font-size: 1.75rem; text-align: center; color: var(--color-ocean-dark); margin-bottom: 0.5rem;">
            Reset Password
        </h1>
        <p style="text-align: center; color: var(--color-text-muted); font-size: 0.875rem; margin-bottom: 2rem;">
            Enter your email address and we will issue a secure reset link.
        </p>

        @if (session('status'))
            <div class="alert alert-success" style="font-size: 0.85rem;">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Email Address *</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus>
                @error('email') <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-ocean btn-block" style="padding: 0.85rem; font-size: 1rem; margin-top: 1rem;">
                Send Password Reset Link
            </button>
        </form>

        <div style="text-align: center; margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--color-border); font-size: 0.9rem;">
            <a href="{{ route('login') }}" style="color: var(--color-ocean-blue);">&larr; Back to Login</a>
        </div>
    </div>
</div>

@endsection
