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
        return redirect()->route('companies.index');
    }

    public function login(Request $request)
    {
        Log::info('Login Attempt:', ['email' => $request->email]);

        if (Auth::attempt($request->only('email', 'password'))) {
            Log::info('Login Success:', ['email' => $request->email]);
            return redirect()->route('dashboard');
        } else {
            Log::error('Login Failed:', ['email' => $request->email]);
            return back()->withErrors(['error' => 'Invalid login credentials.']);
        }
    }
}
