@extends('layouts.admin')

@section('title', 'Categories - Admin Ocean Delight')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <div>
        <h1 style="font-family: var(--font-heading); font-size: 1.85rem; color: var(--color-ocean-dark);">
            Categories Management
        </h1>
        <p style="color: var(--color-text-muted); font-size: 0.9rem;">
            Manage seafood categories and SEO URL slugs (Fish, Prawns, Shrimp, Crab, Lobster, etc.)
        </p>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-sand">
        + Add New Category
    </a>
</div>

<div class="card-box">
    <div style="overflow-x: auto;">
        <table class="cart-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Slug URL</th>
                    <th>Products Count</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                    <tr>
                        <td>#{{ $cat->id }}</td>
                        <td><strong>{{ $cat->name }}</strong></td>
                        <td><code>/category/{{ $cat->slug }}</code></td>
                        <td>{{ $cat->products_count }} product(s)</td>
                        <td>
                            @if($cat->is_active)
                                <span class="stock-badge stock-in">Active</span>
                            @else
                                <span class="stock-badge stock-out">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div style="display: flex; gap: 0.5rem;">
                                <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-sm btn-ocean">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Delete category {{ $cat->name }}?')">
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
</div>

@endsection
