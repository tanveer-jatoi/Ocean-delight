<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title><?php echo $__env->yieldContent('title', 'Ocean Delight - Fresh Seafood Delivered in Karachi'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Ocean Delight delivers 100% fresh, wild-caught seafood direct to your door in Karachi. Cash on Delivery available across DHA, Clifton, Gulshan & more.'); ?>">
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">

    <!-- Open Graph Metadata -->
    <meta property="og:title" content="<?php echo $__env->yieldContent('title', 'Ocean Delight - Fresh Seafood Delivered in Karachi'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('meta_description', 'Fresh seafood delivery in Karachi. Cash on Delivery.'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>

    <!-- Top Announcement Bar -->
    <div class="top-bar">
        <div class="container top-bar-flex">
            <div>
                <strong>🚚 Delivery Scope:</strong> Serving <strong>Karachi</strong> only | Express Cold-Chain Delivery
            </div>
            <div>
                <span class="top-bar-badge">Cash on Delivery Only</span>
            </div>
        </div>
    </div>

    <!-- Navigation Header -->
    <?php echo $__env->make('components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Main Content Body -->
    <main>
        <?php if(session('success') || session('error') || session('warning') || session('info')): ?>
            <div class="container" style="margin-top: 1rem;">
                <?php if(session('success')): ?>
                    <div class="alert alert-success">✓ <?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <?php if(session('error')): ?>
                    <div class="alert alert-error">✕ <?php echo e(session('error')); ?></div>
                <?php endif; ?>
                <?php if(session('warning')): ?>
                    <div class="alert alert-warning">⚠ <?php echo e(session('warning')); ?></div>
                <?php endif; ?>
                <?php if(session('info')): ?>
                    <div class="alert alert-info">ℹ <?php echo e(session('info')); ?></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Ocean-Delight\resources\views/layouts/app.blade.php ENDPATH**/ ?>