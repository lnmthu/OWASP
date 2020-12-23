<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <base href="<?php echo e(asset('')); ?>">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" >
  <link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css" >
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" >
  <link type="text/css" rel="stylesheet" href="css/style.css" >

</head>

<body>
  <div id="content">
      <div class="container-fluid">
        <?php echo $__env->make('layout.barleft', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('barcenter'); ?>
        <?php echo $__env->make('layout.barright', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
  </div>
  <?php echo $__env->yieldContent('script'); ?>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html><?php /**PATH /var/www/resources/views/layout/index.blade.php ENDPATH**/ ?>