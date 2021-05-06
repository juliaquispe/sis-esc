<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionCargo;
use App\Models\Admin\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        $datos= Cargo::orderBy('id')->get();
        return view('admin.cargo.index',compact('datos'));
    }

    public function create()
    {
        return view('admin.cargo.crear');
    }

    public function store(ValidacionCargo $request)
    {
        //dd($request->all());
        Cargo::create($request->all());
        return redirect ('admin/cargo')->with('mensaje', 'cargo creado satisfactoriamente');
    }

    public function edit($id)
    {
        //return view('admin.cargo.editar');
        $cargo = Cargo::findOrfail($id);
        return view('admin.cargo.editar', compact('cargo'));
    }

    public function update(ValidacionCargo $request, $id)
    {
        Cargo::findOrFail($id)->update($request->all());
        return redirect('admin/cargo')->with('mensaje', 'Datos actualizados con exito');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                //Eliminar registro
                Cargo::destroy($id);
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
