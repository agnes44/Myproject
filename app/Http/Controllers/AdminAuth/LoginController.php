<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/admin_home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        foreach ($this->guard()->user()->role as role) {
            if ($role->name == 'admin') {
                return redirect('admin/home');
            } elseif ($role->name == 'siswa') {
                return redirect('admin/siswa')
            }
        }
    }

    /**
    * Show the aplplication's login form.
    * 
    * @return\Illuminate\Http\Response
    */
    public function showLoginForm()
    {
        return view('admin-auth/login');
    }

    /** 
    * Get the guard to be used during authentication.
    * 
    * @return \Illuminate\Contracts\Auth\StatefulGuard
    */
    protected function guard()
    {
        return Auth::guard('admin_user');
    }

    /** 
    * Log the user out of the application.
    * 
    * @param request $request
    * @return \Illuiminate\Http\Response
    */

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/admin_login');
    }
}
