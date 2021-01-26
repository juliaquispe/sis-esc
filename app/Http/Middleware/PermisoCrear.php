<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermisoCrear
{
    public function handle($request, Closure $next)
    {
        if(Auth::guest()){
            return redirect('/');
        }
        if(Auth::user()->rol->añadir ==1){ // si tiene permiso deja pasar
            return $next($request);
        }
        else{
            return back()->with('mensajeerror', 'Usted no tiene permiso para Crear');//para devolver al mismo si no tienes permisos
        }
    }
}
