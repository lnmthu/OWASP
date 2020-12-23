<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" >
  <link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css" >
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" >
  <link type="text/css" rel="stylesheet" href="css/style.css" >
  <base href="<?php echo e(asset('')); ?>">

</head>

<body>

  <div id="content">
      <div class="container-fluid">   
        <div class="form-auth">

            <h3 class="text-center">Sign up</h3>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="register" method="POST" data-toggle="validator" role="form">
                            <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="name"
                                placeholder="Please enter your Username" data-error="Please enter your Username" required >
                            <div class="help-block with-errors"></div>
                        </div>
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email"  class="form-control" id="email" name="email"
                            placeholder="Please enter your Email" data-error="Bruh, that email address is invalid" required >
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" id="password" name="password" placeholder="Please Enter Password"  data-error="Minimum of 6 characters" data-minlength="6"  required  />
                            <div class="help-block with-errors"></div>
                        </div>
                          <div class="form-group">
                            <label for="repass">Re_Password</label>
                              <input class="form-control" type="password" id="repass" name="repass"
                              data-match="#password" data-match-error="Whoops, these don't match" placeholder="Confirm"
                              required > 
                              <div class="help-block with-errors"></div>
                            </div>
                        <button type="submit" class="btn btn-primary">Sign up</button>
                    </form>
                    <div class="login">
                        <span>Bạn đã có tài khoản?</span><a href="login">Đăng nhập</a>
                        </div>
                </div>
            </div>      
        </div>      
    </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/validator.min.js"></script>

  <script src="js/main.js"></script>
</body>

</html><?php /**PATH /var/www/resources/views/register.blade.php ENDPATH**/ ?>