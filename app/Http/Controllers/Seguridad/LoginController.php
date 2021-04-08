<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin';

    public $maxAttempts = 2;//numero de intentos para fallar
    public $decayMinutes = 1;//tiempo de espera 1min para volver a ingresar al login

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('login.index');

    }
    public function username()
    {
        return 'usuario';
    }
    protected function authenticated(Request $request, $user)
    {
        //$roles = $user->roles()->where('estado', 1)->get();
        $rol = $user->rol()->get();
        if ($user->estado==1) {
            $user->setSession($rol->toArray());//llama a la funcion setsession
        } else {
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('seguridad/login')->withErrors(['error' => 'Este usuario no esta activo']);
        }
    }
}
