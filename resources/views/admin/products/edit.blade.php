@extends('layouts.admin')

@section('title', 'Edit Product - Admin Ocean Delight')

@section('content')

<div style="margin-bottom: 1.5rem;">
    <a href="{{ route('admin.products.index') }}" style="color: var(--color-ocean-blue); font-size: 0.9rem;">&larr; Back to Products</a>
    <h1 style="font-family: var(--font-heading); font-size: 1.85rem; color: var(--color-ocean-dark); margin-top: 0.5rem;">
        Edit Product: {{ $product->name }}
    </h1>
</div>

<div class="card-box" style="max-width: 800px;">
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="grid-template-columns: 1fr 1fr; gap: 1rem; display: grid;">
            <div class="form-group">
                <label class="form-label">Product Name *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Category *</label>
                <select name="category_id" class="form-control" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div style="grid-template-columns: 1fr 1fr 1fr; gap: 1rem; display: grid;">
            <div class="form-group">
                <label class="form-label">Price (PKR) *</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Weight / Unit *</label>
                <input type="text" name="weight_unit" class="form-control" value="{{ old('weight_unit', $product->weight_unit) }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Stock Quantity (kg) *</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Short Description</label>
            <input type="text" name="short_description" class="form-control" value="{{ old('short_description', $product->short_description) }}">
        </div>

        <div class="form-group">
            <label class="form-label">Full Description</label>
            <textarea name="description" rows="4" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Current Image</label>
            <div style="margin-bottom: 0.5rem;">
                <img src="{{ asset($product->image ? $product->image : 'images/products/default.jpg') }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 4px;" onerror="this.src='https://via.placeholder.com/80/1E3E62/FFFFFF?text=Fish';">
            </div>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <div style="display: flex; gap: 2rem; margin: 1.5rem 0;">
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                <input type="checkbox" name="is_active" value="1" {{ $product->is_active ? 'checked' : '' }} style="accent-color: var(--color-ocean-blue);">
                <strong>Active / Visible on Storefront</strong>
            </label>
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                <input type="checkbox" name="is_featured" value="1" {{ $product->is_featured ? 'checked' : '' }} style="accent-color: var(--color-sand-gold);">
                <strong>Feature on Homepage Grid</strong>
            </label>
        </div>

        <button type="submit" class="btn btn-ocean" style="padding: 0.85rem 2rem;">Update Product</button>
    </form>
</div>

@endsection
