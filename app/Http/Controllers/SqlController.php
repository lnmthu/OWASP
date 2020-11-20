<?php

namespace App\Http\Controllers;

use App\Repository\User\UserInterface;
use Illuminate\Http\Request;
use PDO;

class SqlController extends Controller
{
    protected $userRepository;
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function home()
    {
        return view('show.sql.injection');
    }
    public function reset(){
        session()->flush();
        return redirect('action/sql/login');
    }
    public function getLogin()
    {
        return view('action.sql.injection');
    }
    public function postLogin(Request $request)
    {
        $database_host = env('DB_HOST');
        $database_name = env('DB_DATABASE');
        $database_user = env('DB_USERNAME');
        $database_password = env('DB_PASSWORD');
        if (session("codePreventSql")) {
            $database = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_password);
            $bool = eval(session("preventSql"));
            if($bool){
                return "SQL login success";
            }
            return "Email or Password is not correct";
        } else {
            $conn = mysqli_connect($database_host, $database_user, $database_password, $database_name);
            $sqlSelect = "SELECT * FROM users WHERE email ='$request->email' and password = '$request->password'";
            $result = mysqli_query($conn, $sqlSelect) or die('' . ((is_object($conn)) ? mysqli_error($conn) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '');
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                session()->put('id', $row['id']);
                session()->put('name', $row['name']);

                return "SQL login success";
            } else {
                return "Email or Password is not correct";
            }
        }

    }
    public function actionShowCode()
    {
        return view('action.sql.code');
    }
    public function actionHome()
    {
        return view('action.sql.home');
    }
    public function postSearch(Request $request)
    {
        return redirect()->back()->with("search", $request->search);
    }
    public function logout()
    {
        if (session("id")) {
            session()->forget(['id', 'name']);
            return redirect('action/sql/login');
        }
        return redirect()->back();
    }
    public function showCodePrevent()
    {
        return view("action.sql.deploy");
    }
    public function postCodePrevent(Request $request)
    {
        $code = $request->code;
        if ($code) {
            $stringInput = preg_replace("/\s+/", '', $code);
            $codeTest = html_entity_decode(
                "
                &#36;password = isset(&#36;_POST['password']) ? &#36;_POST['password'] : null;
                &#36;email = isset(&#36;_POST['email']) ? &#36;_POST['email'] : null;
                &#36;data = &#36;GLOBALS['database']->prepare('select * from users where email = :email and password = :password')
                &#36;data->bindParam( ':email', &#36;email, PDO::PARAM_STR );
                &#36;data->bindParam( ':password', &#36;password, PDO::PARAM_STR );
                &#36;data->execute();
                &#36;row = &#36;data->fetch();
                if( &#36;data->rowCount() == 1 ) {
                    &#36;_SESSION['id] = &#36;row['id'];
                    &#36;_SESSION['name'] = &#36;row['name'];
                    return true;
                }
                return false;
                ");
            $stringCode = preg_replace("/\s+/", '', $codeTest);
            session()->put("codePreventSql", $code);
            if ($stringInput != $stringCode) {
                return redirect()->back()->with("fail", "Code của bạn không đúng với yêu cầu");
            } else {
                return redirect("action/sql/logout");
            }
        }
    }
}
