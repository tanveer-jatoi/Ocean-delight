@extends('layouts.app')

@section('title', 'Seafood Products - Ocean Delight Karachi')
@section('meta_description', 'Browse our wide range of fresh seawater fish, prawns, shrimp, crabs, lobsters and squids. Delivered fresh across Karachi with Cash on Delivery.')

@section('content')

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <!-- Breadcrumb -->
    <div style="margin-bottom: 1.5rem; font-size: 0.875rem; color: var(--color-text-muted);">
        <a href="{{ route('home') }}">Home</a> &nbsp;/&nbsp; <strong style="color: var(--color-ocean-dark);">Products</strong>
    </div>

    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; margin-bottom: 2rem;">
        <div>
            <h1 class="section-title">Fresh Seafood Catalog</h1>
            <p class="section-subtitle">Showing {{ $products->total() }} premium seafood items available for Karachi delivery</p>
        </div>

        <!-- Sorting form -->
        <form action="{{ route('products.index') }}" method="GET" style="display: flex; gap: 0.5rem; align-items: center;">
            @if(request('q')) <input type="hidden" name="q" value="{{ request('q') }}"> @endif
            @if(request('category')) <input type="hidden" name="category" value="{{ request('category') }}"> @endif
            
            <label for="sort" style="font-size: 0.875rem; font-weight: 600;">Sort By:</label>
            <select name="sort" id="sort" class="form-control" style="padding: 0.4rem 0.8rem; width: auto;" onchange="this.form.submit()">
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest Catch</option>
                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most Popular</option>
            </select>
        </form>
    </div>

    <!-- Category Pills Filter Bar -->
    <div class="category-pills" style="margin-bottom: 2rem;">
        <a href="{{ route('products.index') }}" class="pill-item {{ !request('category') ? 'active' : '' }}">All Products</a>
        @foreach($categories as $cat)
            <a href="{{ route('products.index', ['category' => $cat->slug]) }}" class="pill-item {{ request('category') == $cat->slug ? 'active' : '' }}">
                {{ $cat->name }}
            </a>
        @endforeach
    </div>

    <!-- Active Search Filter Badge if present -->
    @if(request('q'))
        <div style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <span style="font-size: 0.9rem;">Search results for: <strong>"{{ request('q') }}"</strong></span>
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-white" style="color: var(--color-danger); border-color: var(--color-danger);">Clear Filter ✕</a>
        </div>
    @endif

    <!-- Product Grid -->
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
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="color: var(--color-text-muted); margin-bottom: 1rem;">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <h3 style="font-family: var(--font-heading); font-size: 1.5rem; margin-bottom: 0.5rem;">No seafood products found</h3>
            <p style="color: var(--color-text-muted); margin-bottom: 1.5rem;">Try adjusting your search terms or filter selections.</p>
            <a href="{{ route('products.index') }}" class="btn btn-ocean">View All Seafood</a>
        </div>
    @endif
</div>

@endsection
