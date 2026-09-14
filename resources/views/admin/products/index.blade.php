@extends('layouts.admin')

@section('title', 'Products Management - Admin Ocean Delight')
@section('page_title', 'Products Catalog')

@section('content')

<div class="admin-card" style="margin-bottom: 1.5rem;">
    <div class="admin-card-header">
        <div>
            <h3 class="admin-card-title">Filter & Search Products</h3>
            <p style="color: var(--color-text-muted); font-size: 0.85rem; margin-top: 0.25rem;">Manage catalog items, pricing, inventory stock, and availability status</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn btn-sand btn-sm">
            ➕ Add New Seafood Item
        </a>
    </div>

    <form action="{{ route('admin.products.index') }}" method="GET" style="display: flex; gap: 1rem; flex-wrap: wrap; align-items: center;">
        <input type="text" name="search" class="form-control" style="max-width: 280px;" placeholder="Search seafood product..." value="{{ request('search') }}">
        
        <select name="category_id" class="form-control" style="max-width: 220px;">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-ocean btn-sm">Search & Filter</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-ocean btn-sm">Reset</a>
    </form>
</div>

<div class="admin-card">
    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Unit</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $prod)
                    <tr>
                        <td>#{{ $prod->id }}</td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 0.85rem;">
                                <img src="{{ $prod->image_url }}" alt="{{ $prod->name }}" style="width: 46px; height: 46px; object-fit: cover; border-radius: var(--radius-sm); border: 1px solid var(--color-border);" onerror="this.src='{{ asset('images/products/default.jpg') }}';">
                                <div>
                                    <strong style="color: var(--color-ocean-dark); font-size: 0.95rem;">{{ $prod->name }}</strong>
                                    @if($prod->is_featured)
                                        <span class="admin-badge warning" style="font-size: 0.65rem; margin-left: 0.35rem;">Featured</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>{{ $prod->category ? $prod->category->name : 'N/A' }}</td>
                        <td style="font-weight: 700; color: var(--color-ocean-blue);">PKR {{ number_format($prod->price, 0) }}</td>
                        <td>{{ $prod->weight_unit }}</td>
                        <td>
                            @if($prod->stock <= 5)
                                <span class="admin-badge danger">{{ $prod->stock }} kg (Low)</span>
                            @else
                                <span class="admin-badge success">{{ $prod->stock }} kg</span>
                            @endif
                        </td>
                        <td>
                            @if($prod->is_active)
                                <span class="admin-badge success">Active</span>
                            @else
                                <span class="admin-badge secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div style="display: flex; gap: 0.5rem;">
                                <a href="{{ route('admin.products.edit', $prod->id) }}" class="btn btn-sm btn-ocean">Edit</a>
                                <form action="{{ route('admin.products.destroy', $prod->id) }}" method="POST" onsubmit="return confirm('Delete {{ $prod->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-ocean" style="color: var(--color-danger); border-color: var(--color-danger);">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="margin-top: 1.5rem;">
        {{ $products->links() }}
    </div>
</div>

@endsection
