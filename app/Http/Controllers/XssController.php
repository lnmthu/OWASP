<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XssController extends Controller
{
    public function reflectedXss(Request $request){
        $search=null;
        if($request->search)
        $search=$request->search;
        return view("attack.xss.reflectedXss")->with(compact("search"));
    }
    public function preventXss(Request $request){
        $search=null;
        if($request->search)
        $search=$request->search;
        return view("prevent.xss.prenventXss")->with(compact("search"));
    }
}
