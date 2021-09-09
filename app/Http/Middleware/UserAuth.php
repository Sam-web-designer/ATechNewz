<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class UserAuth
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
        $path = $request->path();
        if($path=="login" && $request->session()->has('user')){
            return redirect('/');
        }else if(($path!="login") && !session()->get('user')){
            return redirect('/login');
        }
        return $next($request);
    }
}
