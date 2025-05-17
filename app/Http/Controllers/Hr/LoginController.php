<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // Show HR login form
    public function index()
    {
        return view('hr.login');
    }

    // Authenticate HR user
    public function authenticate(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('hr.login')->withErrors($validator)->withInput();
        }

        // Attempt authentication
        if (Auth::guard('hr')->attempt($request->only('email', 'password'))) {
            $user = Auth::guard('hr')->user();

            // Check if the authenticated user has the correct role
            if ($user->role !== 'hr') {
                Auth::guard('hr')->logout();
                return redirect()->route('hr.login')->with('error', 'User is Unauthorized');
            }

            // Redirect to HR dashboard on successful login
            return redirect()->route('hr.dashboard');
        }

        // Authentication failed
        return redirect()->route('hr.login')->with('error', 'Invalid email or password');
    }

    // Logout HR user
    public function logout(Request $request)
    {
        Auth::guard('hr')->logout();

        // Optionally invalidate session and regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('hr.login')->with('logout', 'Logout successful');
    }
}
