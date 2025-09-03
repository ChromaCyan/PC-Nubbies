<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
<<<<<<< HEAD
        if (auth()->check()&& auth ()->user()->isAdmin == 1) {
=======
        if (auth()->check()&& auth ()->user()->usertype == 1) {
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
            return $next($request);
        }
        return redirect()->route('home')->with('error', 'Access denied. You are not an admin.');
    }
}
