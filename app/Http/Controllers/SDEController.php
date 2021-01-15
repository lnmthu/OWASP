<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register;
use App\Models\User;
use App\Repository\User\UserInterface;
use App\Rules\Captcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SDEController extends Controller
{
    protected $userRepository;
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function showSDE()
    {
        return view("show.SDE.main");

    }
    public function reset()
    {
        session()->flush();

    }
    public function social()
    {
        return view('action.SDE.social');
    }
    public function search(Request $request)
    {
        $search = $request->search;
        return view('action.SDE.social')->with(compact("search"));
    }
    public function getCode(){
        $name = "robots.txt";
        $action = "action/SDE/code";
        $code = "";
        if(session()->has("codeTest"))
            $code = session("codeTest");
        return view("action.SDE.code")->with(compact("name","action","code"));
    }
    public function postCode(Request $request){
        $code = $request->code;
        session()->put("codeTest",$code);
        $str = preg_replace("/\s+/", "", $code);
        $checkCode="User-agent:*Disallow:/test.txt";
        if($str == $checkCode)
            return true;
        return false;
    }
    public function robots(Request $request){
        $route = $request->id;
        if($route ==1){
            $text = file_get_contents("http://localhost/robots.txt");
            $url = "http://localhost/robots.txt";
        }else if($route ==2){
            $text = file_get_contents("http://localhost/test.txt");
            $url = "http://localhost/test.txt";
        }
        else if($route ==3){
            $text = file_get_contents("http://localhost/account.txt");
            $url = "http://localhost/account.txt";
        }else if($route ==4){
            $text = file_get_contents("http://localhost/private.txt");
            $url = "http://localhost/private.txt";
        }
        return view("action.SDE.robots")->with(compact("text","url"));
    }
    public function prevent()
    {
        $file = '/etc/apache2/apache2.conf';
        $current = file_get_contents($file);
        $current .= "\nJohn Smith";
        file_put_contents($file, $current);
    }
}
