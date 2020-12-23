<?php $__env->startSection('title'); ?>
Reflected XSS
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcenter'); ?>
<div class="barCenter">
  <div class="nameAttack">
    <p>Reflected XSS</p>
  </div>
  <iframe name="iframe" id='iframe' class="iframe" src='action/xss/reset'>
  </iframe>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barright'); ?>
    <?php echo $__env->make('show.xss.barright', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script src="js/reflected-xss.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('show.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/show/xss/reflectedXss.blade.php ENDPATH**/ ?>