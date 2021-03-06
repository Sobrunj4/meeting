<?php

namespace App\Http\Controllers\superadmin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;


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

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:superadmin')->except('logout');
    }

    public  function showLoginForm()
    {
        return view('auth_superadmin.login');
    }
    public  function login(Request $request)
    {
        $this->validate($request, [
            'email'         => 'required |string',
            "password"      => 'required |string|min:6'

        ]);


        $credential = [
            'email' => $request->email,
            'password' => $request->password,

        ];
        if (Auth::guard('superadmin')->attempt($credential,$request->remember)) {
            return redirect()->intended(route('dashboards.index'));
        }

        return redirect()->back()->with('error', 'username dan password salah');

    }

    public function logout()
    {
        Auth::guard('superadmin')->logout();
        return redirect()->route('superadmin.login');
    }


}
