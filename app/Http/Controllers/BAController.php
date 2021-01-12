<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register;
use App\Models\User;
use App\Repository\User\UserInterface;
use App\Rules\Captcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BAController extends Controller
{
    protected $userRepository;
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function showBA()
    {
        return view("show.BA.main");
    }
    public function reset()
    {
        session()->flush();
    }
    public function getLoginSocial()
    {
        if (session("prevent")) {
            return view("action.BA.loginSocialPrevent");
        }
        return view("action.BA.loginSocial");
    }
    public function postLoginSocial(Request $request)
    {

        $data = $request->all();
        if ($data) {
            $user = $this->userRepository->login($data);
            if ($user) {
                return true;
            }
        }
        return false;
    }
    public function postLoginSocialPrevent(Request $request)
    {
        $data = $request->validate([
            "email" => "required|email",
            "password" => "required",
            'g-recaptcha-response' => new Captcha(),
        ]);
        if ($data) {
            $user = $this->userRepository->login($data);
            if ($user) {
                return redirect("action/BA/social");
            }
        }
        return redirect("action/BA/login-social")->with("error", "Email or Password is not correct");
    }
    public function getRegisterSocial()
    {
        return view("action.BA.registerSocial");
    }
    public function postRegisterSocial(Register $request)
    {
        $data = $request->all();
        if ($data) {
            $user = $this->userRepository->create($data);
        }
        return isset($user);
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('action/BA/login-social');
    }
    public function social()
    {
        return view('action.BA.social');
    }
    public function search(Request $request)
    {
        $search = $request->search;
        return view('action.BA.social')->with(compact("search"));
    }
    public function getInfo()
    {
        return view("action.BA.info");
    }
    public function postInfo(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();
        return true;
        // return redirect("action/BA/info")->with("success","Account information changed successfully");
    }
    public function setPrevent()
    {
        session()->put("prevent", "enabled");
        return redirect('action/BA/social');
    }
}
