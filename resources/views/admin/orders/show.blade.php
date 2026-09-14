@extends('layouts.admin')

@section('title', 'Manage Order #' . $order->order_number . ' - Admin Ocean Delight')
@section('page_title', 'Order #' . $order->order_number)

@section('content')

<div style="margin-bottom: 1.25rem;">
    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-ocean">&larr; Back to All Orders</a>
</div>

<div class="admin-card" style="margin-bottom: 1.5rem;">
    <div class="admin-card-header">
        <div>
            <h3 class="admin-card-title">Order Status Workflow</h3>
            <p style="color: var(--color-text-muted); font-size: 0.85rem; margin-top: 0.25rem;">Current Status: <span class="admin-badge info">{{ $order->order_status }}</span></p>
        </div>
    </div>

    <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" style="display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;">
        @csrf
        <label for="order_status" style="font-weight: 700; font-size: 0.9rem;">Update Order Status:</label>
        <select name="order_status" id="order_status" class="form-control" style="max-width: 240px;">
            @foreach($statuses as $st)
                <option value="{{ $st }}" {{ $order->order_status == $st ? 'selected' : '' }}>{{ $st }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-ocean btn-sm">Update Status</button>
    </form>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 1.5rem;">
    <!-- Order Line Items -->
    <div class="admin-card">
        <h3 class="admin-card-title" style="margin-bottom: 1rem;">Seafood Items Ordered</h3>
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Unit Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>
                                <strong>{{ $item->product_name }}</strong>
                                <div style="font-size: 0.75rem; color: var(--color-text-muted);">{{ $item->weight_unit }}</div>
                            </td>
                            <td>PKR {{ number_format($item->unit_price, 0) }}</td>
                            <td>{{ $item->quantity }} kg</td>
                            <td style="font-weight: 700; color: var(--color-ocean-blue);">PKR {{ number_format($item->line_total, 0) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="margin-top: 1.25rem; max-width: 320px; margin-left: auto;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.9rem;">
                <span>Items Subtotal:</span>
                <strong>PKR {{ number_format($order->subtotal, 0) }}</strong>
            </div>
            <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.9rem;">
                <span>Cold-Chain Delivery:</span>
                <strong>PKR {{ number_format($order->delivery_fee, 0) }}</strong>
            </div>
            <div style="border-top: 2px solid var(--color-border); padding-top: 0.65rem; display: flex; justify-content: space-between; font-size: 1.15rem; font-weight: 700; color: var(--color-ocean-dark);">
                <span>Grand Total (COD):</span>
                <span style="color: var(--color-ocean-blue);">PKR {{ number_format($order->grand_total, 0) }}</span>
            </div>
        </div>
    </div>

    <!-- Dispatch & Delivery Address -->
    <div class="admin-card">
        <h3 class="admin-card-title" style="margin-bottom: 1rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.65rem;">
            Delivery Address & Contact
        </h3>

        <div style="display: flex; flex-direction: column; gap: 0.85rem; font-size: 0.9rem;">
            <div>
                <span style="color: var(--color-text-muted); font-size: 0.75rem; text-transform: uppercase; font-weight: 700; display: block;">Recipient Name</span>
                <strong style="font-size: 1rem; color: var(--color-ocean-dark);">{{ $order->customer_name }}</strong>
            </div>

            <div>
                <span style="color: var(--color-text-muted); font-size: 0.75rem; text-transform: uppercase; font-weight: 700; display: block;">Phone Number</span>
                <strong style="color: var(--color-ocean-blue);">{{ $order->customer_phone }}</strong>
            </div>

            <div>
                <span style="color: var(--color-text-muted); font-size: 0.75rem; text-transform: uppercase; font-weight: 700; display: block;">Email</span>
                <strong>{{ $order->customer_email }}</strong>
            </div>

            <div>
                <span style="color: var(--color-text-muted); font-size: 0.75rem; text-transform: uppercase; font-weight: 700; display: block;">Karachi Delivery Area</span>
                <span class="admin-badge secondary">{{ $order->delivery_area }}</span>
            </div>

            <div>
                <span style="color: var(--color-text-muted); font-size: 0.75rem; text-transform: uppercase; font-weight: 700; display: block;">Street Address</span>
                <strong>{{ $order->delivery_address }}</strong>
            </div>

            @if($order->order_notes)
                <div style="background-color: #F8FAFC; padding: 0.85rem; border-radius: var(--radius-md); border: 1px solid var(--color-border);">
                    <span style="color: var(--color-text-muted); font-size: 0.75rem; font-weight: 700; display: block;">Special Preparation / Cleaning Notes</span>
                    <span>{{ $order->order_notes }}</span>
                </div>
            @endif

            <div style="border-top: 1px solid var(--color-border); padding-top: 0.75rem; margin-top: 0.25rem;">
                <span style="color: var(--color-text-muted); font-size: 0.75rem; text-transform: uppercase; font-weight: 700; display: block;">Payment Terms</span>
                <span class="admin-badge success">Cash on Delivery</span>
            </div>
        </div>
    </div>
</div>

@endsection
