<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int  $roleId
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roleId)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the user's role_id
            $userRole = Auth::user()->role_id;

            // Check if the role_id matches the required role
            if ($userRole == $roleId) {
                return $next($request);
            } else {
                // If the user is not authorized, redirect or return 403
                return redirect('/login'); // or use abort(403);
            }
        }

        // If not authenticated, redirect to login
        return redirect('/login');
    }
}
