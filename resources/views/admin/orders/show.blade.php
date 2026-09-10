@extends('layouts.admin')

@section('title', 'Manage Order #' . $order->order_number . ' - Admin Ocean Delight')

@section('content')

<div style="margin-bottom: 1.5rem;">
    <a href="{{ route('admin.orders.index') }}" style="color: var(--color-ocean-blue); font-size: 0.9rem;">&larr; Back to Orders</a>
    <h1 style="font-family: var(--font-heading); font-size: 1.85rem; color: var(--color-ocean-dark); margin-top: 0.5rem;">
        Order Details: #{{ $order->order_number }}
    </h1>
</div>

<div class="checkout-grid">
    <div class="card-box">
        <!-- Status Update Box -->
        <div style="background-color: var(--color-bg-light); padding: 1.25rem; border-radius: var(--radius-sm); margin-bottom: 1.5rem; border: 1px solid var(--color-border);">
            <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" style="display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;">
                @csrf
                <label for="order_status" style="font-weight: 700;">Update Order Status:</label>
                <select name="order_status" id="order_status" class="form-control" style="width: 220px;">
                    @foreach($statuses as $st)
                        <option value="{{ $st }}" {{ $order->order_status == $st ? 'selected' : '' }}>{{ $st }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-ocean">Save New Status</button>
            </form>
        </div>

        <h3 style="font-family: var(--font-heading); font-size: 1.2rem; margin-bottom: 1rem;">Items Ordered</h3>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Unit</th>
                    <th>Unit Price</th>
                    <th>Qty</th>
                    <th>Line Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td><strong>{{ $item->product_name }}</strong></td>
                        <td>{{ $item->weight_unit }}</td>
                        <td>PKR {{ number_format($item->unit_price, 0) }}</td>
                        <td>{{ $item->quantity }} kg</td>
                        <td style="font-weight: 700; color: var(--color-ocean-blue);">PKR {{ number_format($item->line_total, 0) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 1rem; max-width: 300px; margin-left: auto;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 0.4rem;">
                <span>Subtotal:</span>
                <strong>PKR {{ number_format($order->subtotal, 0) }}</strong>
            </div>
            <div style="display: flex; justify-content: space-between; margin-bottom: 0.4rem;">
                <span>Delivery Fee:</span>
                <strong>PKR {{ number_format($order->delivery_fee, 0) }}</strong>
            </div>
            <div style="border-top: 2px solid var(--color-border); padding-top: 0.5rem; display: flex; justify-content: space-between; font-size: 1.15rem; font-weight: 700; color: var(--color-ocean-dark);">
                <span>Grand Total:</span>
                <span style="color: var(--color-ocean-blue);">PKR {{ number_format($order->grand_total, 0) }}</span>
            </div>
        </div>
    </div>

    <!-- Customer Dispatch Address -->
    <div>
        <div class="card-box">
            <h3 style="font-family: var(--font-heading); font-size: 1.2rem; margin-bottom: 1rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.5rem;">
                Dispatch Information
            </h3>

            <div style="display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.9rem;">
                <div>
                    <span style="color: var(--color-text-muted); font-size: 0.8rem; display: block;">Customer Name</span>
                    <strong>{{ $order->customer_name }}</strong>
                </div>

                <div>
                    <span style="color: var(--color-text-muted); font-size: 0.8rem; display: block;">Phone Number</span>
                    <strong>{{ $order->customer_phone }}</strong>
                </div>

                <div>
                    <span style="color: var(--color-text-muted); font-size: 0.8rem; display: block;">Email</span>
                    <strong>{{ $order->customer_email }}</strong>
                </div>

                <div>
                    <span style="color: var(--color-text-muted); font-size: 0.8rem; display: block;">Karachi Delivery Area</span>
                    <strong>{{ $order->delivery_area }}</strong>
                </div>

                <div>
                    <span style="color: var(--color-text-muted); font-size: 0.8rem; display: block;">Full Street Address</span>
                    <strong>{{ $order->delivery_address }}</strong>
                </div>

                @if($order->order_notes)
                    <div style="background-color: var(--color-bg-light); padding: 0.75rem; border-radius: 4px;">
                        <span style="color: var(--color-text-muted); font-size: 0.8rem; display: block;">Order / Cleaning Notes</span>
                        <span>{{ $order->order_notes }}</span>
                    </div>
                @endif

                <div style="border-top: 1px solid var(--color-border); padding-top: 0.75rem; margin-top: 0.5rem;">
                    <span style="color: var(--color-text-muted); font-size: 0.8rem; display: block;">Payment Status</span>
                    <strong style="color: var(--color-ocean-dark);">Cash on Delivery (COD)</strong>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
