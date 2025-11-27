<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in and is admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        abort(403); // Forbidden if not admin
    }
}
