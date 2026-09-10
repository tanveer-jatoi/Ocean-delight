@extends('layouts.admin')

@section('title', 'Customer Directory - Admin Ocean Delight')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <div>
        <h1 style="font-family: var(--font-heading); font-size: 1.85rem; color: var(--color-ocean-dark);">
            Customer Directory
        </h1>
        <p style="color: var(--color-text-muted); font-size: 0.9rem;">
            Registered customer accounts in Karachi
        </p>
    </div>
</div>

<div class="card-box" style="margin-bottom: 1.5rem;">
    <form action="{{ route('admin.customers.index') }}" method="GET" style="display: flex; gap: 1rem;">
        <input type="text" name="search" class="form-control" style="width: 300px;" placeholder="Search customer name, email or phone..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-ocean btn-sm">Search</button>
    </form>
</div>

<div class="card-box">
    <div style="overflow-x: auto;">
        <table class="cart-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Karachi Area</th>
                    <th>Orders Placed</th>
                    <th>Account Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $cust)
                    <tr>
                        <td>#{{ $cust->id }}</td>
                        <td><strong>{{ $cust->name }}</strong></td>
                        <td>{{ $cust->email }}</td>
                        <td>{{ $cust->phone }}</td>
                        <td>{{ $cust->area }}</td>
                        <td>{{ $cust->orders_count }} order(s)</td>
                        <td>
                            @if($cust->is_active)
                                <span class="stock-badge stock-in">Active</span>
                            @else
                                <span class="stock-badge stock-out">Deactivated</span>
                            @endif
                        </td>
                        <td>
                            <div style="display: flex; gap: 0.5rem;">
                                <a href="{{ route('admin.customers.show', $cust->id) }}" class="btn btn-sm btn-ocean">View Orders</a>
                                <form action="{{ route('admin.customers.toggle-status', $cust->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-white" style="color: var(--color-danger); border-color: var(--color-danger);">
                                        {{ $cust->is_active ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="margin-top: 1.5rem;">
        {{ $customers->links() }}
    </div>
</div>

@endsection
