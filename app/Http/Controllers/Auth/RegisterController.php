<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

        $this->middleware('guest');

        return $this->redirectTo;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required', 'string', 'max:8'],
            'lopd' => ['required', 'string', 'max:8'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role_id'],
            'lopd' => $data['lopd'],
        ]);
    }
}
