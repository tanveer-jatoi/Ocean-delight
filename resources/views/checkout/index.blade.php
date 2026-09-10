@extends('layouts.app')

@section('title', 'Checkout - Ocean Delight Karachi')

@section('content')

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <!-- Breadcrumb -->
    <div style="margin-bottom: 1.5rem; font-size: 0.875rem; color: var(--color-text-muted);">
        <a href="{{ route('home') }}">Home</a> &nbsp;/&nbsp;
        <a href="{{ route('cart.index') }}">Cart</a> &nbsp;/&nbsp;
        <strong style="color: var(--color-ocean-dark);">Checkout</strong>
    </div>

    <h1 class="section-title" style="margin-bottom: 1.5rem;">Karachi Delivery Checkout</h1>

    <div class="checkout-grid">
        <!-- Customer Delivery Details Form -->
        <div class="card-box">
            <h3 style="font-family: var(--font-heading); font-size: 1.35rem; margin-bottom: 1.5rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.75rem;">
                1. Delivery & Address Information
            </h3>

            <form action="{{ route('checkout.process') }}" method="POST" id="checkoutForm">
                @csrf

                <div style="grid-template-columns: 1fr 1fr; gap: 1rem; display: grid;">
                    <div class="form-group">
                        <label for="customer_name" class="form-label">Full Name *</label>
                        <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ old('customer_name', $user->name) }}" required>
                        @error('customer_name') <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="customer_phone" class="form-label">Phone Number (Karachi) *</label>
                        <input type="text" name="customer_phone" id="customer_phone" class="form-control" value="{{ old('customer_phone', $user->phone) }}" placeholder="+923001234567" required>
                        @error('customer_phone') <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="customer_email" class="form-label">Email Address *</label>
                    <input type="email" name="customer_email" id="customer_email" class="form-control" value="{{ old('customer_email', $user->email) }}" required>
                    @error('customer_email') <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="delivery_area" class="form-label">Karachi Delivery Area / Locality *</label>
                    <select name="delivery_area" id="delivery_area" class="form-control" required>
                        <option value="">-- Select Your Karachi Locality --</option>
                        @foreach($karachiAreas as $area)
                            <option value="{{ $area }}" {{ (old('delivery_area', $user->area) == $area || str_contains($user->area, $area)) ? 'selected' : '' }}>
                                {{ $area }}
                            </option>
                        @endforeach
                    </select>
                    @error('delivery_area') <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="delivery_address" class="form-label">Complete Delivery Street Address *</label>
                    <textarea name="delivery_address" id="delivery_address" rows="3" class="form-control" placeholder="House/Flat No., Building/Street Name, Landmark" required>{{ old('delivery_address', $user->address) }}</textarea>
                    @error('delivery_address') <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="order_notes" class="form-label">Order & Seafood Preparation Notes (Optional)</label>
                    <textarea name="order_notes" id="order_notes" rows="2" class="form-control" placeholder="Special cleaning preferences (e.g. Cut into steaks, fillet, whole clean), gate code, or delivery instructions">{{ old('order_notes') }}</textarea>
                </div>

                <!-- Payment Method Section -->
                <div style="margin-top: 2rem; border-top: 1px solid var(--color-border); padding-top: 1.5rem;">
                    <h3 style="font-family: var(--font-heading); font-size: 1.35rem; margin-bottom: 1rem;">
                        2. Payment Method
                    </h3>

                    <div style="border: 2px solid var(--color-ocean-blue); background-color: var(--color-ocean-ice); border-radius: var(--radius-md); padding: 1.25rem; display: flex; align-items: center; justify-content: space-between;">
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <input type="radio" checked disabled style="accent-color: var(--color-ocean-blue); transform: scale(1.3);">
                            <div>
                                <strong style="font-size: 1rem; color: var(--color-ocean-dark);">Cash on Delivery (COD)</strong>
                                <div style="font-size: 0.825rem; color: var(--color-text-muted);">Pay cash to our courier rider upon receiving your fresh seafood package at your Karachi doorstep.</div>
                            </div>
                        </div>
                        <span class="top-bar-badge">Official Method</span>
                    </div>
                </div>

                <div style="margin-top: 2rem;">
                    <button type="submit" class="btn btn-sand btn-block" style="padding: 1rem; font-size: 1.1rem;">
                        ⚡ Confirm & Place Order (Cash on Delivery)
                    </button>
                </div>
            </form>
        </div>

        <!-- Order Summary Drawer -->
        <div>
            <div class="card-box" style="position: sticky; top: 90px;">
                <h3 style="font-family: var(--font-heading); font-size: 1.25rem; margin-bottom: 1rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.75rem;">
                    Items in Order
                </h3>

                <div style="display: flex; flex-direction: column; gap: 0.75rem; max-height: 280px; overflow-y: auto; margin-bottom: 1.25rem; padding-right: 0.25rem;">
                    @foreach($validatedCart as $item)
                        <div style="display: flex; justify-content: space-between; font-size: 0.875rem; border-bottom: 1px dashed var(--color-border); padding-bottom: 0.5rem;">
                            <div>
                                <strong>{{ $item['product']->name }}</strong>
                                <div style="font-size: 0.75rem; color: var(--color-text-muted);">
                                    {{ $item['quantity'] }} x PKR {{ number_format($item['product']->price, 0) }}
                                </div>
                            </div>
                            <strong style="color: var(--color-ocean-dark);">
                                PKR {{ number_format($item['line_total'], 0) }}
                            </strong>
                        </div>
                    @endforeach
                </div>

                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.9rem;">
                    <span>Subtotal:</span>
                    <strong>PKR {{ number_format($subtotal, 0) }}</strong>
                </div>

                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.9rem;">
                    <span>Karachi Delivery Fee:</span>
                    <strong>PKR {{ number_format($deliveryFee, 0) }}</strong>
                </div>

                <div style="border-top: 2px solid var(--color-border); padding-top: 0.75rem; margin-top: 0.75rem; display: flex; justify-content: space-between; font-size: 1.2rem; font-weight: 700; color: var(--color-ocean-dark);">
                    <span>Grand Total:</span>
                    <span style="color: var(--color-ocean-blue);">PKR {{ number_format($grandTotal, 0) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
