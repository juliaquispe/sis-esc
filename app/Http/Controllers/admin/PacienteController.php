<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionPaciente;
use App\Models\Admin\Clinica;
use App\Models\Admin\Consulta;
use App\Models\Admin\Ficha;
use App\Models\Admin\Gabinete;
use App\Models\Admin\Historial;
use App\Models\Admin\Internacion;
use App\Models\Admin\Paciente;
use App\Models\Admin\Receta;
use App\Models\Admin\Signos_Vitales;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index(Request $request)
    {
        if($request->search!=null){
            //dd($request->all()); AQUI ESTA LLEGANDO DOS ATRIBUTOS: search y seleccion CUANDO HAY BUQUEDA
            $seleccion=$request->seleccion;
            $query= trim($request->search);
            $datos=Paciente::where([
               [ $seleccion, 'LIKE', '%'. $query . '%'],
               ['estado',1]
            ])->paginate(100);
            $contador=$datos->count();
            $aux=0;
            if($contador==0)
            return view('admin.paciente.index',['datos'=>$datos,'search'=>$query, 'aux'=>$aux, 'seleccion'=>$seleccion]);
            else
                return view('admin.paciente.index',['datos'=>$datos,'search'=>$query, 'aux'=>$aux, 'seleccion'=>$seleccion]);
        }
        else {
            $datos = Paciente::where('estado',1)-> orderBy('id', 'desc')->paginate(10);
            $aux=0;
            $search=null;
            $seleccion=null;
            return view('admin.paciente.index', compact('datos', 'aux', 'search', 'seleccion'));
        }
    }

    public function create()
    {
        return view('admin.paciente.crear');
    }

    public function store(Request $request)
    {
    if($foto=Paciente::setFoto($request->foto_up))
        $request->request->add(['foto'=>$foto]);
    //dd($request->all());
    Paciente::create($request->all());
    return redirect('admin/paciente')->with('mensaje','Paciente creado con exito');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $paciente = Paciente::findOrfail($id);
        return view('admin.paciente.editar', compact('paciente'));
    }

    public function update(ValidacionPaciente $request, $id)
    {
        $paciente = Paciente::findOrFail($id);
        if ($foto = Paciente::setFoto($request->foto_up, $paciente->foto))
            $request->request->add(['foto' => $foto]);
        $paciente->update($request->all());
        return redirect('admin/paciente')->with('mensaje', 'Datos actualizados con exito');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                //Eliminar registro
                Paciente::destroy($id);
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

    public function ver($id)
    {
        $paciente = Paciente::findOrfail($id);
        $signos_vitales= Signos_Vitales :: where([
            ['paciente_id', $paciente->id],
            ['estado',1]
        ])->get();
        $SVM=$signos_vitales->max();
        $aux_fecha=" ";
        if ($SVM!=null) {
            $aux_consulta=Consulta::findOrFail($SVM->consulta_id);
            $aux_ficha=Ficha::findOrFail($aux_consulta->ficha_id);
            $aux_fecha=$aux_ficha->fecha;
        }
        $fichas= Ficha::where([
            ['paciente_id', $paciente->id],
            ['estado', 1]
        ])->get();
        $datos=array();
        $consultas=array();
        $i=0;
        foreach($fichas as $ficha){
            $consultas[$i]= Consulta::where('ficha_id', $ficha->id)->get();
            $datos[$i]["fecha"]=$ficha->fecha;
            $datos[$i]["ficha_id"]=$ficha->id;
            $i++;
        }
        $j=0;
        foreach($consultas as $consulta){
            $datos[$j]["motivo"]=$consulta[0]["motivo"];
            $datos[$j]["diagnostico"]=$consulta[0]["diagnostico"];
            $datos[$j]["consulta_id"]=$consulta[0]["id"];
            $aux1=Receta::where('consulta_id', $consulta[0]["id"])->get();
            if($aux1->count()>0){
                $datos[$j]["receta_id"]=$aux1[0]["id"];
            }
            else{
                $datos[$j]["receta_id"]='no';
            }

            $aux2=Gabinete::where('consulta_id', $consulta[0]["id"])->get();
            if($aux2->count()>0){
                $datos[$j]["gabinete"]=$aux2[0]["estudio_g"];
                $datos[$j]["gabinete_id"]=$aux2[0]["id"];
            }
            else{
                $datos[$j]["gabinete_id"]='no';
            }
            $aux3=Internacion::where('consulta_id', $consulta[0]["id"])->get();
            if($aux3->count()>0){
                $datos[$j]["internacion_id"]=$aux3[0]["id"];
            }
            else{
                $datos[$j]["internacion_id"]='no';
            }
            $j++;
        }
        return view('admin.paciente.ver', compact('paciente', 'SVM','datos', 'aux_fecha'));
    }

    public function ordenar(Request $request)
    {
        //dd($request->all());
        if($request->search==null){
            if ($request->id==1)
                    $datos = Paciente::where('estado',1)->orderBy('apellido_p')->paginate(10);
            else
                if ($request->id==2)
                        $datos = Paciente::where('estado',1)->orderBy('ci')->paginate(10);
                else
                    if ($request->id==3)
                            $datos = Paciente::where('estado',1)->orderBy('id')->paginate(10);
                    else
                        if ($request->id==4)
                                $datos = Paciente::where('estado',1)->orderBy('fecha_nac', 'desc')->paginate(10);
                        else
                            if ($request->id==5)
                                    $datos = Paciente::where('estado',1)->orderBy('celular')->paginate(10);
            $aux= $request->id;
            $search=null;
            $seleccion=null;
            return view('admin.paciente.index', compact('datos', 'aux', 'search', 'seleccion'));
        }
        else{
            //dd($request->all()); ESTO MUESTRA LOS DATOS QUE SE ESTAN ENVIANDO EN LOS 3 INPUT DE FORM DE LA COLUMNA SELECCIONADA. CUANDO ORDENA
            $seleccion=$request->selec;
            //dd($seleccion); ESTO MUESTRA EL VALOR DE LA SELECCION
            $query= trim($request->search);
            if ($request->id==1)
                $datos = Paciente::where([
                    [$seleccion, 'LIKE', '%'. $query . '%'],
                    ['estado', 1]
                ])->orderBy('apellido_p')->paginate(100);
            else
                if ($request->id==2)
                        $datos = Paciente::where([
                            [$seleccion, 'LIKE', '%'. $query . '%'],
                            ['estado', 1]
                        ])->orderBy('ci')->paginate(100);
                else
                    if ($request->id==3)
                            $datos = Paciente::where([
                               [ $seleccion, 'LIKE', '%'. $query . '%'],
                               ['estado', 1]
                            ])->orderBy('id')->paginate(100);
                    else
                        if ($request->id==4)
                                $datos = Paciente::where([
                                    [$seleccion, 'LIKE', '%'. $query . '%'],
                                    ['estado', 1]
                                ])->orderBy('fecha_nac', 'desc')->paginate(100);
                        else
                            if ($request->id==5)
                                    $datos = Paciente::where([
                                        [$seleccion, 'LIKE', '%'. $query . '%'],
                                        ['estado', 1]
                                        ])->orderBy('celular')->paginate(100);
            $aux= $request->id;
            $search=$request->search;
            $seleccion=$request->selec;
            return view('admin.paciente.index', compact('datos', 'aux', 'search', 'seleccion'));
        }
    }

    public function consulta_paciente($id)// la id de la consulta
    {
        $consulta=Consulta::findOrFail($id);
        $ficha=Ficha::findOrFail($consulta->ficha_id);
        $clinica = Clinica ::findOrFail(1);
        $signos_vitales=Signos_vitales::findOrFail($consulta->id);
        $aux1=Receta::where('consulta_id', $consulta->id)->get();
        if($aux1->count()==0){
            $receta=null;
        }else{
            $receta=Receta::findOrFail($aux1[0]["id"]);
        }
        $aux2=Gabinete::where('consulta_id', $consulta->id)->get();
        if($aux2->count()==0){
            $gabinete=null;
        }else{
            $gabinete=Gabinete::findOrFail($aux2[0]["id"]);
        }
        $aux3=Internacion::where('consulta_id', $consulta->id)->get();
        if($aux3->count()==0){
            $internacion=null;
            $fotos=null;
        }else{
            $internacion=Internacion::findOrFail($aux3[0]["id"]);
            if ($internacion->foto_evolucion==null) {
                $fotos=null;
            } else {
                $fotos=$internacion->foto_evolucion;
                $fotos=json_decode($fotos);
            }
        }
        if($clinica->logo==null)
            $image = base64_encode(file_get_contents(public_path("assets/ace/assets/images/avatars/logo.jpg")));
        else
            $image = base64_encode(file_get_contents(public_path("storage/Datos/Clinica/$clinica->logo")));
        $pdf= PDF::loadview('admin.paciente.imprimir_consulta', compact('clinica', 'image', 'ficha', 'signos_vitales', 'consulta', 'receta', 'gabinete', 'internacion', 'fotos'));
        return $pdf->stream('ficha.pdf');
    }

    public function ver_expediente($id)
    {
        $clinica = Clinica ::findOrFail(1);
        $paciente = Paciente::findOrfail($id);
        $auxiliar=Historial::where('paciente_id',$paciente->id)->get();
        if($auxiliar->count()==0){
            $historial=null;
        }else{
            $historial=Historial::findOrFail($auxiliar[0]["id"]);
        }
        $fichas= Ficha::where([
            ['paciente_id', $paciente->id],
            ['estado', 1]
        ])->get();
        $datos=array();
        $consultas=array();
        $i=0;
        foreach($fichas as $ficha){
            $consultas[$i]= Consulta::where('ficha_id', $ficha->id)->get();
            $datos[$i]["ficha_id"]=$ficha->id;
            $datos[$i]["fecha"]=$ficha->fecha;
            $datos[$i]["hora"]=$ficha->hora;
            //$datos[$i]["servicio_id"]=$ficha->servicio_id;
            $i++;
        }
        $j=0;
        foreach($consultas as $consulta){
            $datos[$j]["consulta_id"]=$consulta[0]["id"];
            $datos[$j]["motivo"]=$consulta[0]["motivo"];
            $datos[$j]["sintoma"]=$consulta[0]["sintoma"];
            $datos[$j]["diagnostico"]=$consulta[0]["diagnostico"];
            $datos[$j]["doctor"]=$consulta[0]["doctor"];
            $signos=Signos_Vitales::findOrFail($consulta[0]["id"]);
            $datos[$j]["altura"]=$signos->altura;
            $datos[$j]["peso"]=$signos->peso;
            $datos[$j]["temperatura"]=$signos->temperatura;
            $datos[$j]["p_a"]=$signos->p_a;
            $datos[$j]["f_c"]=$signos->f_c;
            $datos[$j]["f_r"]=$signos->f_r;
            $aux1=Receta::where('consulta_id', $consulta[0]["id"])->get();
            if($aux1->count()>0){
                $datos[$j]["receta_id"]=$aux1[0]["id"];
                $datos[$j]["receta"]=$aux1[0]["receta"];
                $datos[$j]["indicacion"]=$aux1[0]["indicacion"];
            }
            else{
                $datos[$j]["receta_id"]='no';
            }
            $aux2=Gabinete::where('consulta_id', $consulta[0]["id"])->get();
            if($aux2->count()>0){
                $datos[$j]["gabinete_id"]=$aux2[0]["gabinete_id"];
                $datos[$j]["estudio_g"]=$aux2[0]["estudio_g"];
                $datos[$j]["indicacion_g"]=$aux2[0]["indicacion_g"];
            }
            else{
                $datos[$j]["gabinete_id"]='no';
            }
            $aux3=Internacion::where('consulta_id', $consulta[0]["id"])->get();
            if($aux3->count()>0){
                $datos[$j]["internacion_id"]=$aux3[0]["id"];
                $datos[$j]["cama"]=$aux3[0]["cana"];
                $datos[$j]["fecha_ingreso"]=$aux3[0]["fecha_ingreso"];
                $datos[$j]["contacto_emergencia"]=$aux3[0]["contacto_emergencia"];
                $datos[$j]["motivo_i"]=$aux3[0]["motivo_i"];
                $datos[$j]["e_fisico"]=$aux3[0]["e_fisico"];
                $datos[$j]["craneo_cara"]=$aux3[0]["craneo_cara"];
                $datos[$j]["cuello_tiroides"]=$aux3[0]["cuello_tiroides"];
                $datos[$j]["torax"]=$aux3[0]["torax"];
                $datos[$j]["genitales"]=$aux3[0]["genitales"];
                $datos[$j]["columna"]=$aux3[0]["columna"];
                $datos[$j]["e_neurologico"]=$aux3[0]["e_neurologico"];
                $datos[$j]["impresion_d"]=$aux3[0]["impresion_d"];
                $datos[$j]["conducta"]=$aux3[0]["conducta"];
                $datos[$j]["fecha_salida"]=$aux3[0]["fecha_salida"];
                $datos[$j]["diagnostico_salida"]=$aux3[0]["diagnostico_salida"];
                $datos[$j]["tratamiento_realizado"]=$aux3[0]["tratamiento_realizado"];
                $datos[$j]["nombre_resp"]=$aux3[0]["nombre_resp"];
                $datos[$j]["ci_resp"]=$aux3[0]["ci_resp"];
                $datos[$j]["testigo"]=$aux3[0]["testigo"];
                $datos[$j]["foto_evolucion"]=$aux3[0]["foto_evolucion"];
            }
            else{
                $datos[$j]["internacion_id"]='no';
            }
            $j++;
        }
        if($clinica->logo==null)
            $image = base64_encode(file_get_contents(public_path("assets/ace/assets/images/avatars/logo.jpg")));
        else
            $image = base64_encode(file_get_contents(public_path("storage/Datos/Clinica/$clinica->logo")));
        $pdf= PDF::loadview('admin.paciente.ver_expediente', compact('clinica', 'image', 'historial', 'paciente', 'datos'));
        return $pdf->stream('ficha.pdf');
    }

    public function inactivar(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                $request->request->add(['estado' => 0]);
                Paciente::findOrFail($id)->update($request->all());
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
    public function activar(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                $request->request->add(['estado' => 1]);
                Paciente::findOrFail($id)->update($request->all());
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

    public function index_inactivo()
    {
        $paciente= Paciente::where('estado',0)->orderBy('id')->get();
        return view('admin.paciente.inactivo',compact('paciente'));
        //return view('admin.paciente.index');
    }
}
