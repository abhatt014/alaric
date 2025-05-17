<?php

namespace App\Http\Controllers\Auditor;

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
            if (Auth::guard('auditor')->attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::guard('auditor')->user()->role != 'auditor') {
                    Auth::guard('auditor')->logout();
                    return redirect()->route('auditor.login')->with('error', 'User is Unauthorized');
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
        Auth::guard('auditor')->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect()->route('auditor.login')->with('logout', 'Logout successful');
    }
}
