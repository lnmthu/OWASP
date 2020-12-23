<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrokenAuthController extends Controller
{
    public function terminal(){
        return view('action.broken_auth.terminal');
    }
}
