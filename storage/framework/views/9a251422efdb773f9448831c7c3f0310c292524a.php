<?php $__env->startSection('nameAttack'); ?>
Relected XSS
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentAttack'); ?>
<div class="form-auth">
  <div class="browser">
    <div class="nav">
      <span class="buttons">
        <span class="button red"> </span>
        <span class="button orange"> </span>
        <span class="button green"> </span>
      </span>
      <div class="url">
        <input class="address" value="<?php echo e(url()->full()); ?>">
        <div class="load-icon"></div>
      </div>
    </div>
  </div>
    <h3 class="text-center">Login</h3>
        <?php if(session("success")): ?>
        <div class="alert alert-success" role="alert">
          <?php echo e(session("success")); ?>

        </div>
        <?php endif; ?>
        <div class="alert alert-danger alert-login" style="display: none">
      </div>
        <form id="login" action="action/xss/login" method="POST" data-toggle="validator" role="form">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email"
              placeholder="Please enter your Email" data-error="Bruh, that email address is invalid" required>
              <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password"
              placeholder="Please enter your Password" data-error="Please enter Password" required>
              <div class="help-block with-errors"></div>
          </div>
          <button type="submit" class="btn btn-primary auth">Login</button>
        </form>
        <div class="register">
            <span>Bạn không có tài khoản?</span><a href="action/xss/register">Đăng ký</a>
        </div>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('action.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/action/xss/login.blade.php ENDPATH**/ ?>