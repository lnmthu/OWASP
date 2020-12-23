<?php $__env->startSection('nameAttack'); ?>
    Relected XSS
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentAttack'); ?>
    <div class='code'>
        <p class="name-code"><?php echo e($name); ?></p>
        <a href="action/xss/reflected-xss" class='back'>Back</a>
        <?php if(session('fail')): ?>
        <p class="fail"><?php echo e(session('fail')); ?></p> 
        <?php endif; ?>
        <form action="<?php echo e($action); ?>" method="get">
            <?php echo csrf_field(); ?>
            <button id="deploy" class="deploy">Deploy</button>
            <textarea name="code" id="text-code" class="text-code"><?php echo $code; ?></textarea>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('action.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/action/xss/code.blade.php ENDPATH**/ ?>