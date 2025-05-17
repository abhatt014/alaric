<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // Show user login form
    public function index()
    {
        return view('user.login');
    }

    // Authenticate user
    public function authenticate(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate
        if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
            $user = Auth::guard('web')->user();

            // Check if the authenticated user is of role 'user'
            if ($user->role !== 'user') {
                Auth::guard('web')->logout();
                return redirect()->route('user.login')->with('error', 'User is Unauthorized');
            }

            // Regenerate session and redirect to dashboard
            $request->session()->regenerate();
            return redirect()->route('user.dashboard')->with('success', 'Login successful');
        }

        // Authentication failed
        return redirect()->route('user.login')->with('error', 'Invalid email or password');
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        // Invalidate and regenerate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.login')->with('logout', 'Logout successful');
    }
}
