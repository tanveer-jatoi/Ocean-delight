<div class="product-card">
    <div class="product-img-wrapper">
        <a href="<?php echo e(route('products.show', $product->slug)); ?>">
            <img src="<?php echo e(asset($product->image ? $product->image : 'images/products/default.jpg')); ?>" alt="<?php echo e($product->name); ?>" loading="lazy" onerror="this.src='https://via.placeholder.com/400x300/1E3E62/FFFFFF?text=Ocean+Delight';">
        </a>
        <?php if($product->is_featured): ?>
            <span class="product-badge-featured">Featured</span>
        <?php endif; ?>
    </div>

    <div class="product-card-body">
        <div class="product-category-name"><?php echo e($product->category ? $product->category->name : 'Seafood'); ?></div>
        
        <h3 class="product-title">
            <a href="<?php echo e(route('products.show', $product->slug)); ?>"><?php echo e($product->name); ?></a>
        </h3>
        
        <div class="product-unit"><?php echo e($product->weight_unit); ?></div>

        <div class="product-card-footer">
            <div class="product-price"><?php echo e($product->formatted_price); ?></div>
            
            <form action="<?php echo e(route('cart.add')); ?>" method="POST" class="quick-add-form">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                <input type="hidden" name="quantity" value="1">
                
                <button type="submit" class="product-add-btn" title="Add <?php echo e($product->name); ?> to cart" <?php echo e($product->stock < 1 ? 'disabled' : ''); ?>>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Ocean-Delight\resources\views/components/product-card.blade.php ENDPATH**/ ?>