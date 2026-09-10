@extends('layouts.admin')

@section('title', 'Order Management - Admin Ocean Delight')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
    <div>
        <h1 style="font-family: var(--font-heading); font-size: 1.85rem; color: var(--color-ocean-dark);">
            Order Management
        </h1>
        <p style="color: var(--color-text-muted); font-size: 0.9rem;">
            Filter and update customer order status across Karachi delivery routes
        </p>
    </div>
</div>

<div class="card-box" style="margin-bottom: 1.5rem;">
    <form action="{{ route('admin.orders.index') }}" method="GET" style="display: flex; gap: 1rem; flex-wrap: wrap;">
        <input type="text" name="search" class="form-control" style="width: 250px;" placeholder="Search Order # or Customer..." value="{{ request('search') }}">
        
        <select name="status" class="form-control" style="width: 200px;">
            <option value="">All Order Statuses</option>
            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Confirmed" {{ request('status') == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
            <option value="Preparing" {{ request('status') == 'Preparing' ? 'selected' : '' }}>Preparing</option>
            <option value="Out for Delivery" {{ request('status') == 'Out for Delivery' ? 'selected' : '' }}>Out for Delivery</option>
            <option value="Delivered" {{ request('status') == 'Delivered' ? 'selected' : '' }}>Delivered</option>
            <option value="Cancelled" {{ request('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>

        <button type="submit" class="btn btn-ocean btn-sm">Filter</button>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-white btn-sm" style="color: var(--color-text-muted); border-color: var(--color-border);">Reset</a>
    </form>
</div>

<div class="card-box">
    <div style="overflow-x: auto;">
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Karachi Area</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td><strong style="color: var(--color-ocean-blue);">#{{ $order->order_number }}</strong></td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->customer_phone }}</td>
                        <td>{{ $order->delivery_area }}</td>
                        <td style="font-weight: 700; color: var(--color-ocean-dark);">PKR {{ number_format($order->grand_total, 0) }}</td>
                        <td>Cash on Delivery</td>
                        <td>
                            <span class="stock-badge {{ $order->status_badge_class }}">
                                {{ $order->order_status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-sand">
                                View & Update Status
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="margin-top: 1.5rem;">
        {{ $orders->links() }}
    </div>
</div>

@endsection
