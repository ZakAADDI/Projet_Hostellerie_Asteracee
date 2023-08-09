<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->role_id ==1) {
            return $next($request);
        }
        return response()->json('Not allowed',401);
    }
}
