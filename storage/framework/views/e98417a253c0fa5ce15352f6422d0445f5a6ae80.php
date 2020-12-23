<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <base href="<?php echo e(asset('')); ?>">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css" >
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" >
  <link type="text/css" rel="stylesheet" href="css/style.css" >
<?php echo $__env->yieldContent('css'); ?>
</head>

<body>

  <div id="content">
        <div class="barCenter">
          <div class="contentAttack">
            <?php echo $__env->yieldContent('contentAttack'); ?>
          </div>

        </div>
      </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/validator.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <?php echo $__env->yieldContent('script'); ?>

</body>

</html><?php /**PATH /var/www/resources/views/action/layout/index.blade.php ENDPATH**/ ?>