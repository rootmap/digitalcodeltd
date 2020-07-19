

<?php if(session('status')): ?>
    <div class="alert alert-success" id="create_account_error"><?php echo e(session('status')); ?></div>
<?php endif; ?>

<?php if(count($errors) > 0): ?>

            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-danger" id="create_account_error"><?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>
