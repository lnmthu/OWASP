<?php $__env->startSection('title'); ?>
  SQL Injection
<?php $__env->stopSection(); ?>
<?php $__env->startSection('nameAttack'); ?>
   SQL Injection
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentAttack'); ?>
    <div class='code'>
        <?php if(session('fail')): ?>
            <p class="fail"><?php echo e(session('fail')); ?></p> 
        <?php endif; ?>
        <p class="name-code">source.php</p>
            <pre disabled name="code" id="text-code" class="text-code file">&lt?php
<span class="comment">// Kết nối database</span>
$conn = mysqli_connect($db_host,$db_user,$db_pw,$db_name);

<span class="comment">// Lấy Password và Email bằng method POST</span>
$password = isset($_POST['password']) ? $_POST['password'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;

<span class="comment">// Select user and password</span>
$sqlSelect = "SELECT * FROM users WHERE email = '$email' and password = '$password' "; 

<span class="comment">// Thực hiện câu lệnh $sqlSelect</span>
$result = mysqli_query($conn, $sqlSelect) or die( '' . ((is_object($conn)) ? mysqli_error($conn) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '' );

if(mysqli_num_rows($result) > 0)
{
    <span class="comment">// Lấy row data user</span>
    $row = mysqli_fetch_assoc($result);

    <span class="comment">// Set Session</span>
    $_SESSION['id'] = $row['id'] 
    $_SESSION['name'] = $row['name']

    return true;
} else {
    return "Email or Password is not correct";
}
?>
</pre>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('action.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/action/sql/code.blade.php ENDPATH**/ ?>