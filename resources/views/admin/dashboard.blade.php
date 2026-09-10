@extends('layouts.admin')

@section('title', 'Admin Dashboard - Ocean Delight')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h1 style="font-family: var(--font-heading); font-size: 1.85rem; color: var(--color-ocean-dark);">
            Administrator Dashboard
        </h1>
        <p style="color: var(--color-text-muted); font-size: 0.9rem;">
            Real-time sales performance and order status tracking for Ocean Delight Karachi
        </p>
    </div>
</div>

<!-- Stat Cards Grid -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.25rem; margin-bottom: 2rem;">
    <div class="stat-card">
        <div style="font-size: 0.825rem; color: var(--color-text-muted); text-transform: uppercase;">Total Sales</div>
        <div class="stat-value" style="color: var(--color-ocean-blue);">PKR {{ number_format($totalSales, 0) }}</div>
    </div>
    <div class="stat-card">
        <div style="font-size: 0.825rem; color: var(--color-text-muted); text-transform: uppercase;">Total Orders</div>
        <div class="stat-value">{{ $totalOrders }}</div>
    </div>
    <div class="stat-card">
        <div style="font-size: 0.825rem; color: var(--color-text-muted); text-transform: uppercase;">Pending Orders</div>
        <div class="stat-value" style="color: var(--color-warning);">{{ $pendingOrders }}</div>
    </div>
    <div class="stat-card">
        <div style="font-size: 0.825rem; color: var(--color-text-muted); text-transform: uppercase;">Delivered Orders</div>
        <div class="stat-value" style="color: var(--color-success);">{{ $deliveredOrders }}</div>
    </div>
    <div class="stat-card">
        <div style="font-size: 0.825rem; color: var(--color-text-muted); text-transform: uppercase;">Total Customers</div>
        <div class="stat-value">{{ $totalCustomers }}</div>
    </div>
    <div class="stat-card">
        <div style="font-size: 0.825rem; color: var(--color-text-muted); text-transform: uppercase;">Total Products</div>
        <div class="stat-value">{{ $totalProducts }}</div>
    </div>
</div>

<!-- Low Stock Warning Alert if any -->
@if($lowStockProducts->count() > 0)
    <div class="alert alert-warning" style="margin-bottom: 2rem;">
        <strong>⚠ Low Stock Alert:</strong> {{ $lowStockProducts->count() }} seafood item(s) have 5 kg or less stock remaining (e.g. {{ $lowStockProducts->pluck('name')->take(3)->implode(', ') }}).
    </div>
@endif

<div class="checkout-grid">
    <!-- Recent Orders Table -->
    <div class="card-box">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <h3 style="font-family: var(--font-heading); font-size: 1.2rem; color: var(--color-ocean-dark);">
                Recent Orders
            </h3>
            <a href="{{ route('admin.orders.index') }}" style="font-size: 0.85rem; color: var(--color-ocean-blue); font-weight: 600;">View All &rarr;</a>
        </div>

        @if($recentOrders->count() > 0)
            <div style="overflow-x: auto;">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $order)
                            <tr>
                                <td><strong style="color: var(--color-ocean-blue);">#{{ $order->order_number }}</strong></td>
                                <td>{{ $order->customer_name }}</td>
                                <td>PKR {{ number_format($order->grand_total, 0) }}</td>
                                <td>
                                    <span class="stock-badge {{ $order->status_badge_class }}">
                                        {{ $order->order_status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-ocean">Manage</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p style="color: var(--color-text-muted); font-size: 0.9rem;">No orders placed yet.</p>
        @endif
    </div>

    <!-- Recent Customers & Quick Actions -->
    <div>
        <div class="card-box" style="margin-bottom: 1.5rem;">
            <h3 style="font-family: var(--font-heading); font-size: 1.2rem; color: var(--color-ocean-dark); margin-bottom: 1rem;">
                Recent Customers
            </h3>
            @if($recentCustomers->count() > 0)
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    @foreach($recentCustomers as $customer)
                        <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--color-border); padding-bottom: 0.5rem;">
                            <div>
                                <strong style="font-size: 0.9rem; color: var(--color-ocean-dark);">{{ $customer->name }}</strong>
                                <div style="font-size: 0.75rem; color: var(--color-text-muted);">{{ $customer->email }}</div>
                            </div>
                            <span style="font-size: 0.75rem; color: var(--color-text-muted);">{{ $customer->area }}</span>
                        </div>
                    @endforeach
                </div>
            @else
                <p style="color: var(--color-text-muted); font-size: 0.9rem;">No registered customers yet.</p>
            @endif
        </div>
    </div>
</div>

@endsection
