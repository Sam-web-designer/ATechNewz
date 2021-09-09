<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Authenticate extends UserAuth
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function handel(Request $request , Closure $next)
    {
        $path = $request->path();
        if($path=="login" && $request->session()->has('user')){
            return redirect('/');
        }else if(($path!="login") && !session()->get('user')){
            return redirect('/login');
        }
        return $next($request);
    }
}
