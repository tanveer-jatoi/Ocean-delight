<div class="product-card">
    <div class="product-img-wrapper">
        <a href="{{ route('products.show', $product->slug) }}">
            <img src="{{ asset($product->image ? $product->image : 'images/products/default.jpg') }}" alt="{{ $product->name }}" loading="lazy" onerror="this.src='https://via.placeholder.com/400x300/1E3E62/FFFFFF?text=Ocean+Delight';">
        </a>
        @if($product->is_featured)
            <span class="product-badge-featured">Featured</span>
        @endif
    </div>

    <div class="product-card-body">
        <div class="product-category-name">{{ $product->category ? $product->category->name : 'Seafood' }}</div>
        
        <h3 class="product-title">
            <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
        </h3>
        
        <div class="product-unit">{{ $product->weight_unit }}</div>

        <div class="product-card-footer">
            <div class="product-price">{{ $product->formatted_price }}</div>
            
            <form action="{{ route('cart.add') }}" method="POST" class="quick-add-form">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="quantity" value="1">
                
                <button type="submit" class="product-add-btn" title="Add {{ $product->name }} to cart" {{ $product->stock < 1 ? 'disabled' : '' }}>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
