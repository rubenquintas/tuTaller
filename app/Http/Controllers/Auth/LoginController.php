<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';

    protected function redirectTo() {

        if (Auth::check() && Auth::user()->role->id == 1) {
            $this->redirectTo = route('cliente.dashboard');
        }
        elseif (Auth::check() && Auth::user()->role->id == 2) {
            $this->redirectTo = route('taller.dashboard');
        }
        elseif (Auth::check() && Auth::user()->role->id == 3) {
            $this->redirectTo = route('concesionario.dashboard');
        }
        elseif (Auth::check() && Auth::user()->role->id == 4) {
            $this->redirectTo = route('compraventa.dashboard');
        }
        elseif (Auth::check() && Auth::user()->role->id == 5) {
            $this->redirectTo = route('recambios.dashboard');
        }
        
        $this->middleware('guest')->except('logout');

        return $this->redirectTo;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
