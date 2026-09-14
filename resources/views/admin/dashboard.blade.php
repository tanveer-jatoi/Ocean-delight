@extends('layouts.admin')

@section('title', 'Admin Dashboard - Ocean Delight')
@section('page_title', 'Dashboard Overview')

@section('content')

<!-- Stat Cards Grid -->
<div class="admin-stat-grid">
    <div class="admin-stat-card">
        <div class="admin-stat-icon-wrapper blue">
            💰
        </div>
        <div class="admin-stat-info">
            <div class="admin-stat-label">Total Revenue</div>
            <div class="admin-stat-val">PKR {{ number_format($totalSales, 0) }}</div>
        </div>
    </div>

    <div class="admin-stat-card">
        <div class="admin-stat-icon-wrapper purple">
            📦
        </div>
        <div class="admin-stat-info">
            <div class="admin-stat-label">Total Orders</div>
            <div class="admin-stat-val">{{ $totalOrders }}</div>
        </div>
    </div>

    <div class="admin-stat-card">
        <div class="admin-stat-icon-wrapper amber">
            ⏳
        </div>
        <div class="admin-stat-info">
            <div class="admin-stat-label">Pending Orders</div>
            <div class="admin-stat-val" style="color: var(--color-warning);">{{ $pendingOrders }}</div>
        </div>
    </div>

    <div class="admin-stat-card">
        <div class="admin-stat-icon-wrapper green">
            ✅
        </div>
        <div class="admin-stat-info">
            <div class="admin-stat-label">Delivered</div>
            <div class="admin-stat-val" style="color: var(--color-success);">{{ $deliveredOrders }}</div>
        </div>
    </div>

    <div class="admin-stat-card">
        <div class="admin-stat-icon-wrapper blue">
            👥
        </div>
        <div class="admin-stat-info">
            <div class="admin-stat-label">Customers</div>
            <div class="admin-stat-val">{{ $totalCustomers }}</div>
        </div>
    </div>

    <div class="admin-stat-card">
        <div class="admin-stat-icon-wrapper green">
            🐟
        </div>
        <div class="admin-stat-info">
            <div class="admin-stat-label">Active Products</div>
            <div class="admin-stat-val">{{ $totalProducts }}</div>
        </div>
    </div>
</div>

<!-- Low Stock Warning Alert -->
@if($lowStockProducts->count() > 0)
    <div class="alert alert-warning" style="margin-bottom: 1.75rem;">
        <strong>⚠ Low Stock Warning:</strong> {{ $lowStockProducts->count() }} seafood item(s) have low stock remaining (e.g. {{ $lowStockProducts->pluck('name')->take(3)->implode(', ') }}).
    </div>
@endif

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 1.5rem;">
    <!-- Recent Orders -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Recent Customer Orders</h3>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-ocean">View All Orders &rarr;</a>
        </div>

        @if($recentOrders->count() > 0)
            <div class="admin-table-wrapper">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $order)
                            <tr>
                                <td><strong style="color: var(--color-ocean-blue);">#{{ $order->order_number }}</strong></td>
                                <td>
                                    <div style="font-weight: 600;">{{ $order->customer_name }}</div>
                                    <div style="font-size: 0.75rem; color: var(--color-text-muted);">{{ $order->created_at ? $order->created_at->format('M d, H:i') : 'Recently' }}</div>
                                </td>
                                <td style="font-weight: 700;">PKR {{ number_format($order->grand_total, 0) }}</td>
                                <td>
                                    <span class="admin-badge {{ $order->order_status === 'Delivered' ? 'success' : ($order->order_status === 'Pending' ? 'warning' : 'info') }}">
                                        {{ $order->order_status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-outline-ocean">Manage</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p style="color: var(--color-text-muted); font-size: 0.9rem; padding: 1rem 0;">No recent orders placed.</p>
        @endif
    </div>

    <!-- Recent Registered Customers -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title">New Customer Registrations</h3>
            <a href="{{ route('admin.customers.index') }}" style="font-size: 0.85rem; color: var(--color-ocean-blue); font-weight: 600;">View Customers &rarr;</a>
        </div>

        @if($recentCustomers->count() > 0)
            <div style="display: flex; flex-direction: column; gap: 0.85rem;">
                @foreach($recentCustomers as $customer)
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; border-radius: var(--radius-md); background-color: #F8FAFC; border: 1px solid #F1F5F9;">
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <div style="width: 38px; height: 38px; border-radius: 50%; background-color: var(--color-ocean-ice); color: var(--color-ocean-blue); display: flex; align-items: center; justify-content: center; font-weight: 700;">
                                {{ strtoupper(substr($customer->name, 0, 1)) }}
                            </div>
                            <div>
                                <strong style="font-size: 0.9rem; color: var(--color-ocean-dark);">{{ $customer->name }}</strong>
                                <div style="font-size: 0.75rem; color: var(--color-text-muted);">{{ $customer->email }}</div>
                            </div>
                        </div>
                        <span class="admin-badge secondary">{{ $customer->area ?? 'Karachi' }}</span>
                    </div>
                @endforeach
            </div>
        @else
            <p style="color: var(--color-text-muted); font-size: 0.9rem; padding: 1rem 0;">No registered customers yet.</p>
        @endif
    </div>
</div>

@endsection
