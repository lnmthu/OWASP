<?php $__env->startSection('nameAttack'); ?>
    Relected XSS
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentAttack'); ?>
    <div class='code'>
        <?php if(session('fail')): ?>
            <p class="fail"><?php echo e(session('fail')); ?></p> 
        <?php endif; ?>
        <p class="name-code"><?php echo e($name); ?></p>
        <textarea disabled name="code" id="text-code" class="text-code file"><?php echo $cookie; ?></textarea>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('action.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/action/xss/file.blade.php ENDPATH**/ ?>