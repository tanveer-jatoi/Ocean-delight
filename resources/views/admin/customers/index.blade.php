@extends('layouts.admin')

@section('title', 'Customer Directory - Admin Ocean Delight')
@section('page_title', 'Customer Directory')

@section('content')

<div class="admin-card" style="margin-bottom: 1.5rem;">
    <div class="admin-card-header">
        <div>
            <h3 class="admin-card-title">Registered Customer Accounts</h3>
            <p style="color: var(--color-text-muted); font-size: 0.85rem; margin-top: 0.25rem;">Search and manage customer profiles across Karachi delivery zones</p>
        </div>
    </div>

    <form action="{{ route('admin.customers.index') }}" method="GET" style="display: flex; gap: 1rem; flex-wrap: wrap; align-items: center;">
        <input type="text" name="search" class="form-control" style="max-width: 320px;" placeholder="Search customer name, email or phone..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-ocean btn-sm">Search</button>
        <a href="{{ route('admin.customers.index') }}" class="btn btn-outline-ocean btn-sm">Reset</a>
    </form>
</div>

<div class="admin-card">
    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Karachi Area</th>
                    <th>Orders</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $cust)
                    <tr>
                        <td>#{{ $cust->id }}</td>
                        <td><strong style="color: var(--color-ocean-dark);">{{ $cust->name }}</strong></td>
                        <td>{{ $cust->email }}</td>
                        <td>{{ $cust->phone }}</td>
                        <td><span class="admin-badge secondary">{{ $cust->area ?? 'Karachi' }}</span></td>
                        <td><span class="admin-badge info">{{ $cust->orders_count }} order(s)</span></td>
                        <td>
                            @if($cust->is_active)
                                <span class="admin-badge success">Active</span>
                            @else
                                <span class="admin-badge danger">Deactivated</span>
                            @endif
                        </td>
                        <td>
                            <div style="display: flex; gap: 0.5rem;">
                                <a href="{{ route('admin.customers.show', $cust->id) }}" class="btn btn-sm btn-ocean">Orders History</a>
                                <form action="{{ route('admin.customers.toggle-status', $cust->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-ocean" style="color: var(--color-danger); border-color: var(--color-danger);">
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
