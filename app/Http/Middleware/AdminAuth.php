<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
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
        if($path=="AdminTech" && $request->session()->has('admin')){
            return redirect('/AdminHome');
        }else if(($path!="AdminTech") && !session()->get('admin')){
            return redirect('/AdminTech');
        }
        return $next($request);
    }
}
