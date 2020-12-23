<?php $__env->startSection('title'); ?>
 Broken Authentication
<?php $__env->stopSection(); ?>
<?php $__env->startSection('nameAttack'); ?>
Broken Authentication
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentAttack'); ?>
<div id="terminal-container"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="css/xterm.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="js/xterm.js"></script>
<script src="/addons/fit/fit.js"></script>
<script src="/socket.io/socket.io.js"></script>
<script  type="module" src="js/broken-auth.js"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('action.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/action/broken_auth/terminal.blade.php ENDPATH**/ ?>