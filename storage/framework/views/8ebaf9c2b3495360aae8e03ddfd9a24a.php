<header class="site-header">
    <div class="container">
        <nav class="navbar">
            <a href="<?php echo e(route('home')); ?>" class="logo-brand" aria-label="Ocean Delight Fresh Seafood">
                <div class="logo-icon-wrapper">
                    <svg class="seafood-logo-svg" width="38" height="38" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="oceanGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#00A8CC" />
                                <stop offset="100%" stop-color="#1E3E62" />
                            </linearGradient>
                            <linearGradient id="goldGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#F3C623" />
                                <stop offset="100%" stop-color="#D49B27" />
                            </linearGradient>
                        </defs>
                        <!-- Ocean Crest Ring -->
                        <circle cx="18" cy="18" r="16.5" fill="url(#oceanGrad)" opacity="0.08"/>
                        <circle cx="18" cy="18" r="15" stroke="url(#oceanGrad)" stroke-width="1.5" stroke-dasharray="4 2" opacity="0.35"/>
                        <!-- Sleek Fish & Prawn Vector Silhouette -->
                        <path d="M9 20.5C10.5 14.5 15.5 9.5 25.5 7.5C24.5 13 21 18.5 14.5 21.5C12.5 22.5 10.2 22 9 20.5Z" fill="url(#oceanGrad)"/>
                        <!-- Prawn Fan Tail Fins -->
                        <path d="M8.5 21C6 23.5 3.8 23 2.8 21.2C4.3 19.8 6 19 8 19.5L8.5 21Z" fill="url(#goldGrad)"/>
                        <path d="M9 21.8C7 24.5 4.8 25.8 3.2 24.5C4.4 23 5.6 21.2 7.8 20.2L9 21.8Z" fill="url(#oceanGrad)"/>
                        <path d="M9.8 22.4C8.2 25.8 6.2 27.5 4.5 26.8C5.5 24.8 6.5 22.8 8.4 21.2L9.8 22.4Z" fill="url(#goldGrad)"/>
                        <!-- Prawn Whisker Curves -->
                        <path d="M24 8.5C27.5 6 31 5.5 33 6.5" stroke="url(#goldGrad)" stroke-width="1.8" stroke-linecap="round"/>
                        <path d="M22.5 10.5C26.5 8.5 30 8.8 32 10.5" stroke="url(#oceanGrad)" stroke-width="1.4" stroke-linecap="round"/>
                        <!-- Scale Details -->
                        <path d="M18.5 13.5C17.5 15 17 17 17.5 19" stroke="#FFFFFF" stroke-width="1.2" stroke-linecap="round" opacity="0.7"/>
                        <path d="M21 11.8C20 13.3 19.5 15.3 20 17.3" stroke="#FFFFFF" stroke-width="1.2" stroke-linecap="round" opacity="0.5"/>
                        <!-- Eye -->
                        <circle cx="22.5" cy="11.5" r="1.3" fill="#FFFFFF"/>
                        <circle cx="22.7" cy="11.3" r="0.5" fill="#1E3E62"/>
                    </svg>
                </div>
                <div class="logo-text-group">
                    <span class="logo-text-main">Ocean <span class="logo-text-highlight">Delight</span></span>
                    <span class="logo-text-sub">FRESH SEAFOOD</span>
                </div>
            </a>

            <ul class="nav-menu" id="navMenu">
                <li><a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">Home</a></li>
                <li><a href="<?php echo e(route('products.index')); ?>" class="nav-link <?php echo e(request()->routeIs('products.*') ? 'active' : ''); ?>">Seafood</a></li>
                <li><a href="<?php echo e(route('about')); ?>" class="nav-link <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>">About</a></li>
                <li><a href="<?php echo e(route('contact')); ?>" class="nav-link <?php echo e(request()->routeIs('contact') ? 'active' : ''); ?>">Contact</a></li>

                <?php if(auth()->guard()->check()): ?>
                    <li class="nav-mobile-only">
                        <a href="<?php echo e(route('account.index')); ?>" class="nav-link">Account (<?php echo e(Str::limit(auth()->user()->name, 10)); ?>)</a>
                    </li>
                    <?php if(auth()->user()->isAdmin()): ?>
                        <li class="nav-mobile-only">
                            <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link">Admin</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-mobile-only">
                        <a href="<?php echo e(route('login')); ?>" class="nav-link <?php echo e(request()->routeIs('login') ? 'active' : ''); ?>">Login</a>
                    </li>
                    <li class="nav-mobile-only">
                        <a href="<?php echo e(route('register')); ?>" class="nav-link <?php echo e(request()->routeIs('register') ? 'active' : ''); ?>">Sign Up</a>
                    </li>
                <?php endif; ?>
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
                    <div class="nav-account-actions">
                        <a href="<?php echo e(route('account.index')); ?>" class="btn btn-sm btn-ocean">
                            Account (<?php echo e(Str::limit(auth()->user()->name, 10)); ?>)
                        </a>
                        <?php if(auth()->user()->isAdmin()): ?>
                            <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-sm btn-sand">
                                Admin
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if(auth()->guard()->guest()): ?>
                    <div class="nav-account-actions">
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-sm btn-outline-ocean">
                            Login
                        </a>
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-sm btn-ocean">
                            Sign Up
                        </a>
                    </div>
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
</header><?php /**PATH C:\xampp\htdocs\Ocean-Delight\resources\views/components/navbar.blade.php ENDPATH**/ ?>