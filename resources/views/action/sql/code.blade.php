@extends('action.layout.index')
@section('nameAttack')
   SQL Injection
@endsection
@section('contentAttack')
    <div class='code'>
        @if(session('fail'))
            <p class="fail">{{ session('fail') }}</p> 
        @endif
        <p class="name-code">source.php</p>
        <textarea disabled name="code" id="text-code" class="text-code file">&lt?php
            $conn = mysqli_connect($db_host,$db_user,$db_pw,$db_name);

            $password = isset($_POST['password']) ? $_POST['password'] : null;

            $email = isset($_POST['email']) ? $_POST['email'] : null;

            $sqlSelect = "SELECT * FROM users WHERE email = '$email' and password = '$password' ";

            $result = mysqli_query($conn, $sqlSelect) or die( '' . ((is_object($conn)) ? mysqli_error($conn) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '' );
    
            if(mysqli_num_rows($result) > 0)
            {
                return true;
            } else {
                return "Email or Password is not correct";
            }
        </textarea>
    </div>
@endsection
