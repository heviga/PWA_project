<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/companies';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    protected function authenticated(Request $request, $user)
{
    return redirect()->route('companies.index');
}


    public function login(Request $request)
    {
        Log::info($request->all()); // Log the request data (except the password for security)
    
        // Attempt login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('companies');
        }
    
        return back()->withErrors(['email' => 'Invalid credentials.']);
    } 
}
