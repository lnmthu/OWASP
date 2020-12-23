<?php $__env->startSection('title'); ?>
Reflected XSS
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcenter'); ?>
<div class="barCenter">
  <iframe class="iframe" src='layout.index'>
  
  </iframe>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/attack/xss/reflectedXss.blade.php ENDPATH**/ ?>