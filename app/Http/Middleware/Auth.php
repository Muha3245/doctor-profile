<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
    // public function handle(Request $request, Closure $next)
    // {
    //     if (!Auth::guard('auths')->check()) {
    //         return Redirect('/admin');
    //     }
    //     return $next($request);
    // }
}
