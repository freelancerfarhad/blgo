<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $users=Auth::user();

        // if($users->user_type != "admin") return back();
        // if($users->user_type != "admin" && $users->user_type != "user") return back();
        if($users->user_type == "admin" || $users->user_type == "user") 
        {
            return $next($request);
        }
        else{
            return back();
        }
        // return $next($request);
    }
}
