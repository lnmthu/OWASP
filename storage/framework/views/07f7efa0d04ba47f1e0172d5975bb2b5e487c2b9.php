<?php $__env->startSection('title'); ?>
  SQL Injection
<?php $__env->stopSection(); ?>
<?php $__env->startSection('nameAttack'); ?>
    Relected XSS
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentAttack'); ?>
    <div class='code'>
        <p class="name-code">source.php</p>
        <a href="action/sql/login" class='back'>Back</a>
        <?php if(session('fail')): ?>
            <p class="fail"><?php echo e(session('fail')); ?></p> 
        <?php endif; ?>
        <form action="action/sql/post-code-prevent" method="post">
            <?php echo csrf_field(); ?>
            <button id="deploy" class="deploy">Deploy</button>
            <textarea name="code" id="text-code" class="text-code"><?php if(session('codePreventSql')): ?><?php echo e(session('codePreventSql')); ?> <?php endif; ?> </textarea>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('action.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/action/sql/deploy.blade.php ENDPATH**/ ?>