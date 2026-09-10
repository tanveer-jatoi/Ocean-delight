@extends('layouts.app')

@section('title', 'Set New Password - Ocean Delight')

@section('content')

<div class="container" style="padding-top: 3rem; padding-bottom: 4rem; max-width: 460px;">
    <div class="card-box">
        <h1 style="font-family: var(--font-heading); font-size: 1.75rem; text-align: center; color: var(--color-ocean-dark); margin-bottom: 0.5rem;">
            Create New Password
        </h1>

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email" class="form-label">Email Address *</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $email ?? old('email') }}" required readonly>
                @error('email') <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">New Password *</label>
                <input type="password" name="password" id="password" class="form-control" required autofocus>
                @error('password') <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm New Password *</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-ocean btn-block" style="padding: 0.85rem; font-size: 1rem; margin-top: 1rem;">
                Reset Password
            </button>
        </form>
    </div>
</div>

@endsection
