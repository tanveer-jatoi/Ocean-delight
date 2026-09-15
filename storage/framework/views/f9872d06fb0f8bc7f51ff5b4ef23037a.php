<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title><?php echo $__env->yieldContent('title', 'Ocean Delight - Fresh Seafood Delivered in Karachi'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Ocean Delight delivers 100% fresh, wild-caught seafood direct to your door in Karachi. Cash on Delivery available across DHA, Clifton, Gulshan & more.'); ?>">
    <meta name="keywords" content="Karachi seafood, fresh fish delivery Karachi, buy prawns online Karachi, Arabian sea fish, Surmai fish Karachi, Pomfret delivery Karachi, Cash on Delivery seafood">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 36 36'><path d='M9 20.5C10.5 14.5 15.5 9.5 25.5 7.5C24.5 13 21 18.5 14.5 21.5C12.5 22.5 10.2 22 9 20.5Z' fill='%2300A8CC'/><path d='M8.5 21C6 23.5 3.8 23 2.8 21.2C4.3 19.8 6 19 8 19.5L8.5 21Z' fill='%23D49B27'/><circle cx='22.5' cy='11.5' r='1.3' fill='%231E3E62'/></svg>">

    <!-- Open Graph Metadata -->
    <meta property="og:site_name" content="Ocean Delight Fresh Seafood">
    <meta property="og:title" content="<?php echo $__env->yieldContent('title', 'Ocean Delight - Fresh Seafood Delivered in Karachi'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('meta_description', 'Fresh seafood delivery in Karachi. Cash on Delivery.'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:image" content="<?php echo $__env->yieldContent('og_image', asset('images/products/default.jpg')); ?>">
    <meta property="og:image:alt" content="Ocean Delight Fresh Seafood Karachi">

    <!-- Twitter Card Metadata -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('title', 'Ocean Delight - Fresh Seafood Delivered in Karachi'); ?>">
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('meta_description', 'Fresh seafood delivery in Karachi. Cash on Delivery.'); ?>">
    <meta name="twitter:image" content="<?php echo $__env->yieldContent('og_image', asset('images/products/default.jpg')); ?>">

    <!-- JSON-LD LocalBusiness & Organization Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FishStore",
      "name": "Ocean Delight Fresh Seafood",
      "image": "<?php echo e(asset('images/products/default.jpg')); ?>",
      "url": "<?php echo e(url('/')); ?>",
      "telephone": "+923040313435",
      "priceRange": "PKR 500 - PKR 15000",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Fishery Wharf, Dockyard Road",
        "addressLocality": "Karachi",
        "addressRegion": "Sindh",
        "postalCode": "75600",
        "addressCountry": "PK"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "24.8485",
        "longitude": "66.9740"
      },
      "areaServed": [
        "Karachi", "DHA Karachi", "Clifton Karachi", "Gulshan-e-Iqbal", "PECHS", "North Nazimabad", "Bahria Town Karachi"
      ],
      "paymentAccepted": "Cash on Delivery",
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"
        ],
        "opens": "06:00",
        "closes": "22:00"
      }
    }
    </script>

    <?php echo $__env->yieldContent('schema_json'); ?>

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
</html><?php /**PATH C:\xampp\htdocs\Ocean-Delight\resources\views/layouts/app.blade.php ENDPATH**/ ?>