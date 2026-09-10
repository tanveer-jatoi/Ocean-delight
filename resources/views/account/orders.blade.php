@extends('layouts.app')

@section('title', 'My Orders - Ocean Delight')

@section('content')

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <!-- Breadcrumb -->
    <div style="margin-bottom: 1.5rem; font-size: 0.875rem; color: var(--color-text-muted);">
        <a href="{{ route('home') }}">Home</a> &nbsp;/&nbsp;
        <a href="{{ route('account.index') }}">My Account</a> &nbsp;/&nbsp;
        <strong style="color: var(--color-ocean-dark);">Orders</strong>
    </div>

    <h1 class="section-title" style="margin-bottom: 1.5rem;">My Order History</h1>

    @if($orders->count() > 0)
        <div class="card-box">
            <div style="overflow-x: auto;">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Date</th>
                            <th>Items</th>
                            <th>Total Amount</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    <strong style="color: var(--color-ocean-blue);">#{{ $order->order_number }}</strong>
                                </td>
                                <td style="font-size: 0.85rem; color: var(--color-text-muted);">
                                    {{ $order->created_at->format('M d, Y h:i A') }}
                                </td>
                                <td style="font-size: 0.9rem;">
                                    {{ $order->items->count() ?? 1 }} item(s)
                                </td>
                                <td style="font-weight: 700; color: var(--color-ocean-dark);">
                                    PKR {{ number_format($order->grand_total, 0) }}
                                </td>
                                <td style="font-size: 0.85rem;">
                                    Cash on Delivery
                                </td>
                                <td>
                                    <span class="stock-badge {{ $order->status_badge_class }}">
                                        {{ $order->order_status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('account.order.show', $order->id) }}" class="btn btn-sm btn-ocean">
                                        View Details
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
    @else
        <div class="card-box" style="text-align: center; padding: 4rem 2rem;">
            <h3 style="font-family: var(--font-heading); font-size: 1.5rem; margin-bottom: 0.5rem;">No orders found</h3>
            <p style="color: var(--color-text-muted); margin-bottom: 1.5rem;">You haven't placed any seafood orders yet.</p>
            <a href="{{ route('products.index') }}" class="btn btn-ocean">Start Shopping</a>
        </div>
    @endif
</div>

@endsection
