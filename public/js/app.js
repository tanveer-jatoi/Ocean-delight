/*
|--------------------------------------------------------------------------
| Ocean Delight - Application Client JavaScript
| Cart Interactions, Mobile Nav, Toast Alerts
|--------------------------------------------------------------------------
*/

document.addEventListener('DOMContentLoaded', function () {
    // 1. Mobile Menu Toggle
    const menuToggle = document.getElementById('mobileMenuToggle');
    const navMenu = document.getElementById('navMenu');

    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', function () {
            navMenu.classList.toggle('active');
            if (navMenu.classList.contains('active')) {
                navMenu.style.display = 'flex';
                navMenu.style.flexDirection = 'column';
                navMenu.style.position = 'absolute';
                navMenu.style.top = '72px';
                navMenu.style.left = '0';
                navMenu.style.width = '100%';
                navMenu.style.backgroundColor = '#ffffff';
                navMenu.style.padding = '1.5rem';
                navMenu.style.boxShadow = '0 10px 25px rgba(0,0,0,0.1)';
                navMenu.style.zIndex = '99';
            } else {
                navMenu.style.display = '';
            }
        });
    }

    // 2. Quantity Selector Buttons (+ / -)
    const qtyDecrements = document.querySelectorAll('.qty-decrement');
    const qtyIncrements = document.querySelectorAll('.qty-increment');

    qtyDecrements.forEach(btn => {
        btn.addEventListener('click', function () {
            const input = this.parentElement.querySelector('.qty-input');
            if (input && parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        });
    });

    qtyIncrements.forEach(btn => {
        btn.addEventListener('click', function () {
            const input = this.parentElement.querySelector('.qty-input');
            const max = parseInt(input.getAttribute('max') || '50');
            if (input && parseInt(input.value) < max) {
                input.value = parseInt(input.value) + 1;
            }
        });
    });

    // 3. Quick Add to Cart via AJAX
    const quickAddForms = document.querySelectorAll('.quick-add-form');

    quickAddForms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '...';

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;

                if (data.success) {
                    // Update Cart Counter Badge in Navbar
                    const cartBadge = document.getElementById('navbarCartBadge');
                    if (cartBadge) {
                        cartBadge.textContent = data.cart_count;
                        cartBadge.style.display = 'flex';
                    }

                    showToast(data.message || 'Added to cart!', 'success');
                } else {
                    showToast(data.message || 'Could not add product', 'error');
                }
            })
            .catch(err => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
                this.submit(); // Fallback to traditional POST submit if AJAX fails
            });
        });
    });

    // 4. Toast Message Notification Helper
    function showToast(message, type = 'success') {
        let container = document.getElementById('toast-container');
        if (!container) {
            container = document.createElement('div');
            container.id = 'toast-container';
            container.style.position = 'fixed';
            container.style.bottom = '20px';
            container.style.right = '20px';
            container.style.zIndex = '9999';
            container.style.display = 'flex';
            container.style.flexDirection = 'column';
            container.style.gap = '10px';
            document.body.appendChild(container);
        }

        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        toast.style.padding = '12px 20px';
        toast.style.borderRadius = '8px';
        toast.style.color = '#ffffff';
        toast.style.fontWeight = '600';
        toast.style.fontSize = '14px';
        toast.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
        toast.style.backgroundColor = type === 'success' ? '#10B981' : '#EF4444';
        toast.style.transition = 'all 0.3s ease';

        toast.textContent = message;
        container.appendChild(toast);

        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(10px)';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }
});
