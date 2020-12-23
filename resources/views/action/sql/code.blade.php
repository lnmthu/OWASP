@extends('action.layout.index')
@section('title')
  SQL Injection
@endsection
@section('nameAttack')
   SQL Injection
@endsection
@section('contentAttack')
    <div class='code'>
        @if(session('fail'))
            <p class="fail">{{ session('fail') }}</p> 
        @endif
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
@endsection
