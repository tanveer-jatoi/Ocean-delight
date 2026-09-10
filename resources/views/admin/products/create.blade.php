@extends('layouts.admin')

@section('title', 'Add New Product - Admin Ocean Delight')

@section('content')

<div style="margin-bottom: 1.5rem;">
    <a href="{{ route('admin.products.index') }}" style="color: var(--color-ocean-blue); font-size: 0.9rem;">&larr; Back to Products</a>
    <h1 style="font-family: var(--font-heading); font-size: 1.85rem; color: var(--color-ocean-dark); margin-top: 0.5rem;">
        Add New Seafood Product
    </h1>
</div>

<div class="card-box" style="max-width: 800px;">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="grid-template-columns: 1fr 1fr; gap: 1rem; display: grid;">
            <div class="form-group">
                <label class="form-label">Product Name *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name') <div style="color: var(--color-danger); font-size: 0.8rem;">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Category *</label>
                <select name="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div style="grid-template-columns: 1fr 1fr 1fr; gap: 1rem; display: grid;">
            <div class="form-group">
                <label class="form-label">Price (PKR) *</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Weight / Unit *</label>
                <input type="text" name="weight_unit" class="form-control" value="{{ old('weight_unit', '1 kg') }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Stock Quantity (kg) *</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', 20) }}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Short Description</label>
            <input type="text" name="short_description" class="form-control" value="{{ old('short_description') }}">
        </div>

        <div class="form-group">
            <label class="form-label">Full Description & Preparation Info</label>
            <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Product Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <div style="display: flex; gap: 2rem; margin: 1.5rem 0;">
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                <input type="checkbox" name="is_active" value="1" checked style="accent-color: var(--color-ocean-blue);">
                <strong>Active / Visible on Storefront</strong>
            </label>
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                <input type="checkbox" name="is_featured" value="1" style="accent-color: var(--color-sand-gold);">
                <strong>Feature on Homepage Grid</strong>
            </label>
        </div>

        <button type="submit" class="btn btn-sand" style="padding: 0.85rem 2rem;">Save Product</button>
    </form>
</div>

@endsection
