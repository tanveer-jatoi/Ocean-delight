<?php $__env->startSection('title', 'Seafood Products - Ocean Delight Karachi'); ?>
<?php $__env->startSection('meta_description', 'Browse our wide range of fresh seawater fish, prawns, shrimp, crabs, lobsters and squids. Delivered fresh across Karachi with Cash on Delivery.'); ?>

<?php $__env->startSection('content'); ?>

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <!-- Breadcrumb -->
    <div style="margin-bottom: 1.5rem; font-size: 0.875rem; color: var(--color-text-muted);">
        <a href="<?php echo e(route('home')); ?>">Home</a> &nbsp;/&nbsp; <strong style="color: var(--color-ocean-dark);">Products</strong>
    </div>

    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; margin-bottom: 2rem;">
        <div>
            <h1 class="section-title">Fresh Seafood Catalog</h1>
            <p class="section-subtitle">Showing <?php echo e($products->total()); ?> premium seafood items available for Karachi delivery</p>
        </div>

        <!-- Sorting form -->
        <form action="<?php echo e(route('products.index')); ?>" method="GET" style="display: flex; gap: 0.5rem; align-items: center;">
            <?php if(request('q')): ?> <input type="hidden" name="q" value="<?php echo e(request('q')); ?>"> <?php endif; ?>
            <?php if(request('category')): ?> <input type="hidden" name="category" value="<?php echo e(request('category')); ?>"> <?php endif; ?>
            
            <label for="sort" style="font-size: 0.875rem; font-weight: 600;">Sort By:</label>
            <select name="sort" id="sort" class="form-control" style="padding: 0.4rem 0.8rem; width: auto;" onchange="this.form.submit()">
                <option value="newest" <?php echo e(request('sort') == 'newest' ? 'selected' : ''); ?>>Newest Catch</option>
                <option value="price_low" <?php echo e(request('sort') == 'price_low' ? 'selected' : ''); ?>>Price: Low to High</option>
                <option value="price_high" <?php echo e(request('sort') == 'price_high' ? 'selected' : ''); ?>>Price: High to Low</option>
                <option value="popular" <?php echo e(request('sort') == 'popular' ? 'selected' : ''); ?>>Most Popular</option>
            </select>
        </form>
    </div>

    <!-- Category Pills Filter Bar -->
    <div class="category-pills" style="margin-bottom: 2rem;">
        <a href="<?php echo e(route('products.index')); ?>" class="pill-item <?php echo e(!request('category') ? 'active' : ''); ?>">All Products</a>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('products.index', ['category' => $cat->slug])); ?>" class="pill-item <?php echo e(request('category') == $cat->slug ? 'active' : ''); ?>">
                <?php echo e($cat->name); ?>

            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Active Search Filter Badge if present -->
    <?php if(request('q')): ?>
        <div style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <span style="font-size: 0.9rem;">Search results for: <strong>"<?php echo e(request('q')); ?>"</strong></span>
            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-sm btn-outline-white" style="color: var(--color-danger); border-color: var(--color-danger);">Clear Filter ✕</a>
        </div>
    <?php endif; ?>

    <!-- Product Grid -->
    <?php if($products->count() > 0): ?>
        <div class="product-grid">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('components.product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div style="margin-top: 3rem;">
            <?php echo e($products->links()); ?>

        </div>
    <?php else: ?>
        <div class="card-box" style="text-align: center; padding: 4rem 2rem;">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="color: var(--color-text-muted); margin-bottom: 1rem;">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <h3 style="font-family: var(--font-heading); font-size: 1.5rem; margin-bottom: 0.5rem;">No seafood products found</h3>
            <p style="color: var(--color-text-muted); margin-bottom: 1.5rem;">Try adjusting your search terms or filter selections.</p>
            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-ocean">View All Seafood</a>
        </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Ocean-Delight\resources\views/products/index.blade.php ENDPATH**/ ?>