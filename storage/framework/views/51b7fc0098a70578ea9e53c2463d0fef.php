<?php $__env->startSection('title', 'Contact Us - Ocean Delight Karachi'); ?>
<?php $__env->startSection('meta_description', 'Get in touch with Ocean Delight Karachi customer team for seafood inquiries, wholesale orders, or delivery support.'); ?>

<?php $__env->startSection('content'); ?>

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <!-- Breadcrumb -->
    <div style="margin-bottom: 1.5rem; font-size: 0.875rem; color: var(--color-text-muted);">
        <a href="<?php echo e(route('home')); ?>">Home</a> &nbsp;/&nbsp; <strong style="color: var(--color-ocean-dark);">Contact Us</strong>
    </div>

    <div class="checkout-grid">
        <!-- Contact Form -->
        <div class="card-box">
            <h1 class="section-title" style="font-size: 1.85rem; margin-bottom: 0.5rem;">Send Us a Message</h1>
            <p style="color: var(--color-text-muted); font-size: 0.9rem; margin-bottom: 1.5rem;">
                Have questions about seafood availability, custom cuts, or delivery timing in Karachi? Reach out to us.
            </p>

            <form action="<?php echo e(route('contact.submit')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div style="grid-template-columns: 1fr 1fr; gap: 1rem; display: grid;">
                    <div class="form-group">
                        <label for="name" class="form-label">Full Name *</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name', auth()->user()?->name)); ?>" required>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: var(--color-danger); font-size: 0.8rem;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo e(old('phone', auth()->user()?->phone)); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address *</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email', auth()->user()?->email)); ?>" required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: var(--color-danger); font-size: 0.8rem;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control" value="<?php echo e(old('subject')); ?>" placeholder="e.g. Seafood preparation request / Order inquiry">
                </div>

                <div class="form-group">
                    <label for="message" class="form-label">Your Message *</label>
                    <textarea name="message" id="message" rows="4" class="form-control" required placeholder="Type your message here..."><?php echo e(old('message')); ?></textarea>
                    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: var(--color-danger); font-size: 0.8rem;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button type="submit" class="btn btn-ocean" style="padding: 0.85rem 1.75rem;">
                    Submit Inquiry
                </button>
            </form>
        </div>

        <!-- Contact Info Card -->
        <div>
            <div class="card-box" style="position: sticky; top: 90px; background-color: var(--color-ocean-dark); color: white; border: none;">
                <h3 style="font-family: var(--font-heading); font-size: 1.35rem; color: white; margin-bottom: 1.25rem;">
                    Ocean Delight HQ
                </h3>

                <div style="display: flex; flex-direction: column; gap: 1.25rem; font-size: 0.95rem;">
                    <div>
                        <strong style="color: var(--color-sand-accent); display: block; font-size: 0.825rem; text-transform: uppercase;">Karachi Address</strong>
                        <p style="margin-top: 0.2rem; color: rgba(255,255,255,0.9);">
                            <?php echo e($contactAddress); ?>

                        </p>
                    </div>

                    <div>
                        <strong style="color: var(--color-sand-accent); display: block; font-size: 0.825rem; text-transform: uppercase;">Direct Line</strong>
                        <p style="margin-top: 0.2rem; color: rgba(255,255,255,0.9);">
                            <?php echo e($contactPhone); ?>

                        </p>
                    </div>

                    <div>
                        <strong style="color: var(--color-sand-accent); display: block; font-size: 0.825rem; text-transform: uppercase;">Support Email</strong>
                        <p style="margin-top: 0.2rem; color: rgba(255,255,255,0.9);">
                            <?php echo e($contactEmail); ?>

                        </p>
                    </div>

                    <div>
                        <strong style="color: var(--color-sand-accent); display: block; font-size: 0.825rem; text-transform: uppercase;">Operation Hours</strong>
                        <p style="margin-top: 0.2rem; color: rgba(255,255,255,0.9);">
                            Monday &ndash; Sunday: 7:00 AM &ndash; 9:00 PM
                        </p>
                    </div>

                    <div style="border-top: 1px solid rgba(255,255,255,0.15); padding-top: 1rem; font-size: 0.85rem; color: var(--color-sand-light);">
                        🚚 Orders placed before 1:00 PM are delivered same evening across Karachi!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Ocean-Delight\resources\views/pages/contact.blade.php ENDPATH**/ ?>