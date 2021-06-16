<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionFicha;
use App\Models\Admin\Caleendario_Consulta;
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
        $horarios= Caleendario_Consulta::where('fecha', $request->fecha)->get();
        $cadena= $horarios[0]["horario"];
        $vector=json_decode($cadena);// Convieerte una cadena en un vector
        $vector[($request->hora)-1]->estado="ocupado";
        $hora=$vector[($request->hora)-1]->hora;
        $nueva_cadena=json_encode($vector);// Convieerte un vector en cadena
        $horario=Caleendario_Consulta::findOrFail($horarios[0]['id']);
        $horario->update([
            'horario'=>$nueva_cadena
        ]);
        $request->request->add(['turno' => $request->hora]);
        $request->request->add(['hora' => $hora]);
        Ficha::create($request->all());
        return redirect ("admin/ficha/consulta")->with('mensaje', 'ficha creado satisfactoriamente');
    }

    public function edit($id)
    {
        $ficha=Ficha::findOrFail($id);
        $paciente=Paciente::findOrFail($ficha->paciente_id);
        return view("admin/ficha/editar",compact('ficha', 'paciente'));

    }

    public function update(Request $request, $id)
    {
        if ($request->hora) {
            $ficha=Ficha::findOrFail($id);//Agarra los datos de la ficha cuando se creo
            $horarios= Caleendario_Consulta::where('fecha', $ficha->fecha)->get();
            $cadena= $horarios[0]["horario"];
            $vector=json_decode($cadena);// Convieerte una cadena en un vector
            $vector[($ficha->turno)-1]->estado="libre";
            $nueva_cadena=json_encode($vector);// Convieerte un vector en cadena
            $horario=Caleendario_Consulta::findOrFail($horarios[0]['id']);
            $horario->update([
                'horario'=>$nueva_cadena
        ]);

            $horarios= Caleendario_Consulta::where('fecha', $request->fecha)->get();
            $cadena= $horarios[0]["horario"];
            $vector=json_decode($cadena);// Convieerte una cadena en un vector
            $vector[($request->hora)-1]->estado="ocupado";
            $hora=$vector[($request->hora)-1]->hora;
            $nueva_cadena=json_encode($vector);// Convieerte un vector en cadena
            $horario=Caleendario_Consulta::findOrFail($horarios[0]['id']);
            $horario->update([
                'horario'=>$nueva_cadena
        ]);

            $request->request->add(['turno' => $request->hora]);
            $request->request->add(['hora' => $hora]);
            Ficha::findOrFail($id)->update($request->all());
            return redirect("admin/ficha/consulta")->with('mensaje', 'Ficha actualizada con exito');
        } else {
            return redirect("admin/ficha/consulta")->with('mensaje', 'Ficha actualizada con exito');
        }
        // dd($request->all());
        // Ficha::findOrFail($id)->update($request->all());
        // return redirect("admin/ficha/consulta")->with('mensaje', 'Ficha actualizada con exito');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                $ficha=Ficha::findOrFail($id);//Agarra los datos de la ficha cuando se creo
                $horarios= Caleendario_Consulta::where('fecha', $ficha->fecha)->get();
                $cadena= $horarios[0]["horario"];
                $vector=json_decode($cadena);// Convieerte una cadena en un vector
                $vector[($ficha->turno)-1]->estado="libre";
                $nueva_cadena=json_encode($vector);// Convieerte un vector en cadena
                $horario=Caleendario_Consulta::findOrFail($horarios[0]['id']);
                $horario->update([
                    'horario'=>$nueva_cadena
                ]);
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

    public function registrar($id)
    {
        //dd($request->all());
        $paciente=Paciente::findOrFail($id);
        return view("admin/ficha/registrar",compact('paciente'));
    }

    public function horario(Request $request)
    {
        if ($request->ajax()) {
            $fecha=request()->fecha;
            $aux1=Caleendario_Consulta::where('fecha',$fecha)->get();
            if($aux1->count()==0){
                $cadena="<span class="."green".">No hay turnos disponibles, elija otra fecha</span>";
                return response()->json(['mensaje' =>'no','horario' =>$cadena]);
            }
            else{
                $horarios=$aux1[0]["horario"];
                $horarios=json_decode($horarios);
                $cadena="<select id='hora' name='hora' class="."form-control"." required>";
                $cadena=$cadena."<option value=''>  Elija un turno  </option>";
                foreach ($horarios as $horario) {
                    if($horario->estado=='libre'){
                        $cadena=$cadena.'<option value='.$horario->orden.'>'. $horario->hora.'</option>';
                    }
                }
                $cadena."</select>";

                return response()->json(['mensaje' =>'si','horario' =>$cadena]);
            }
        } else {
            abort(404);
        }
    }
}
