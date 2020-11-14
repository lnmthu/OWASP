<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repository\User\UserInterface;
use Illuminate\Support\Facades\Crypt;

class SqlController extends Controller
{
    protected $userRepository;
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function home(){
        return view('show.sql.injection');
    }
    public function getLogin(){
        return view('action.sql.injection');
    }
    public function postLogin(Request $request){
        
        $database_host = env('DB_HOST');
        $database_name = env('DB_DATABASE');
        $database_user = env('DB_USERNAME');
        $database_password = env('DB_PASSWORD');
        $conn = mysqli_connect($database_host,$database_user,$database_password,$database_name);
        $sqlSelect = "SELECT * FROM users WHERE email ='$request->email' and password = '$request->password'";
        $result = mysqli_query($conn, $sqlSelect) or die( '' . ((is_object($conn)) ? mysqli_error($conn) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '' );
        if(mysqli_num_rows($result) > 0)
        {
            $newArr=[];
            $data = mysqli_fetch_assoc($result);
           dd(Crypt::decryptString($data['password']));
            $this->userRepository->login($data);

            return "SQL login success";
        }else{
            return "Email or Password is not correct";
        }

    }
    public function actionShowCode(){
        return view('action.sql.code');
    }
    public function actionHome(){
        return view('action.sql.home');
    }
    public function postSearch(Request $request){
        return redirect()->back()->with("search",$request->search);
    }
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect('action/sql/login');
    }
    
}
