<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // if (Auth::user()->role_id == '1') {
        //     return $next($request);
        // } else if (Auth::user()->role_id == '2') {
        //     return $next($request);
        // } else if (Auth::user()->role_id == '3') {
        //     return $next($request);
        // }
        if (Auth::check() && Auth::user()->role_id == $role) {
            return $next($request);
        }
        
        return redirect()->back();
    }
}
