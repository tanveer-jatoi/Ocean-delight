<?php $__env->startSection('title', 'Register - Ocean Delight'); ?>

<?php $__env->startSection('content'); ?>

<div class="container" style="padding-top: 3rem; padding-bottom: 4rem; max-width: 580px;">
    <div class="card-box">
        <h1 style="font-family: var(--font-heading); font-size: 1.85rem; text-align: center; color: var(--color-ocean-dark); margin-bottom: 0.5rem;">
            Create Customer Account
        </h1>
        <p style="text-align: center; color: var(--color-text-muted); font-size: 0.9rem; margin-bottom: 2rem;">
            Register to place seafood orders for Karachi delivery
        </p>

        <form action="<?php echo e(route('register')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="name" class="form-label">Full Name *</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name')); ?>" placeholder="e.g. Tariq Mahmood" required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div style="grid-template-columns: 1fr 1fr; gap: 1rem; display: grid;">
                <div class="form-group">
                    <label for="email" class="form-label">Email Address *</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email')); ?>" placeholder="name@example.com" required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label for="phone" class="form-label">Phone Number *</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="<?php echo e(old('phone')); ?>" placeholder="+923001234567" required>
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="area" class="form-label">Karachi Area / Locality *</label>
                <select name="area" id="area" class="form-control" required>
                    <option value="">-- Select Your Area in Karachi --</option>
                    <?php $__currentLoopData = $karachiAreas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($area); ?>" <?php echo e(old('area') == $area ? 'selected' : ''); ?>><?php echo e($area); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label for="address" class="form-label">Complete Delivery Address *</label>
                <textarea name="address" id="address" rows="2" class="form-control" placeholder="House/Flat No., Street Name, Landmark" required><?php echo e(old('address')); ?></textarea>
                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div style="grid-template-columns: 1fr 1fr; gap: 1rem; display: grid;">
                <div class="form-group">
                    <label for="password" class="form-label">Password *</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: var(--color-danger); font-size: 0.8rem; margin-top: 0.25rem;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password *</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>
            </div>

            <button type="submit" class="btn btn-sand btn-block" style="padding: 0.9rem; font-size: 1rem; margin-top: 1rem;">
                Create Account & Continue
            </button>
        </form>

        <div style="text-align: center; margin-top: 1.5rem; padding-top: 1.25rem; border-top: 1px solid var(--color-border); font-size: 0.9rem; color: var(--color-text-muted);">
            Already have an account? <a href="<?php echo e(route('login')); ?>" style="color: var(--color-ocean-blue); font-weight: 600;">Sign In</a>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Ocean-Delight\resources\views/auth/register.blade.php ENDPATH**/ ?>