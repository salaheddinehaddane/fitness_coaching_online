<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        // dd(auth()->attempt($credentials));
        if (!auth()->attempt($credentials)) {
            return redirect()->route('/')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
        if (auth()->user()->is_admin == 1) {
            return redirect()->route('/admin/admin-accueille');
        } else if (auth()->user()->is_client == 1) {
            return redirect()->route('/client/client-accueille');
        } else if (auth()->user()->is_coach == 1) {
            return redirect()->route('/coach/coach-accueille');
        }

        return redirect()->route('/');
    }
}
