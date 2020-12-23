<?php $__env->startSection('title'); ?>
SQL Injection
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcenter'); ?>
<div class="barCenter">
  <div class="nameAttack">
    <p>SQL Injection</p>
  </div>
  <iframe name="iframe" id='iframe' class="iframe" src='action/sql/reset'>
  </iframe>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barright'); ?>
    <?php echo $__env->make('show.sql.barright', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script src="js/sql-injection.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('show.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/show/sql/injection.blade.php ENDPATH**/ ?>