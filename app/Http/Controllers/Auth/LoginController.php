<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web,admin')->except('logout');
    }

    protected function guard($guardName = 'web') {
        return Auth::guard($guardName);
    }

    protected function attemptLogin(Request $request)
    {
        $asAdmin = $this->guard('admin')->attempt(
            $this->credentials($request), $request->filled('remember')
        );

        if ($asAdmin) return $asAdmin;

        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }
}
