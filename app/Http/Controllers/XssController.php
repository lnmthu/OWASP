<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XssController extends Controller
{
    public function reflectedXss(Request $request){
        $search=null;
        if($request->search)
            $search=$request->search;
        return view("xss.reflectedXss",["search",$search]);
    }
}
