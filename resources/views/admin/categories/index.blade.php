@extends('layouts.admin')

@section('title', 'Categories - Admin Ocean Delight')
@section('page_title', 'Seafood Categories')

@section('content')

<div class="admin-card">
    <div class="admin-card-header">
        <div>
            <h3 class="admin-card-title">Seafood Categories</h3>
            <p style="color: var(--color-text-muted); font-size: 0.85rem; margin-top: 0.25rem;">Manage seafood categories, slugs, and catalog organization</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-sand btn-sm">
            ➕ Add New Category
        </a>
    </div>

    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>URL Slug</th>
                    <th>Products Count</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                    <tr>
                        <td>#{{ $cat->id }}</td>
                        <td><strong style="color: var(--color-ocean-dark);">{{ $cat->name }}</strong></td>
                        <td><code>/category/{{ $cat->slug }}</code></td>
                        <td><span class="admin-badge info">{{ $cat->products_count }} product(s)</span></td>
                        <td>
                            @if($cat->is_active)
                                <span class="admin-badge success">Active</span>
                            @else
                                <span class="admin-badge secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div style="display: flex; gap: 0.5rem;">
                                <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-sm btn-ocean">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Delete category {{ $cat->name }}?')">
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
</div>

@endsection
