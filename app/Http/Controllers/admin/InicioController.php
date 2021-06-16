<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Consulta;
use App\Models\Admin\Ficha;
use App\Models\Admin\Paciente;
use App\Models\Admin\Personal;
use Illuminate\Http\Request;

class InicioController extends Controller
{

    public function index()
    {
        $fecha=new \DateTime();
        $fecha = $fecha->format('Y-m-d');
        $personal=Personal::where('estado',1)->count();
        $paciente=Paciente::where('estado',1)->count();
        $consulta=Consulta::count();
        $ficha=Ficha::where('fecha',$fecha)->count();
        return view('inicio',compact('personal', 'paciente', 'consulta', 'ficha'));
    }

}
