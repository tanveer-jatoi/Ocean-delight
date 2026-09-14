@extends('layouts.admin')

@section('title', 'Orders Management - Admin Ocean Delight')
@section('page_title', 'Orders Management')

@section('content')

<div class="admin-card" style="margin-bottom: 1.5rem;">
    <div class="admin-card-header">
        <div>
            <h3 class="admin-card-title">Customer Orders & Deliveries</h3>
            <p style="color: var(--color-text-muted); font-size: 0.85rem; margin-top: 0.25rem;">Filter and update order status across Karachi delivery zones</p>
        </div>
    </div>

    <form action="{{ route('admin.orders.index') }}" method="GET" style="display: flex; gap: 1rem; flex-wrap: wrap; align-items: center;">
        <input type="text" name="search" class="form-control" style="max-width: 280px;" placeholder="Search Order # or Customer..." value="{{ request('search') }}">
        
        <select name="status" class="form-control" style="max-width: 220px;">
            <option value="">All Order Statuses</option>
            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Confirmed" {{ request('status') == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
            <option value="Preparing" {{ request('status') == 'Preparing' ? 'selected' : '' }}>Preparing</option>
            <option value="Out for Delivery" {{ request('status') == 'Out for Delivery' ? 'selected' : '' }}>Out for Delivery</option>
            <option value="Delivered" {{ request('status') == 'Delivered' ? 'selected' : '' }}>Delivered</option>
            <option value="Cancelled" {{ request('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>

        <button type="submit" class="btn btn-ocean btn-sm">Filter</button>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-ocean btn-sm">Reset</a>
    </form>
</div>

<div class="admin-card">
    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Area</th>
                    <th>Total</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td><strong style="color: var(--color-ocean-blue);">#{{ $order->order_number }}</strong></td>
                        <td>
                            <div style="font-weight: 600; color: var(--color-ocean-dark);">{{ $order->customer_name }}</div>
                            <div style="font-size: 0.75rem; color: var(--color-text-muted);">{{ $order->created_at ? $order->created_at->format('M d, Y') : 'Recent' }}</div>
                        </td>
                        <td>{{ $order->customer_phone }}</td>
                        <td><span class="admin-badge secondary">{{ $order->delivery_area }}</span></td>
                        <td style="font-weight: 700; color: var(--color-ocean-dark);">PKR {{ number_format($order->grand_total, 0) }}</td>
                        <td><span class="admin-badge info">COD</span></td>
                        <td>
                            <span class="admin-badge {{ $order->order_status === 'Delivered' ? 'success' : ($order->order_status === 'Pending' ? 'warning' : ($order->order_status === 'Cancelled' ? 'danger' : 'info')) }}">
                                {{ $order->order_status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-ocean">
                                Details & Status
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
