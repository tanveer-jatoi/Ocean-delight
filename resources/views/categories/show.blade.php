@extends('layouts.app')

@section('title', $category->name . ' - Ocean Delight Seafood Karachi')
@section('meta_description', $category->description ?? 'Buy fresh ' . $category->name . ' online in Karachi. Delivered cold-chain with Cash on Delivery.')

@section('content')

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <!-- Breadcrumb -->
    <div style="margin-bottom: 1.5rem; font-size: 0.875rem; color: var(--color-text-muted);">
        <a href="{{ route('home') }}">Home</a> &nbsp;/&nbsp;
        <a href="{{ route('products.index') }}">Categories</a> &nbsp;/&nbsp;
        <strong style="color: var(--color-ocean-dark);">{{ $category->name }}</strong>
    </div>

    <!-- Category Banner Header -->
    <div class="card-box" style="background-color: var(--color-ocean-dark); color: white; padding: 2.5rem 2rem; margin-bottom: 2rem; border: none;">
        <h1 style="font-family: var(--font-heading); font-size: 2.25rem; margin-bottom: 0.5rem; color: white;">
            Fresh {{ $category->name }} Selection
        </h1>
        <p style="color: rgba(255,255,255,0.85); font-size: 1.05rem; max-width: 650px;">
            {{ $category->description }}
        </p>
    </div>

    <!-- Sorting bar -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; margin-bottom: 1.5rem;">
        <div style="font-size: 0.95rem; color: var(--color-text-muted);">
            Showing {{ $products->total() }} items in {{ $category->name }}
        </div>

        <form action="{{ route('category.show', $category->slug) }}" method="GET" style="display: flex; gap: 0.5rem; align-items: center;">
            <label for="sort" style="font-size: 0.875rem; font-weight: 600;">Sort By:</label>
            <select name="sort" id="sort" class="form-control" style="padding: 0.4rem 0.8rem; width: auto;" onchange="this.form.submit()">
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest Catch</option>
                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
            </select>
        </form>
    </div>

    <!-- Category Product Grid -->
    @if($products->count() > 0)
        <div class="product-grid">
            @foreach($products as $product)
                @include('components.product-card', ['product' => $product])
            @endforeach
        </div>

        <div style="margin-top: 3rem;">
            {{ $products->links() }}
        </div>
    @else
        <div class="card-box" style="text-align: center; padding: 4rem 2rem;">
            <h3 style="font-family: var(--font-heading); font-size: 1.5rem; margin-bottom: 0.5rem;">No products in {{ $category->name }}</h3>
            <p style="color: var(--color-text-muted); margin-bottom: 1.5rem;">Check back soon as new catch is added daily!</p>
            <a href="{{ route('products.index') }}" class="btn btn-ocean">Browse All Seafood</a>
        </div>
    @endif
</div>

@endsection
