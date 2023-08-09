<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class isAdmin
{
    /**
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->role==1) {
            // If user is logged && if user's role logged ==1
            return $next($request);
            // continue
        }
            return response()->json('Not allowed',401);
            // else
    }


}
