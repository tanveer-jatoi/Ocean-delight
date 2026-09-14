<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div>
                <a href="<?php echo e(route('home')); ?>" class="logo-brand" style="color: white; margin-bottom: 1rem; display: inline-block;">
                    Ocean <span style="color: var(--color-sand-gold);">Delight</span>
                </a>
                <p style="margin-bottom: 1.25rem; font-size: 0.9rem; line-height: 1.6; max-width: 320px;">
                    Karachi's trusted seafood delivery service. We bring 100% fresh, wild seawater catch from the Arabian sea directly to your doorstep with guaranteed cold-chain freshness.
                </p>
                <div style="font-size: 0.85rem; color: var(--color-sand-accent);">
                    <strong>Payment Method:</strong> Cash on Delivery (COD) Only
                </div>
            </div>

            <div>
                <h4 class="footer-title">Explore Seafood</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo e(route('category.show', 'fish')); ?>">Fresh Fish</a></li>
                    <li><a href="<?php echo e(route('category.show', 'prawns')); ?>">Jumbo Prawns</a></li>
                    <li><a href="<?php echo e(route('category.show', 'crab')); ?>">Coastal Crabs</a></li>
                    <li><a href="<?php echo e(route('category.show', 'lobster')); ?>">Rock Lobster</a></li>
                    <li><a href="<?php echo e(route('category.show', 'squid')); ?>">Squid & Calamari</a></li>
                    <li><a href="<?php echo e(route('category.show', 'premium-seafood')); ?>">Premium Catch</a></li>
                </ul>
            </div>

            <div>
                <h4 class="footer-title">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li><a href="<?php echo e(route('products.index')); ?>">All Products</a></li>
                    <li><a href="<?php echo e(route('about')); ?>">About Us</a></li>
                    <li><a href="<?php echo e(route('contact')); ?>">Contact Us</a></li>
                    <li><a href="<?php echo e(route('privacy')); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo e(route('terms')); ?>">Terms & Conditions</a></li>
                </ul>
            </div>

            <div>
                <h4 class="footer-title">Karachi Delivery Hub</h4>
                <p style="font-size: 0.875rem; margin-bottom: 0.5rem;">
                    <strong>📍 Location:</strong> Fishery Wharf, Dockyard Road, Karachi, Pakistan
                </p>
                <p style="font-size: 0.875rem; margin-bottom: 0.5rem;">
                    <strong>📞 Phone:</strong> +92 3040313435
                </p>
                <p style="font-size: 0.875rem; margin-bottom: 0.5rem;">
                    <strong>✉ Email:</strong> [Oceandelight.com.pk]
                </p>
                <p style="font-size: 0.875rem; color: var(--color-sand-accent); margin-top: 1rem;">
                    <strong>Areas Covered:</strong> DHA, Clifton, Gulshan, PECHS, North Nazimabad, Saddar, Bahria Town & all Karachi localities.
                </p>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; <?php echo e(date('Y')); ?> <strong>Ocean Delight</strong> Seafood Premium. All rights reserved. Sourcing the seas, delivering excellence in Karachi.
        </div>
    </div>
</footer>
<?php /**PATH C:\xampp\htdocs\Ocean-Delight\resources\views/components/footer.blade.php ENDPATH**/ ?>