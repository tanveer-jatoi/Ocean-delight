<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div>
                <a href="{{ route('home') }}" class="logo-brand logo-brand-footer" style="margin-bottom: 1rem; display: inline-flex; text-decoration: none;" aria-label="Ocean Delight Fresh Seafood">
                    <div class="logo-icon-wrapper">
                        <svg class="seafood-logo-svg" width="38" height="38" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="oceanGradFooter" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#00A8CC" />
                                    <stop offset="100%" stop-color="#FFFFFF" />
                                </linearGradient>
                                <linearGradient id="goldGradFooter" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#F3C623" />
                                    <stop offset="100%" stop-color="#E2B857" />
                                </linearGradient>
                            </defs>
                            <circle cx="18" cy="18" r="16.5" fill="url(#oceanGradFooter)" opacity="0.12"/>
                            <circle cx="18" cy="18" r="15" stroke="url(#oceanGradFooter)" stroke-width="1.5" stroke-dasharray="4 2" opacity="0.35"/>
                            <path d="M9 20.5C10.5 14.5 15.5 9.5 25.5 7.5C24.5 13 21 18.5 14.5 21.5C12.5 22.5 10.2 22 9 20.5Z" fill="url(#oceanGradFooter)"/>
                            <path d="M8.5 21C6 23.5 3.8 23 2.8 21.2C4.3 19.8 6 19 8 19.5L8.5 21Z" fill="url(#goldGradFooter)"/>
                            <path d="M9 21.8C7 24.5 4.8 25.8 3.2 24.5C4.4 23 5.6 21.2 7.8 20.2L9 21.8Z" fill="url(#oceanGradFooter)"/>
                            <path d="M9.8 22.4C8.2 25.8 6.2 27.5 4.5 26.8C5.5 24.8 6.5 22.8 8.4 21.2L9.8 22.4Z" fill="url(#goldGradFooter)"/>
                            <path d="M24 8.5C27.5 6 31 5.5 33 6.5" stroke="url(#goldGradFooter)" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M22.5 10.5C26.5 8.5 30 8.8 32 10.5" stroke="url(#oceanGradFooter)" stroke-width="1.4" stroke-linecap="round"/>
                            <path d="M18.5 13.5C17.5 15 17 17 17.5 19" stroke="#1E3E62" stroke-width="1.2" stroke-linecap="round" opacity="0.7"/>
                            <circle cx="22.5" cy="11.5" r="1.3" fill="#1E3E62"/>
                        </svg>
                    </div>
                    <div class="logo-text-group">
                        <span class="logo-text-main" style="color: #FFFFFF;">Ocean <span style="color: var(--color-sand-gold);">Delight</span></span>
                        <span class="logo-text-sub" style="color: var(--color-sand-accent);">FRESH SEAFOOD MARKET</span>
                    </div>
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
                    <li><a href="{{ route('category.show', 'fish') }}">Fresh Fish</a></li>
                    <li><a href="{{ route('category.show', 'prawns') }}">Jumbo Prawns</a></li>
                    <li><a href="{{ route('category.show', 'crab') }}">Coastal Crabs</a></li>
                    <li><a href="{{ route('category.show', 'lobster') }}">Rock Lobster</a></li>
                    <li><a href="{{ route('category.show', 'squid') }}">Squid & Calamari</a></li>
                    <li><a href="{{ route('category.show', 'premium-seafood') }}">Premium Catch</a></li>
                </ul>
            </div>

            <div>
                <h4 class="footer-title">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('products.index') }}">All Products</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
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
            &copy; {{ date('Y') }} <strong>Ocean Delight</strong> Seafood Premium. All rights reserved. Sourcing the seas, delivering excellence in Karachi.
        </div>
    </div>
</footer>
