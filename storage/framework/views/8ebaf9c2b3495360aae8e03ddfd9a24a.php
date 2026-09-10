<header class="site-header">
    <div class="container">
        <nav class="navbar">
            <a href="<?php echo e(route('home')); ?>" class="logo-brand">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"></path>
                    <path d="M12 6c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z"></path>
                    <path d="M12 10a2 2 0 100 4 2 2 0 000-4z"></path>
                </svg>
                Ocean <span>Delight</span>
            </a>

            <ul class="nav-menu" id="navMenu">
                <li><a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">Home</a></li>
                <li><a href="<?php echo e(route('products.index')); ?>" class="nav-link <?php echo e(request()->routeIs('products.*') ? 'active' : ''); ?>">Seafood</a></li>
                <li><a href="<?php echo e(route('about')); ?>" class="nav-link <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>">About</a></li>
                <li><a href="<?php echo e(route('contact')); ?>" class="nav-link <?php echo e(request()->routeIs('contact') ? 'active' : ''); ?>">Contact</a></li>
            </ul>

            <div class="nav-actions">
                <a href="<?php echo e(route('cart.index')); ?>" class="cart-icon-btn" title="View Cart">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <span class="cart-badge" id="navbarCartBadge" style="<?php echo e(($globalCartCount ?? 0) > 0 ? '' : 'display:none;'); ?>">
                        <?php echo e($globalCartCount ?? 0); ?>

                    </span>
                </a>

                <?php if(auth()->guard()->check()): ?>
                    <div style="position: relative;">
                        <a href="<?php echo e(route('account.index')); ?>" class="btn btn-sm btn-ocean">
                            Account (<?php echo e(Str::limit(auth()->user()->name, 10)); ?>)
                        </a>
                        <?php if(auth()->user()->isAdmin()): ?>
                            <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-sm btn-sand" style="margin-left: 0.25rem;">
                                Admin
                            </a>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-sm btn-outline-white" style="color: var(--color-ocean-dark); border-color: var(--color-border);">Login</a>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-sm btn-ocean">Register</a>
                <?php endif; ?>

                <button class="mobile-nav-toggle" id="mobileMenuToggle" aria-label="Toggle Menu">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </nav>
    </div>
</header>
<?php /**PATH C:\xampp\htdocs\Ocean-Delight\resources\views/components/navbar.blade.php ENDPATH**/ ?>