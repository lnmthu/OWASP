<?php $__env->startSection('title'); ?>
  SQL Injection
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentAttack'); ?>
<div class="formAttack">
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
  <div class="headerForm">
    <a class="logout" href="action/sql/logout">Logout <?php if(session("name")): ?><?php echo e(session("name")); ?> <?php endif; ?></a>
    <p>Education Online</p>
  </div>
  <div class="contentForm">
    <form id='form-search' class="form-inline" action="action/sql/search" method="post" role="form">
      <?php echo csrf_field(); ?>
      <div class="form-group">
        <label for="">Tìm kiếm</label>
        <input name="search" type="text" class="form-control" id="valSearch" placeholder="Nhập từ khoá">
      </div>
      <button type="submit" id='search' class="btn btn-primary">Tìm</button>
    </form>
    <?php if(session("search")): ?>
    <p><span>Kết quả:</span><?php echo e(session("search")); ?></p>
    <?php endif; ?>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('action.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/action/sql/home.blade.php ENDPATH**/ ?>