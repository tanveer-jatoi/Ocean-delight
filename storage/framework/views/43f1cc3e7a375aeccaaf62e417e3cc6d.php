<?php $__env->startSection('title', $category->name . ' - Ocean Delight Seafood Karachi'); ?>
<?php $__env->startSection('meta_description', $category->description ?? 'Buy fresh ' . $category->name . ' online in Karachi. Delivered cold-chain with Cash on Delivery.'); ?>

<?php $__env->startSection('content'); ?>

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <!-- Breadcrumb -->
    <div style="margin-bottom: 1.5rem; font-size: 0.875rem; color: var(--color-text-muted);">
        <a href="<?php echo e(route('home')); ?>">Home</a> &nbsp;/&nbsp;
        <a href="<?php echo e(route('products.index')); ?>">Categories</a> &nbsp;/&nbsp;
        <strong style="color: var(--color-ocean-dark);"><?php echo e($category->name); ?></strong>
    </div>

    <!-- Category Banner Header -->
    <div class="card-box" style="background-color: var(--color-ocean-dark); color: white; padding: 2.5rem 2rem; margin-bottom: 2rem; border: none;">
        <h1 style="font-family: var(--font-heading); font-size: 2.25rem; margin-bottom: 0.5rem; color: white;">
            Fresh <?php echo e($category->name); ?> Selection
        </h1>
        <p style="color: rgba(255,255,255,0.85); font-size: 1.05rem; max-width: 650px;">
            <?php echo e($category->description); ?>

        </p>
    </div>

    <!-- Sorting bar -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; margin-bottom: 1.5rem;">
        <div style="font-size: 0.95rem; color: var(--color-text-muted);">
            Showing <?php echo e($products->total()); ?> items in <?php echo e($category->name); ?>

        </div>

        <form action="<?php echo e(route('category.show', $category->slug)); ?>" method="GET" style="display: flex; gap: 0.5rem; align-items: center;">
            <label for="sort" style="font-size: 0.875rem; font-weight: 600;">Sort By:</label>
            <select name="sort" id="sort" class="form-control" style="padding: 0.4rem 0.8rem; width: auto;" onchange="this.form.submit()">
                <option value="newest" <?php echo e(request('sort') == 'newest' ? 'selected' : ''); ?>>Newest Catch</option>
                <option value="price_low" <?php echo e(request('sort') == 'price_low' ? 'selected' : ''); ?>>Price: Low to High</option>
                <option value="price_high" <?php echo e(request('sort') == 'price_high' ? 'selected' : ''); ?>>Price: High to Low</option>
            </select>
        </form>
    </div>

    <!-- Category Product Grid -->
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
            <h3 style="font-family: var(--font-heading); font-size: 1.5rem; margin-bottom: 0.5rem;">No products in <?php echo e($category->name); ?></h3>
            <p style="color: var(--color-text-muted); margin-bottom: 1.5rem;">Check back soon as new catch is added daily!</p>
            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-ocean">Browse All Seafood</a>
        </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Ocean-Delight\resources\views/categories/show.blade.php ENDPATH**/ ?>