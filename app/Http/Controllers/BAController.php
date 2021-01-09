<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register;
use App\Repository\User\UserInterface;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Rules\Captcha; 

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
        return view("action.BA.loginSocial");
    }
    public function postLoginSocial(Request $request)
    {
        $data = $request->all();
        return $data;
        if ($data) {
            $user = $this->userRepository->login($data);
            if ($user) {
                return true;
            }
        }
        return false;
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
    public function getInfo(){
        return view("action.BA.info");
    }
    public function postInfo(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();
        return true;
        // return redirect("action/BA/info")->with("success","Account information changed successfully");
    }
}
