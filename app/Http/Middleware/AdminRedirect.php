<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminRedirect
{
    public function handle(Request $request, Closure $next)
    {
        // If already authenticated on the admin guard and role matches, send to dashboard
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}