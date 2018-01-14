<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$id)
    {
        if(!Auth::check()){
            return redirect('/');
        }
        if(Auth::user()->role_id != $id){
            return redirect('/');
        }
        return $next($request);
    }
}
