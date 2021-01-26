<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermisoEliminar
{
    public function handle($request, Closure $next)
    {
        if(Auth::guest()){
            return redirect('/');
        }
        if(Auth::user()->rol->eliminar ==1){
            return $next($request);
        }
        else{
            return back()->with('mensajeerror', 'Usted no tiene permiso para Eliminar');
        }
    }
}
