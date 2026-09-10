@extends('layouts.admin')

@section('title', 'Product Management - Admin Ocean Delight')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
    <div>
        <h1 style="font-family: var(--font-heading); font-size: 1.85rem; color: var(--color-ocean-dark);">
            Products Catalog Management
        </h1>
        <p style="color: var(--color-text-muted); font-size: 0.9rem;">
            Add, update pricing, manage stock and toggle active status for seafood products
        </p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn btn-sand">
        + Add New Product
    </a>
</div>

<div class="card-box" style="margin-bottom: 1.5rem;">
    <form action="{{ route('admin.products.index') }}" method="GET" style="display: flex; gap: 1rem; flex-wrap: wrap;">
        <input type="text" name="search" class="form-control" style="width: 250px;" placeholder="Search product name..." value="{{ request('search') }}">
        
        <select name="category_id" class="form-control" style="width: 200px;">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-ocean btn-sm">Filter</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-white btn-sm" style="color: var(--color-text-muted); border-color: var(--color-border);">Reset</a>
    </form>
</div>

<div class="card-box">
    <div style="overflow-x: auto;">
        <table class="cart-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Unit</th>
                    <th>Stock (kg)</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $prod)
                    <tr>
                        <td>#{{ $prod->id }}</td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                <img src="{{ asset($prod->image ? $prod->image : 'images/products/default.jpg') }}" alt="{{ $prod->name }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;" onerror="this.src='https://via.placeholder.com/80/1E3E62/FFFFFF?text=Fish';">
                                <strong>{{ $prod->name }}</strong>
                            </div>
                        </td>
                        <td>{{ $prod->category ? $prod->category->name : 'N/A' }}</td>
                        <td style="font-weight: 700;">PKR {{ number_format($prod->price, 0) }}</td>
                        <td>{{ $prod->weight_unit }}</td>
                        <td>
                            @if($prod->stock <= 5)
                                <span class="stock-badge stock-out">{{ $prod->stock }} kg</span>
                            @else
                                <span class="stock-badge stock-in">{{ $prod->stock }} kg</span>
                            @endif
                        </td>
                        <td>
                            @if($prod->is_active)
                                <span class="stock-badge stock-in">Active</span>
                            @else
                                <span class="stock-badge stock-out">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div style="display: flex; gap: 0.5rem;">
                                <a href="{{ route('admin.products.edit', $prod->id) }}" class="btn btn-sm btn-ocean">Edit</a>
                                <form action="{{ route('admin.products.destroy', $prod->id) }}" method="POST" onsubmit="return confirm('Delete {{ $prod->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-white" style="color: var(--color-danger); border-color: var(--color-danger);">Delete</button>
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
