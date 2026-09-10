<?php $__env->startSection('title', ($product->meta_title ?? $product->name . ' - Ocean Delight Karachi')); ?>
<?php $__env->startSection('meta_description', ($product->meta_description ?? 'Order fresh ' . $product->name . ' online in Karachi. Cash on delivery guaranteed.')); ?>

<?php $__env->startSection('content'); ?>

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <!-- Breadcrumb -->
    <div style="margin-bottom: 1.5rem; font-size: 0.875rem; color: var(--color-text-muted);">
        <a href="<?php echo e(route('home')); ?>">Home</a> &nbsp;/&nbsp;
        <a href="<?php echo e(route('products.index')); ?>">Products</a> &nbsp;/&nbsp;
        <?php if($product->category): ?>
            <a href="<?php echo e(route('category.show', $product->category->slug)); ?>"><?php echo e($product->category->name); ?></a> &nbsp;/&nbsp;
        <?php endif; ?>
        <strong style="color: var(--color-ocean-dark);"><?php echo e($product->name); ?></strong>
    </div>

    <!-- Product Layout -->
    <div class="product-detail-layout">
        <!-- Image Box -->
        <div class="detail-img-box">
            <img src="<?php echo e(asset($product->image ? $product->image : 'images/products/default.jpg')); ?>" alt="<?php echo e($product->name); ?>" id="mainProductImg" onerror="this.src='https://via.placeholder.com/600x450/1E3E62/FFFFFF?text=Ocean+Delight';">
        </div>

        <!-- Detail Info Box -->
        <div class="detail-info">
            <div>
                <div class="product-category-name" style="font-size: 0.85rem;">
                    <?php echo e($product->category ? $product->category->name : 'Fresh Seafood'); ?>

                </div>
                <h1 class="detail-title"><?php echo e($product->name); ?></h1>
            </div>

            <div style="display: flex; align-items: center; gap: 1rem;">
                <div class="detail-price"><?php echo e($product->formatted_price); ?></div>
                <div style="font-size: 0.95rem; color: var(--color-text-muted);">/ <?php echo e($product->weight_unit); ?></div>
            </div>

            <div>
                <?php if($product->stock > 0): ?>
                    <span class="stock-badge stock-in">✓ In Stock (<?php echo e($product->stock); ?> kg available)</span>
                <?php else: ?>
                    <span class="stock-badge stock-out">✕ Currently Out of Stock</span>
                <?php endif; ?>
            </div>

            <p style="color: var(--color-text-main); font-size: 0.975rem; line-height: 1.6;">
                <?php echo e($product->short_description); ?>

            </p>

            <form action="<?php echo e(route('cart.add')); ?>" method="POST" style="display: flex; flex-direction: column; gap: 1.25rem;">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                <div style="display: flex; align-items: center; gap: 1rem;">
                    <label class="form-label" style="margin-bottom: 0;">Quantity (kg):</label>
                    <div class="qty-input-group">
                        <button type="button" class="qty-btn qty-decrement">-</button>
                        <input type="number" name="quantity" class="qty-input" value="1" min="1" max="<?php echo e($product->stock); ?>">
                        <button type="button" class="qty-btn qty-increment">+</button>
                    </div>
                </div>

                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <button type="submit" class="btn btn-ocean" style="flex: 1; padding: 0.9rem;" <?php echo e($product->stock < 1 ? 'disabled' : ''); ?>>
                        🛒 Add to Shopping Cart
                    </button>
                    <button type="submit" name="buy_now" value="1" class="btn btn-sand" style="flex: 1; padding: 0.9rem;" <?php echo e($product->stock < 1 ? 'disabled' : ''); ?>>
                        ⚡ Buy Now
                    </button>
                </div>
            </form>

            <div style="border-top: 1px solid var(--color-border); padding-top: 1.25rem; font-size: 0.875rem; color: var(--color-text-muted); display: flex; flex-direction: column; gap: 0.5rem;">
                <div>🚚 <strong>Karachi Delivery:</strong> Same day / Next morning delivery in thermal cold boxes.</div>
                <div>💵 <strong>Payment:</strong> Cash on Delivery (COD) only.</div>
                <div>❄ <strong>Freshness Guarantee:</strong> 100% wild-caught, never frozen or chemically preserved.</div>
            </div>
        </div>
    </div>

    <!-- Product Description Tabs / Cards -->
    <div style="margin-top: 4rem;">
        <div class="card-box">
            <h3 style="font-family: var(--font-heading); font-size: 1.4rem; margin-bottom: 1rem; color: var(--color-ocean-dark);">
                Product Details & Preparation Guide
            </h3>
            <div style="line-height: 1.7; color: var(--color-text-main); font-size: 0.975rem;">
                <?php echo nl2br(e($product->description)); ?>

            </div>

            <div style="grid-template-columns: 1fr 1fr; gap: 1.5rem; display: grid; margin-top: 2rem; border-top: 1px solid var(--color-border); padding-top: 1.5rem;">
                <div>
                    <h4 style="font-family: var(--font-heading); color: var(--color-ocean-blue); margin-bottom: 0.5rem;">Storage & Handling</h4>
                    <p style="font-size: 0.9rem; color: var(--color-text-muted);">
                        Keep refrigerated at 0°C to 4°C upon delivery. For best flavor, cook within 24 hours of delivery. Can be frozen for up to 30 days in sealed airtight freezer wrap.
                    </p>
                </div>
                <div>
                    <h4 style="font-family: var(--font-heading); color: var(--color-ocean-blue); margin-bottom: 0.5rem;">Preparation Options</h4>
                    <p style="font-size: 0.9rem; color: var(--color-text-muted);">
                        Cleaned and prepped upon request at no extra charge. Mention your cleaning preference (Whole, Cut Steaks, Boneless Fillet, Curry Cut) in the checkout order notes.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Seafood -->
    <?php if($relatedProducts->count() > 0): ?>
        <div style="margin-top: 4rem;">
            <h2 class="section-title" style="margin-bottom: 1.5rem;">Related Seafood Recommendations</h2>
            <div class="product-grid">
                <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('components.product-card', ['product' => $relProduct], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Ocean-Delight\resources\views/products/show.blade.php ENDPATH**/ ?>