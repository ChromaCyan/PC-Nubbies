<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class redirectAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , $guard = null): Response
    {
<<<<<<< HEAD
        if (Auth::guard($guard)->check() && Auth::user()->isAdmin == 1) {
=======
        if (Auth::guard($guard)->check() && Auth::user()->usertype == 1) {
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
