<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //this will show admin login page
    public function index()
    {
        return view('admin.login');
    }
    //this will authenticate admin user
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->passes()) {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::guard('admin')->user()->role != 'admin') {
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error', 'User is Unauthorized');
                } else{
                    $request->session()->regenerate();
                    return redirect()->route('admin.dashboard')->with('success', 'Login successful');
                }
                
            } else {
                return redirect()->route('admin.login')->with('error', 'Invalid email or password');
            }
        } else {
            return redirect()->route('admin.login')->withErrors($validator)->withInput();
        }
    }
    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('logout', 'Logout successful');
    }
}
