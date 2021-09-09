<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
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
