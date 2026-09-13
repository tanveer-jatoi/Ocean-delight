@extends('layouts.app')

@section('title', 'Ocean Delight - Fresh Seafood Delivered in Karachi')

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <div class="hero-tag">
            <span>⚡ Karachi Exclusive Delivery</span>
        </div>
        <h1 class="hero-title">Fresh Seafood, Delivered to Your Door</h1>
        <p class="hero-subtitle">
            Sustaining the seas, delivering excellence. Experience Karachi's finest selection of daily wild-caught seawater fish, jumbo tiger prawns, live crabs, and imported Norwegian salmon.
        </p>
        <div class="hero-btn-group">
            <a href="{{ route('products.index') }}" class="btn btn-sand">Shop Now &rarr;</a>
            <a href="#finest-catch" class="btn btn-outline-white">Browse Catch</a>
        </div>
    </div>
</section>

<!-- Filter & Search Bar -->
<div class="container">
    <div class="filter-search-bar">
        <form action="{{ route('products.index') }}" method="GET" class="search-input-group">
            <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="text" name="q" placeholder="Search seafood by name (e.g. Pomfret, Prawns, Surmai, Salmon)...">
        </form>

        <div class="category-pills">
            <a href="{{ route('products.index') }}" class="pill-item active">All Seafood</a>
            @foreach($categories as $cat)
                <a href="{{ route('category.show', $cat->slug) }}" class="pill-item">{{ $cat->name }}</a>
            @endforeach
        </div>
    </div>
</div>

<!-- Finest Catch Grid -->
<section style="padding: 4rem 0;" id="finest-catch">
    <div class="container">
        <div class="section-header">
            <div>
                <h2 class="section-title">Our Finest Catch</h2>
                <p class="section-subtitle">Freshly landed Karachi catch, cleaned, prepped & chilled to perfection</p>
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-ocean">View All Products &rarr;</a>
        </div>

        <div class="product-grid">
            @foreach($featuredProducts as $product)
                @include('components.product-card', ['product' => $product])
            @endforeach
        </div>
    </div>
</section>

<!-- Recent Catch Section -->
<section style="padding: 4rem 0;">
    <div class="container">
        <div class="section-header">
            <div>
                <h2 class="section-title">New Daily Arrivals</h2>
                <p class="section-subtitle">Latest catch added to our Karachi inventory today</p>
            </div>
        </div>

        <div class="product-grid">
            @foreach($recentCatch as $product)
                @include('components.product-card', ['product' => $product])
            @endforeach
        </div>
    </div>
</section>

<!-- The Ocean Delight Standard -->
<section class="features-section">
    <div class="container">
        <div style="text-align: center; max-width: 600px; margin: 0 auto 3rem auto;">
            <h2 class="section-title">The Ocean Delight Standard</h2>
            <p class="section-subtitle">Why Karachi trusts us for their daily fresh seafood</p>
        </div>

        <div class="feature-grid">
            <div class="feature-item">
                <div class="feature-icon-circle">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                    </svg>
                </div>
                <h3 class="feature-title">Unmatched Freshness</h3>
                <p class="feature-desc">Sourced daily at dawn from Karachi coastal waters, ensuring the highest quality catch arrives at your table.</p>
            </div>

            <div class="feature-item">
                <div class="feature-icon-circle">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="1" y="3" width="15" height="13"></rect>
                        <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                        <circle cx="5.5" cy="18.5" r="2.5"></circle>
                        <circle cx="18.5" cy="18.5" r="2.5"></circle>
                    </svg>
                </div>
                <h3 class="feature-title">Cold-Chain Delivery</h3>
                <p class="feature-desc">Our precise logistics maintain optimal temperature from the dock directly to your door anywhere in Karachi.</p>
            </div>

            <div class="feature-item">
                <div class="feature-icon-circle">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                </div>
                <h3 class="feature-title">Sustainable Sourcing</h3>
                <p class="feature-desc">Committed to responsible fishing practices that protect Arabian sea marine ecosystems for the future.</p>
            </div>
        </div>
    </div>
</section>

@endsection