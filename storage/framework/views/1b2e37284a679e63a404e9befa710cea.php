<?php $__env->startSection('title', 'Shopping Cart - Ocean Delight Karachi'); ?>

<?php $__env->startSection('content'); ?>

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <h1 class="section-title" style="margin-bottom: 1.5rem;">Your Shopping Cart</h1>

    <?php if(count($cartItems) > 0): ?>
        <div class="checkout-grid">
            <!-- Cart Items Table -->
            <div class="card-box">
                <div style="overflow-x: auto;">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 1rem;">
                                            <img src="<?php echo e(asset($item['image'] ? $item['image'] : 'images/products/default.jpg')); ?>" alt="<?php echo e($item['name']); ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: var(--radius-sm);" onerror="this.src='https://via.placeholder.com/100/1E3E62/FFFFFF?text=Fish';">
                                            <div>
                                                <a href="<?php echo e(route('products.show', $item['slug'])); ?>" style="font-weight: 700; color: var(--color-ocean-dark);">
                                                    <?php echo e($item['name']); ?>

                                                </a>
                                                <div style="font-size: 0.75rem; color: var(--color-text-muted);"><?php echo e($item['weight_unit']); ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="font-weight: 600;">
                                        PKR <?php echo e(number_format($item['price'], 0)); ?>

                                    </td>
                                    <td>
                                        <form action="<?php echo e(route('cart.update')); ?>" method="POST" style="display: flex; align-items: center; gap: 0.4rem;">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="product_id" value="<?php echo e($item['product_id']); ?>">
                                            <input type="number" name="quantity" value="<?php echo e($item['quantity']); ?>" min="1" max="<?php echo e($item['stock']); ?>" style="width: 55px; padding: 0.3rem; text-align: center; border: 1px solid var(--color-border); border-radius: 4px;" onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td style="font-weight: 700; color: var(--color-ocean-blue);">
                                        PKR <?php echo e(number_format($item['line_total'], 0)); ?>

                                    </td>
                                    <td>
                                        <form action="<?php echo e(route('cart.remove')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="product_id" value="<?php echo e($item['product_id']); ?>">
                                            <button type="submit" style="background: none; border: none; color: var(--color-danger); cursor: pointer; font-size: 1.1rem;" title="Remove Item">
                                                ✕
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 1rem;">
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-sm btn-outline-white" style="color: var(--color-ocean-dark); border-color: var(--color-border);">
                        &larr; Continue Shopping
                    </a>
                    <form action="<?php echo e(route('cart.clear')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-sm btn-outline-white" style="color: var(--color-danger); border-color: var(--color-danger);">
                            Clear Cart 🗑
                        </button>
                    </form>
                </div>
            </div>

            <!-- Order Summary Box -->
            <div>
                <div class="card-box" style="position: sticky; top: 90px;">
                    <h3 style="font-family: var(--font-heading); font-size: 1.25rem; margin-bottom: 1.25rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.75rem;">
                        Order Summary
                    </h3>

                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.75rem; font-size: 0.95rem;">
                        <span>Subtotal:</span>
                        <strong>PKR <?php echo e(number_format($subtotal, 0)); ?></strong>
                    </div>

                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.75rem; font-size: 0.95rem;">
                        <span>Karachi Delivery Fee:</span>
                        <strong>PKR <?php echo e(number_format($deliveryFee, 0)); ?></strong>
                    </div>

                    <div style="background-color: var(--color-bg-light); padding: 0.75rem; border-radius: var(--radius-sm); margin: 1rem 0; font-size: 0.85rem; color: var(--color-ocean-dark);">
                        <strong>Payment Method:</strong> Cash on Delivery (COD) Only
                    </div>

                    <div style="border-top: 2px dashed var(--color-border); padding-top: 1rem; display: flex; justify-content: space-between; font-size: 1.25rem; font-weight: 700; color: var(--color-ocean-dark); margin-bottom: 1.5rem;">
                        <span>Grand Total:</span>
                        <span style="color: var(--color-ocean-blue);">PKR <?php echo e(number_format($grandTotal, 0)); ?></span>
                    </div>

                    <?php if($subtotal < $minOrderAmount): ?>
                        <div class="alert alert-warning" style="font-size: 0.85rem; padding: 0.75rem;">
                            Minimum order for Karachi delivery is PKR <?php echo e(number_format($minOrderAmount, 0)); ?>. Please add PKR <?php echo e(number_format($minOrderAmount - $subtotal, 0)); ?> more.
                        </div>
                        <button class="btn btn-ocean btn-block" disabled style="opacity: 0.5;">
                            Proceed to Checkout
                        </button>
                    <?php else: ?>
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(route('checkout.index')); ?>" class="btn btn-ocean btn-block">
                                Proceed to Checkout &rarr;
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('checkout.index')); ?>" class="btn btn-sand btn-block">
                                Login / Register to Checkout
                            </a>
                            <div style="text-align: center; font-size: 0.8rem; color: var(--color-text-muted); margin-top: 0.5rem;">
                                Registration required to place order
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="card-box" style="text-align: center; padding: 4rem 2rem;">
            <svg width="54" height="54" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="color: var(--color-text-muted); margin-bottom: 1rem;">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
            <h2 style="font-family: var(--font-heading); font-size: 1.65rem; margin-bottom: 0.5rem;">Your Shopping Cart is Empty</h2>
            <p style="color: var(--color-text-muted); margin-bottom: 1.5rem;">Explore our fresh Karachi catches and add seafood to your cart!</p>
            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-ocean">Explore Seafood Catalog</a>
        </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Ocean-Delight\resources\views/cart/index.blade.php ENDPATH**/ ?>