@extends('layouts.app')

@section('title', 'Order Placed - Ocean Delight Karachi')

@section('content')

<div class="container" style="padding-top: 3rem; padding-bottom: 4rem; max-width: 800px;">
    <div class="card-box" style="text-align: center; padding: 3rem 2rem;">
        <div style="width: 70px; height: 70px; background-color: #D1FAE5; color: #065F46; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 2.2rem; margin-bottom: 1.25rem;">
            ✓
        </div>

        <h1 style="font-family: var(--font-heading); font-size: 2.25rem; color: var(--color-ocean-dark); margin-bottom: 0.5rem;">
            Thank You! Your Order is Confirmed
        </h1>
        <p style="color: var(--color-text-muted); font-size: 1.05rem; margin-bottom: 2rem;">
            We have received your seafood order and our Karachi delivery team is preparing it now.
        </p>

        <!-- Order Info Card -->
        <div style="background-color: var(--color-bg-light); border: 1px solid var(--color-border); border-radius: var(--radius-md); padding: 1.5rem; text-align: left; margin-bottom: 2rem;">
            <div style="display: flex; justify-content: space-between; border-bottom: 1px solid var(--color-border); padding-bottom: 1rem; margin-bottom: 1rem; flex-wrap: wrap; gap: 0.5rem;">
                <div>
                    <span style="font-size: 0.825rem; color: var(--color-text-muted); display: block;">Order Number</span>
                    <strong style="font-size: 1.15rem; color: var(--color-ocean-blue);">#{{ $order->order_number }}</strong>
                </div>
                <div>
                    <span style="font-size: 0.825rem; color: var(--color-text-muted); display: block;">Status</span>
                    <span class="stock-badge badge-pending">{{ $order->order_status }}</span>
                </div>
                <div>
                    <span style="font-size: 0.825rem; color: var(--color-text-muted); display: block;">Payment</span>
                    <strong style="color: var(--color-ocean-dark);">Cash on Delivery</strong>
                </div>
            </div>

            <!-- Itemized Table -->
            <table class="cart-table" style="margin-bottom: 1rem;">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product_name }} ({{ $item->weight_unit }})</td>
                            <td>{{ $item->quantity }}</td>
                            <td>PKR {{ number_format($item->line_total, 0) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="display: flex; justify-content: space-between; font-size: 0.9rem; margin-bottom: 0.4rem;">
                <span>Subtotal:</span>
                <span>PKR {{ number_format($order->subtotal, 0) }}</span>
            </div>
            <div style="display: flex; justify-content: space-between; font-size: 0.9rem; margin-bottom: 0.4rem;">
                <span>Delivery Fee (Karachi):</span>
                <span>PKR {{ number_format($order->delivery_fee, 0) }}</span>
            </div>
            <div style="display: flex; justify-content: space-between; font-size: 1.15rem; font-weight: 700; color: var(--color-ocean-dark); border-top: 1px solid var(--color-border); padding-top: 0.6rem;">
                <span>Total Amount Payable:</span>
                <span style="color: var(--color-ocean-blue);">PKR {{ number_format($order->grand_total, 0) }}</span>
            </div>

            <div style="margin-top: 1.25rem; border-top: 1px dashed var(--color-border); padding-top: 1rem; font-size: 0.875rem;">
                <strong>📍 Delivery Destination:</strong> {{ $order->customer_name }} — {{ $order->delivery_address }}, {{ $order->delivery_area }} (Tel: {{ $order->customer_phone }})
            </div>
        </div>

        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('account.order.show', $order->id) }}" class="btn btn-ocean">
                📋 View Order Status
            </a>
            <a href="{{ route('products.index') }}" class="btn btn-outline-white" style="color: var(--color-ocean-dark); border-color: var(--color-border);">
                &larr; Continue Shopping
            </a>
        </div>
    </div>
</div>

@endsection
