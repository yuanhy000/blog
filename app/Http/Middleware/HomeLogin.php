<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class HomeLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!session('user')){
            return redirect('/login')->with('msg','请先登录');
        }
        return $next($request);
    }
}
