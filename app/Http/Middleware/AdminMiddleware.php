<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // ** First of all, Auth::check() it is checking that if the user is authorized person or not and then at the same time "Auth::user()->role" it is checking that what is the role of the user ** ///
        // we can't go to customer views if the user is in the admin role.
        // similiarly, we can't go to admin views if the user is in the customer role.

        if(Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }

    }
}
