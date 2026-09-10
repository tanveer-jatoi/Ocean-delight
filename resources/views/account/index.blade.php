@extends('layouts.app')

@section('title', 'My Account - Ocean Delight')

@section('content')

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <!-- Breadcrumb -->
    <div style="margin-bottom: 1.5rem; font-size: 0.875rem; color: var(--color-text-muted);">
        <a href="{{ route('home') }}">Home</a> &nbsp;/&nbsp; <strong style="color: var(--color-ocean-dark);">My Account</strong>
    </div>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
        <div>
            <h1 class="section-title">Welcome, {{ $user->name }}</h1>
            <p class="section-subtitle">Manage your Karachi delivery preferences, address & view past order history</p>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-white" style="color: var(--color-danger); border-color: var(--color-danger);">
                🚪 Sign Out
            </button>
        </form>
    </div>

    <div class="checkout-grid">
        <!-- Profile & Address Update -->
        <div>
            <div class="card-box" style="margin-bottom: 2rem;">
                <h3 style="font-family: var(--font-heading); font-size: 1.25rem; margin-bottom: 1.25rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.75rem;">
                    Personal Profile & Karachi Address
                </h3>

                <form action="{{ route('account.profile.update') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div style="grid-template-columns: 1fr 1fr; gap: 1rem; display: grid;">
                        <div class="form-group">
                            <label class="form-label">Email Address (Read-only)</label>
                            <input type="text" class="form-control" value="{{ $user->email }}" disabled style="background-color: var(--color-bg-light);">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="area" class="form-label">Karachi Area / Locality</label>
                        <select name="area" id="area" class="form-control" required>
                            @foreach($karachiAreas as $area)
                                <option value="{{ $area }}" {{ (old('area', $user->area) == $area || str_contains($user->area, $area)) ? 'selected' : '' }}>
                                    {{ $area }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address" class="form-label">Complete Street Address</label>
                        <textarea name="address" id="address" rows="2" class="form-control" required>{{ old('address', $user->address) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-ocean">Save Changes</button>
                </form>
            </div>

            <!-- Password Change -->
            <div class="card-box">
                <h3 style="font-family: var(--font-heading); font-size: 1.25rem; margin-bottom: 1.25rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.75rem;">
                    Security & Password
                </h3>

                <form action="{{ route('account.password.update') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" name="current_password" id="current_password" class="form-control" required>
                        @error('current_password') <div style="color: var(--color-danger); font-size: 0.8rem;">{{ $message }}</div> @enderror
                    </div>

                    <div style="grid-template-columns: 1fr 1fr; gap: 1rem; display: grid;">
                        <div class="form-group">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                            @error('password') <div style="color: var(--color-danger); font-size: 0.8rem;">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline-white" style="color: var(--color-ocean-dark); border-color: var(--color-border);">Update Password</button>
                </form>
            </div>
        </div>

        <!-- Orders Drawer Summary -->
        <div>
            <div class="card-box" style="position: sticky; top: 90px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.75rem;">
                    <h3 style="font-family: var(--font-heading); font-size: 1.25rem;">My Orders Summary</h3>
                    <a href="{{ route('account.orders') }}" style="font-size: 0.85rem; color: var(--color-ocean-blue); font-weight: 600;">View All &rarr;</a>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                    <div style="background-color: var(--color-bg-light); padding: 1rem; border-radius: var(--radius-sm); text-align: center;">
                        <div style="font-size: 1.75rem; font-weight: 700; color: var(--color-ocean-dark);">{{ $totalOrdersCount }}</div>
                        <div style="font-size: 0.8rem; color: var(--color-text-muted);">Total Orders</div>
                    </div>
                    <div style="background-color: #D1FAE5; padding: 1rem; border-radius: var(--radius-sm); text-align: center;">
                        <div style="font-size: 1.75rem; font-weight: 700; color: #065F46;">{{ $deliveredOrdersCount }}</div>
                        <div style="font-size: 0.8rem; color: #065F46;">Delivered</div>
                    </div>
                </div>

                @if($recentOrders->count() > 0)
                    <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                        @foreach($recentOrders as $order)
                            <a href="{{ route('account.order.show', $order->id) }}" style="display: block; border: 1px solid var(--color-border); border-radius: var(--radius-sm); padding: 0.75rem; transition: var(--transition-fast);" onmouseover="this.style.borderColor='var(--color-ocean-blue)'" onmouseout="this.style.borderColor='var(--color-border)'">
                                <div style="display: flex; justify-content: space-between; font-size: 0.85rem; margin-bottom: 0.3rem;">
                                    <strong style="color: var(--color-ocean-blue);">#{{ $order->order_number }}</strong>
                                    <span class="stock-badge {{ $order->status_badge_class }}" style="font-size: 0.7rem; padding: 0.1rem 0.4rem;">
                                        {{ $order->order_status }}
                                    </span>
                                </div>
                                <div style="display: flex; justify-content: space-between; font-size: 0.8rem; color: var(--color-text-muted);">
                                    <span>{{ $order->created_at->format('M d, Y') }}</span>
                                    <strong style="color: var(--color-ocean-dark);">PKR {{ number_format($order->grand_total, 0) }}</strong>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p style="text-align: center; color: var(--color-text-muted); font-size: 0.9rem; padding: 1.5rem 0;">
                        No orders placed yet.
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
