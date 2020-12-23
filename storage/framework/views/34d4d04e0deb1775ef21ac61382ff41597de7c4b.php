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
    <a class="logout" href="action/xss/logout">Logout (<?php echo e(Auth::user()->name); ?>)</a>
    <p>Shopping Online</p>
  </div>
  <div class="contentForm">
    <form id='form-search' class="form-inline" action="" method="get" role="form">
      <div class="form-group">
        <label for="">Tìm kiếm</label>
        <input name="search" type="text" class="form-control" id="valSearch" placeholder="Nhập từ khoá">
      </div>
      <button type="submit" id='search' class="btn btn-primary">Tìm</button>
    </form>
    <?php if($search): ?>
    <p><span>Kết quả:</span><?php echo $search?></p>
    <?php endif; ?>
  </div>
  <a href="http://acttacker.tk" target="_blank" class="view-source">View source</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('action.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/action/sql/SqlInjection.blade.php ENDPATH**/ ?>