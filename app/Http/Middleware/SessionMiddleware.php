<?php

namespace App\Http\Middleware;

use Closure;

class SessionMiddleware
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
        session_start();
            if (empty($_SESSION['user'])){
            return redirect('/');
//                如果session为空，就返回到登录界面
        }
        return $next($request);
    }
}
