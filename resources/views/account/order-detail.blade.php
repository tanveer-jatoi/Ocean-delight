@extends('layouts.app')

@section('title', 'Order #' . $order->order_number . ' - Ocean Delight')

@section('content')

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <!-- Breadcrumb -->
    <div style="margin-bottom: 1.5rem; font-size: 0.875rem; color: var(--color-text-muted);">
        <a href="{{ route('home') }}">Home</a> &nbsp;/&nbsp;
        <a href="{{ route('account.index') }}">My Account</a> &nbsp;/&nbsp;
        <a href="{{ route('account.orders') }}">Orders</a> &nbsp;/&nbsp;
        <strong style="color: var(--color-ocean-dark);">#{{ $order->order_number }}</strong>
    </div>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
        <div>
            <h1 class="section-title">Order #{{ $order->order_number }}</h1>
            <p class="section-subtitle">Placed on {{ $order->created_at->format('F d, Y \a\t h:i A') }}</p>
        </div>
        <div>
            <span class="stock-badge {{ $order->status_badge_class }}" style="font-size: 1rem; padding: 0.5rem 1rem;">
                Current Status: {{ $order->order_status }}
            </span>
        </div>
    </div>

    <div class="checkout-grid">
        <!-- Ordered Items Table -->
        <div class="card-box">
            <h3 style="font-family: var(--font-heading); font-size: 1.25rem; margin-bottom: 1.25rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.75rem;">
                Ordered Seafood Items
            </h3>

            <div style="overflow-x: auto;">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Seafood Item</th>
                            <th>Unit Weight</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>
                                    <strong>{{ $item->product_name }}</strong>
                                </td>
                                <td style="font-size: 0.85rem; color: var(--color-text-muted);">
                                    {{ $item->weight_unit }}
                                </td>
                                <td>PKR {{ number_format($item->unit_price, 0) }}</td>
                                <td>{{ $item->quantity }} kg</td>
                                <td style="font-weight: 700; color: var(--color-ocean-blue);">
                                    PKR {{ number_format($item->line_total, 0) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 1.5rem; max-width: 340px; margin-left: auto; background-color: var(--color-bg-light); padding: 1.25rem; border-radius: var(--radius-md);">
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.9rem;">
                    <span>Subtotal:</span>
                    <strong>PKR {{ number_format($order->subtotal, 0) }}</strong>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.9rem;">
                    <span>Karachi Delivery Fee:</span>
                    <strong>PKR {{ number_format($order->delivery_fee, 0) }}</strong>
                </div>
                <div style="border-top: 2px solid var(--color-border); padding-top: 0.6rem; display: flex; justify-content: space-between; font-size: 1.15rem; font-weight: 700; color: var(--color-ocean-dark);">
                    <span>Grand Total:</span>
                    <span style="color: var(--color-ocean-blue);">PKR {{ number_format($order->grand_total, 0) }}</span>
                </div>
            </div>
        </div>

        <!-- Customer & Delivery Summary Drawer -->
        <div>
            <div class="card-box" style="position: sticky; top: 90px;">
                <h3 style="font-family: var(--font-heading); font-size: 1.25rem; margin-bottom: 1.25rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.75rem;">
                    Delivery Information
                </h3>

                <div style="display: flex; flex-direction: column; gap: 1rem; font-size: 0.9rem;">
                    <div>
                        <span style="color: var(--color-text-muted); display: block; font-size: 0.8rem;">Customer Name:</span>
                        <strong>{{ $order->customer_name }}</strong>
                    </div>

                    <div>
                        <span style="color: var(--color-text-muted); display: block; font-size: 0.8rem;">Phone Number:</span>
                        <strong>{{ $order->customer_phone }}</strong>
                    </div>

                    <div>
                        <span style="color: var(--color-text-muted); display: block; font-size: 0.8rem;">Email Address:</span>
                        <strong>{{ $order->customer_email }}</strong>
                    </div>

                    <div>
                        <span style="color: var(--color-text-muted); display: block; font-size: 0.8rem;">Delivery Area:</span>
                        <strong>{{ $order->delivery_area }}</strong>
                    </div>

                    <div>
                        <span style="color: var(--color-text-muted); display: block; font-size: 0.8rem;">Street Address:</span>
                        <strong>{{ $order->delivery_address }}</strong>
                    </div>

                    @if($order->order_notes)
                        <div style="background-color: var(--color-ocean-ice); padding: 0.75rem; border-radius: var(--radius-sm);">
                            <span style="color: var(--color-ocean-dark); font-weight: 600; display: block; font-size: 0.8rem;">Preparation / Order Notes:</span>
                            <span style="color: var(--color-text-main);">{{ $order->order_notes }}</span>
                        </div>
                    @endif

                    <div style="border-top: 1px solid var(--color-border); padding-top: 0.75rem; margin-top: 0.5rem;">
                        <span style="color: var(--color-text-muted); display: block; font-size: 0.8rem;">Payment Method:</span>
                        <strong style="color: var(--color-ocean-dark); font-size: 1rem;">Cash on Delivery (COD)</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
