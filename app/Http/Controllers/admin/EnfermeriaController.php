<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Enfermeria;
use Illuminate\Http\Request;

class EnfermeriaController extends Controller
{
    public function index(Request $request)
    {
        if($request->ver_fecha==null){
            $fecha_actual= new \DateTime();
            $fecha_actual=$fecha_actual->format('Y-m-d');

        }else{
            $fecha_actual=$request->ver_fecha;
        }
        $datos= Enfermeria::where('fecha',$fecha_actual)->orderBy('id')->get();
        return view('admin.enfermeria.index', compact('datos', 'fecha_actual'));
    }

    public function create()
    {
        return view('admin.enfermeria.crear');
    }

    public function store(Request $request)
    {
        //dd(request()->all());
        if ($request->detalles_c!=null)
            $request->request->add(['atencion_c' => 1]);
        else
            $request->request->add(['atencion_c' => 0]);
        if ($request->tipo_i!=null)
            $request->request->add(['atencion_i' => 1]);
        else
            $request->request->add(['atencion_i' => 0]);
        if ($request->tipo_s!=null)
            $request->request->add(['atencion_s' => 1]);
        else
            $request->request->add(['atencion_s' => 0]);
        Enfermeria::create($request->all());
        return redirect('admin/enfermeria')->with('mensaje', 'Registro creado con Exito');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Enfermeria::findOrfail($id);
        return view('admin.enfermeria.editar', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if ($request->detalles_c!=null)
            $request->request->add(['atencion_c' => 1]);
        else
            $request->request->add(['atencion_c' => 0]);
        if ($request->tipo_i!=null)
            $request->request->add(['atencion_i' => 1]);
        else
            $request->request->add(['atencion_i' => 0]);
        if ($request->tipo_s!=null)
            $request->request->add(['atencion_s' => 1]);
        else
            $request->request->add(['atencion_s' => 0]);
        Enfermeria::findOrFail($id)->update($request->all());
        return redirect('admin/enfermeria')->with('mensaje', 'Registro actualizado');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                //Eliminar registro
                Enfermeria::destroy($id);
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
