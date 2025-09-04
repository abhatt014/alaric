<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthentication
{
    public function handle(Request $request, Closure $next)
    {
        // Only allow authenticated "admin" guard with role=admin and active
        $user = Auth::guard('admin')->user();

        if (!$user || $user->role !== 'admin' || (property_exists($user, 'is_active') && !$user->is_active)) {
            // If another guard is logged in, log it out to avoid confusion
            if (Auth::guard('web')->check() && Auth::id() !== optional($user)->id) {
                Auth::guard('web')->logout();
            }
            return redirect()->route('admin.login')->with('error', 'Please login as admin.');
        }

        return $next($request);
    }
}
