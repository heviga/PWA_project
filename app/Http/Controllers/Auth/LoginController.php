<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // ✅ Fix: Add this function to show the login form
    public function showLoginForm()
    {
        return view('auth.login'); // Make sure the login view exists
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->is_admin) {
            return redirect()->route('admin.dashboard'); // Redirect admin
        }
        
        return redirect()->route('companies.index'); // Redirect normal user
    }
    
    public function login(Request $request)
    {
        Log::info('Login Attempt:', ['email' => $request->email]);
    
        if (Auth::attempt($request->only('email', 'password'))) {
            Log::info('Login Success:', ['email' => $request->email]);
    
            // Redirect Admins to Admin Dashboard
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.dashboard');
            }
    
            // Redirect Normal Users to User Dashboard
            return redirect()->route('dashboard');
        } 
    
        Log::error('Login Failed:', ['email' => $request->email]);
        return back()->withErrors(['error' => 'Invalid login credentials.']);
    }
    

    public function logout(Request $request)
{
    Auth::logout();
    
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login'); // Redirect user after logout
}

}
