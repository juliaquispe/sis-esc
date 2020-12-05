<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionRol;
use App\Models\Admin\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $datos= Rol::orderBy('id')->get();
        return view('admin.roles.index',compact('datos'));
    }

    public function create()
    {
        return view('admin.roles.crear');
    }

    public function store(ValidacionRol $request)
    {

        if($request->añadir == "on" )
            $request->request->add(['añadir' => 1]);
        else
            $request->request->add(['añadir' => 0]);
        if($request->editar == "on")
            $request->request->add(['editar' => 1]);
        else
            $request->request->add(['editar' => 0]);
        if($request->eliminar == "on")
            $request->request->add(['eliminar' => 1]);
        else
            $request->request->add(['eliminar' => 0]);
        //dd($request->all());
        Rol ::create($request->all());
        return redirect ('admin/rol')->with('mensaje', 'rol creado satisfactoriamente');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //return view('admin.roles.editar');
        $rol = Rol::findOrfail($id);
        return view('admin.roles.editar', compact('rol'));
    }

    public function update(ValidacionRol $request, $id)
    {
         if($request->añadir == "on" )
            $request->request->add(['añadir' => 1]);
        else
            $request->request->add(['añadir' => 0]);
        if($request->editar == "on")
            $request->request->add(['editar' => 1]);
        else
            $request->request->add(['editar' => 0]);
        if($request->eliminar == "on")
            $request->request->add(['eliminar' => 1]);
        else
            $request->request->add(['eliminar' => 0]);

        Rol::findOrFail($id)->update($request->all());
        return redirect('admin/rol')->with('mensaje', 'rol editado satisfactoriamente');
        ;
            //ESTO SIRVE PARA MOSTRAR LO QUE SE ESTA MANDANDO dd($request->all());
    }

    public function destroy(Request $request,$id)
    {
        if ($request->ajax()) {
            try {
                //Eliminar registro
                Rol::destroy($id);
                $aux=1;
            } catch (\Illuminate\Database\QueryException $e) {
                $aux=0;
            }
            if ($aux==1) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
