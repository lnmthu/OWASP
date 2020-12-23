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
      <div class="signup">
    <h3 class="text-center">Sign up</h3>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form id="register" action="action/xss/register" method="POST" data-toggle="validator" role="form">
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
                      data-match="#password" data-error="Please enter your Re_Password" data-match-error="Whoops, these don't match" placeholder="Confirm"
                      required > 
                      <div class="help-block with-errors"></div>
                    </div>
                <button type="submit" class="btn btn-primary auth">Sign up</button>
            </form>
            <div class="login">
                <span>Bạn đã có tài khoản?</span><a href="action/xss/login">Đăng nhập</a>
                </div>
        </div>
    </div>      
</div>    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('action.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/action/xss/register.blade.php ENDPATH**/ ?>