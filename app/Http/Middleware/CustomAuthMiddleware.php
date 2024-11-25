<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  
     * @param
     * @return
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::id()) {
            $auth = Auth::user()->usertype;
            if ($auth === "user") {
                return redirect()->route('redirect');
            }
        } else {
            return redirect()->route('room');
        }


        return $next($request);
    }
}
