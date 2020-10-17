<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Register;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view("login");
    }
    public function postLogin(Request $request)
    {
        $data = $request->all();
        if ($data && Auth::attempt(["email" => $data["email"], "password" => $data["password"]])) {
            return redirect("reflected-xss");
        }
        return redirect("login")->with("fail", "Login Failed");
    }
    public function getRegister()
    {
        return view("register");
    }
    public function postRegister(Register $request)
    {
        $data = $request->all();
        if ($data) {
            User::create([
                "name" => $data["name"],
                "email" => $data["email"],
                "password" => bcrypt($data["password"]),
            ]);
            return redirect("login")->with("success", "Sign Up Successfully. Proceed To Login");
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('login');
    }
}
