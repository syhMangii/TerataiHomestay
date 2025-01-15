<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class customer
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
        // Check if the user is authenticated and has the 'Customer' role
        if (auth()->check() && auth()->user()->role === 'User') {
            return $next($request);
        }

        return redirect()->route('loginusr'); // Redirect unauthorized users to the login page
    }
}
