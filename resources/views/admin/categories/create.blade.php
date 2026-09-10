@extends('layouts.admin')

@section('title', 'Add Category - Admin Ocean Delight')

@section('content')

<div style="margin-bottom: 1.5rem;">
    <a href="{{ route('admin.categories.index') }}" style="color: var(--color-ocean-blue); font-size: 0.9rem;">&larr; Back to Categories</a>
    <h1 style="font-family: var(--font-heading); font-size: 1.85rem; color: var(--color-ocean-dark); margin-top: 0.5rem;">
        Add New Category
    </h1>
</div>

<div class="card-box" style="max-width: 600px;">
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label">Category Name *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="e.g. Fresh Fish" required>
            @error('name') <div style="color: var(--color-danger); font-size: 0.8rem;">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div style="margin: 1.5rem 0;">
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                <input type="checkbox" name="is_active" value="1" checked style="accent-color: var(--color-ocean-blue);">
                <strong>Active / Show on Navbar & Filters</strong>
            </label>
        </div>

        <button type="submit" class="btn btn-sand">Save Category</button>
    </form>
</div>

@endsection
