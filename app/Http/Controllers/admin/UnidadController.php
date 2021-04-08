<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionUnidad;
use App\Models\Admin\Unidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    public function index()
    {
        //dd('hola');
        $datos= Unidad::orderBy('id')->get();
        return view('admin.unidad.index',compact('datos'));
    }

    public function create()
    {
        return view('admin.unidad.crear');

    }

    public function store(ValidacionUnidad $request)
    {
        //dd($request->all());
        Unidad ::create($request->all());
        return redirect ('admin/unidad')->with('mensaje', 'unidad creado satisfactoriamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //return view('admin.unidad.editar');
        $unidad = Unidad::findOrfail($id);
        return view('admin.unidad.editar', compact('unidad'));
    }

    public function update(ValidacionUnidad $request, $id)
    {
        Unidad::findOrFail($id)->update($request->all());
        return redirect('admin/unidad')->with('mensaje', 'Datos actualizados con exito');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                //Eliminar registro
                Unidad::destroy($id);
                $aux=1; //CUANDO ELIMINA
            } catch (\Illuminate\Database\QueryException $e) {
                $aux=0; //CUANDO TIENE DEPENDENCIAS
            }
            if($aux==1){
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
             abort(404);
        }
    }
}
