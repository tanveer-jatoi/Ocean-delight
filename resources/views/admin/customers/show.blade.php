@extends('layouts.admin')

@section('title', 'Customer Profile - Admin Ocean Delight')

@section('content')

<div style="margin-bottom: 1.5rem;">
    <a href="{{ route('admin.customers.index') }}" style="color: var(--color-ocean-blue); font-size: 0.9rem;">&larr; Back to Customers</a>
    <h1 style="font-family: var(--font-heading); font-size: 1.85rem; color: var(--color-ocean-dark); margin-top: 0.5rem;">
        Customer: {{ $customer->name }}
    </h1>
</div>

<div class="checkout-grid">
    <div class="card-box">
        <h3 style="font-family: var(--font-heading); font-size: 1.25rem; margin-bottom: 1rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.5rem;">
            Order History
        </h3>

        @if($customer->orders->count() > 0)
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customer->orders as $order)
                        <tr>
                            <td><strong style="color: var(--color-ocean-blue);">#{{ $order->order_number }}</strong></td>
                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                            <td>PKR {{ number_format($order->grand_total, 0) }}</td>
                            <td><span class="stock-badge {{ $order->status_badge_class }}">{{ $order->order_status }}</span></td>
                            <td><a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-ocean">Details</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="color: var(--color-text-muted); padding: 1rem 0;">No order history for this customer.</p>
        @endif
    </div>

    <div>
        <div class="card-box">
            <h3 style="font-family: var(--font-heading); font-size: 1.25rem; margin-bottom: 1rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.5rem;">
                Customer Details
            </h3>

            <div style="display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.9rem;">
                <div>
                    <span style="color: var(--color-text-muted); font-size: 0.8rem; display: block;">Full Name</span>
                    <strong>{{ $customer->name }}</strong>
                </div>
                <div>
                    <span style="color: var(--color-text-muted); font-size: 0.8rem; display: block;">Email Address</span>
                    <strong>{{ $customer->email }}</strong>
                </div>
                <div>
                    <span style="color: var(--color-text-muted); font-size: 0.8rem; display: block;">Phone Number</span>
                    <strong>{{ $customer->phone }}</strong>
                </div>
                <div>
                    <span style="color: var(--color-text-muted); font-size: 0.8rem; display: block;">Karachi Area</span>
                    <strong>{{ $customer->area }}</strong>
                </div>
                <div>
                    <span style="color: var(--color-text-muted); font-size: 0.8rem; display: block;">Default Delivery Address</span>
                    <strong>{{ $customer->address }}</strong>
                </div>
                <div>
                    <span style="color: var(--color-text-muted); font-size: 0.8rem; display: block;">Joined On</span>
                    <span>{{ $customer->created_at->format('F d, Y') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
