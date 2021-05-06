<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionFicha;
use App\Models\Admin\Clinica;
use App\Models\Admin\Ficha;
use App\Models\Admin\Paciente;
use App\Models\Admin\Servicio;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class FichaController extends Controller
{
    public function index(Request $request)
    {
        $servicios= Servicio::orderBy('id')->get();
        if($request->ver_fecha==null){
            $fecha_actual = new \DateTime();
            $fecha_actual=$fecha_actual->format('Y-m-d');
            $datos= Ficha::where('fecha',$fecha_actual)-> orderBy('id', 'desc')->get(); //where('fecha',$fecha) quiere decir que si la columna fecha sea igual $fecha
            return view('admin.ficha.index',compact('datos', 'servicios', 'fecha_actual'));
        }
        else{
            $fecha_actual=$request->ver_fecha;
            $datos= Ficha::where('fecha',$fecha_actual)-> orderBy('id', 'desc')->get(); //where('fecha',$fecha) quiere decir que si la columna fecha sea igual $fecha
            return view('admin.ficha.index',compact('datos', 'servicios', 'fecha_actual'));
        }
    }

    public function create($id, Request $request) // EL REQUEST SON LOS DATOS QUE VIENEN DE UN FORMULARIO
    {
        $servicio = Servicio::findOrFail($id);
        if($request->search!=null){
            //dd ('sihay busqueda');
            $seleccion=$request->seleccion;
            $query= trim($request->search); // SEARCH ES LA BUSQUEDA QUE SE INGRESO EN EL BUSCADOR
            $search=$query;
            $datos=Paciente::where($seleccion, 'LIKE', '%'. $query . '%')->get();
            return view('admin.ficha.crear', compact('servicio', 'datos', 'search'));

        }
        else{
            $datos=null;
            $search=null;
            if($request->ver_fecha==null){
                $fecha_actual = new \DateTime();
                $fecha_actual=$fecha_actual->format('Y-m-d');
                $fichas= Ficha:: where([
                    ['servicio_id', $id],
                    ['fecha', $fecha_actual],
                ])-> orderBy('id', 'desc')->get();
            return view('admin.ficha.crear', compact('servicio', 'search', 'datos', 'fichas', 'fecha_actual'));
            }
            else{
                $fecha_actual=$request->ver_fecha;
                $fichas= Ficha:: where([
                    ['servicio_id', $id],
                    ['fecha', $fecha_actual],
                ])-> orderBy('id', 'desc')->get();
                return view('admin.ficha.crear',compact('servicio', 'search', 'datos', 'fichas', 'fecha_actual'));
            }

        }

    }

    public function store(Request $request)
    {
        //dd($request->all());
        Ficha::create($request->all());
        return redirect ("admin/ficha/consulta")->with('mensaje', 'ficha creado satisfactoriamente');    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        Ficha::findOrFail($id)->update($request->all());
        return redirect("admin/ficha/consulta")->with('mensaje', 'Ficha actualizada con exito');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                //Eliminar registro
                Ficha::destroy($id);
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

    public function imprimir($id)
    {
        $ficha = Ficha::findOrFail($id);
        $clinica = Clinica ::findOrFail(1);
        if($clinica->logo==null)
            $image = base64_encode(file_get_contents(public_path("assets/ace/assets/images/avatars/logo.jpg")));
        else
            $image = base64_encode(file_get_contents(public_path("storage/Datos/Clinica/$clinica->logo")));
        $pdf= PDF::loadview('admin.ficha.imprimir_ficha', compact('ficha', 'clinica', 'image'));
        return $pdf->stream('ficha.pdf');

    }
}
