@extends('layouts.app')

@section('title', 'Register - Ocean Delight')

@section('content')

<div class="container" style="padding-top: 3rem; padding-bottom: 4rem; max-width: 580px;">
    <div class="card-box">
        <h1 style="font-family: var(--font-heading); font-size: 1.85rem; text-align: center; color: var(--color-ocean-dark); margin-bottom: 0.5rem;">
            Create Customer Account
        </h1>
        <p style="text-align: center; color: var(--color-text-muted); font-size: 0.9rem; margin-bottom: 2rem;">
            Register to place seafood orders for Karachi delivery
        </p>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">Full Name *</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="e.g. Tariq Mahmood" required>
                @error('name') <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div> @enderror
            </div>

            <div style="grid-template-columns: 1fr 1fr; gap: 1rem; display: grid;">
                <div class="form-group">
                    <label for="email" class="form-label">Email Address *</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="name@example.com" required>
                    @error('email') <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="phone" class="form-label">Phone Number *</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" placeholder="+923001234567" required>
                    @error('phone') <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="area" class="form-label">Karachi Area / Locality *</label>
                <select name="area" id="area" class="form-control" required>
                    <option value="">-- Select Your Area in Karachi --</option>
                    @foreach($karachiAreas as $area)
                        <option value="{{ $area }}" {{ old('area') == $area ? 'selected' : '' }}>{{ $area }}</option>
                    @endforeach
                </select>
                @error('area') <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="address" class="form-label">Complete Delivery Address *</label>
                <textarea name="address" id="address" rows="2" class="form-control" placeholder="House/Flat No., Street Name, Landmark" required>{{ old('address') }}</textarea>
                @error('address') <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div> @enderror
            </div>

            <div style="grid-template-columns: 1fr 1fr; gap: 1rem; display: grid;">
                <div class="form-group">
                    <label for="password" class="form-label">Password *</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    @error('password') <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password *</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>
            </div>

            <button type="submit" class="btn btn-sand btn-block" style="padding: 0.9rem; font-size: 1rem; margin-top: 1rem;">
                Create Account & Continue
            </button>
        </form>

        <div style="text-align: center; margin-top: 1.5rem; padding-top: 1.25rem; border-top: 1px solid var(--color-border); font-size: 0.9rem; color: var(--color-text-muted);">
            Already have an account? <a href="{{ route('login') }}" style="color: var(--color-ocean-blue); font-weight: 600;">Sign In</a>
        </div>
    </div>
</div>

@endsection
