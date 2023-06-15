<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAllowed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     */
    public function handle(Request $request, Closure $next)
    {
//        dd('caca');
        if (Auth::user() && Auth::user()->isAdmin()) {
            // If user is logged && if user's role logged ==1
            return $next($request);
            // continue
        }
        return response()->json('Not allowed',401);
    }
}
