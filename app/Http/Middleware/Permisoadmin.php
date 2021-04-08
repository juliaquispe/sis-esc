<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Permisoadmin
{
    public function handle($request, Closure $next)
    {
        if(Auth::guest()){
            return redirect('/');
        }
        if (Auth::user()->rol->id==1)//agarra el rol de ese usuario
        {
            return $next($request);
        }
        else{
            return back()->with('mensajeerror','No tienes privilegios de Administrador');
        }
    }
}
