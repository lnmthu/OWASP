<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckWithoutAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session('id'))
            return response()->view("errors.401");
        return $next($request);
    }
}
