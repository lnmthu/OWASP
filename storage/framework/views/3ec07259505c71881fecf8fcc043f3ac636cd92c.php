<?php $__env->startSection('image'); ?>
<img src="https://p.w3layouts.com/demos/ohh/web/images/error-img.png" title="error" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', '404 PAGE'); ?>

<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/errors/404.blade.php ENDPATH**/ ?>