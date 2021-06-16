<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clinica;
use App\Models\Admin\Consulta;
use App\Models\Admin\Ficha;
use App\Models\Admin\Gabinete;
use App\Models\Admin\Historial;
use App\Models\Admin\Paciente;
use App\Models\Admin\Personal;
use App\Models\Admin\Receta;
use App\Models\Admin\Servicio;
use App\Models\Admin\Signos_vitales;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{

    public function index(Request $request)
    {
        $servicio = Servicio::findOrFail(1);
        if($request->search!=null){
            $seleccion=$request->seleccion;
            $query= trim($request->get('search'));
            $search=$query;
            $datos=Paciente::where([
                ['estado',1],
                [ $seleccion, 'LIKE', '%'. $query . '%']
               ])->get();
            return view('admin.consulta.index', compact('servicio','search','datos'));
        }
        else{
            $search=null;
            $datos=null;
            if($request->ver_fecha==null){
                $fecha_actual = new \DateTime();
                $fecha_actual=$fecha_actual->format('Y-m-d');
                $fichas = Ficha::where([
                    ['servicio_id',1],
                    ['fecha',$fecha_actual],
                ])->orderBy('id','desc')->get();
                return view('admin.consulta.index', compact('servicio','search','datos','fichas','fecha_actual'));
            }
            else{
                $fecha_actual=$request->ver_fecha;
                //Calculo de estado 2
                $fichas_cero= Ficha::where([
                    ['servicio_id',1],
                    ['fecha',$fecha_actual],
                    ['estado', 0]
                ])->get();
                $fecha_act = new \DateTime();
                $fecha_act=$fecha_act->format('Y-m-d');
                foreach($fichas_cero as $F_C){
                    if ($F_C->fecha<$fecha_act) {
                        Ficha::findOrFail($F_C->id)->update([
                            'estado'=>2
                        ]);
                    }
                }
                //Fin del calculo de estado 2
                $fichas = Ficha::where([
                    ['servicio_id',1],
                    ['fecha',$fecha_actual],
                ])->orderBy('id','desc')->get();
                return view('admin.consulta.index', compact('servicio','search','datos','fichas','fecha_actual'));
            }
        }
    }

    public function create($id)
    {
        $ficha=Ficha::findOrFail($id);
        $paciente=Paciente::findOrFail($ficha->paciente_id);
        $aux1=consulta::where('ficha_id',$ficha->id)->get();
        //dd($aux->count());
        $signos= Signos_Vitales :: where([
            ['paciente_id', $paciente->id],
            ['estado',1]
        ])->get();
        $SVM=$signos->max();
        $aux_fecha=" ";
        if ($SVM!=null) {
            $aux_consulta=Consulta::findOrFail($SVM->consulta_id);
            $aux_ficha=Ficha::findOrFail($aux_consulta->ficha_id);
            $aux_fecha=$aux_ficha->fecha;
        }
        if(session()->get('usuario_personal_id')==null){
            $doctor="Dr. ".session()->get('nombre_usuario')." ".session()->get('apellido_usuario');
        }else{
            $persona=Personal::findOrFail(session()->get('usuario_personal_id'));
            if ($persona->genero=='Hombre')
                $doctor="Dr. ".$persona->nombre." ".$persona->apellido;
            else
                $doctor="Dra. ".$persona->nombre." ".$persona->apellido;
        }
        if($aux1->count()==0){
            $consulta= Consulta::create([
                'ficha_id'=>$ficha->id,
                'motivo'=>'-',
                'diagnostico'=>'-',
                'doctor'=>$doctor,
            ]);
            $signos_vitales= Signos_vitales::create([
                'consulta_id'=>$consulta->id,
                'paciente_id'=>$paciente->id,
            ]);
        }
        else{
            $consulta_vector=Consulta::where('ficha_id',$ficha->id)->get();
            //dd($consulta_vector[0]["id"]);
            $consulta=Consulta::findOrFail($consulta_vector[0]["id"]);
            //dd($consulta->id);
            $signos_vitales_vector=Signos_vitales::where('consulta_id',$consulta->id)->get();
            $signos_vitales=Signos_vitales::findOrFail($signos_vitales_vector[0]["id"]);
        }
        $aux2=Historial::where('paciente_id',$paciente->id)->get();
        if($aux2->count()==0){
            $historial=null;
            $aux3=null;
        }
        else{
            $historial=Historial::findOrFail($aux2[0]["id"]);
            $aux3=$historial->id;
        }
        $aux4=Gabinete::where('consulta_id', $consulta->id)->get();
        if($aux4->count()==0){
            $gabinete=null;
        }else{
            $gabinete=Gabinete::findOrFail($aux4[0]["id"]);
        }
        //dd($consulta[0]["id"]);
        return view('admin.consulta.crear', compact('paciente','ficha','consulta','signos_vitales','historial','aux3', 'SVM', 'gabinete', 'aux_fecha'));
    }

    public function consulta_guardar(Request $request)
    {
        if ($request->ajax()) {
            if($request->motivo!=null&&$request->diagnostico!=null){
                Signos_vitales::findOrFail($request->signos_vitales_id)->update($request->all());
                Consulta::findOrFail($request->consulta_id)->update($request->all());
                return response()->json(['mensaje' =>'ok']);
            }
            else{
                return response()->json(['mensaje' =>'no']);
            }
        } else {
            abort(404);
        }
    }
    public function consulta_actualizar(Request $request)
    {
        if ($request->ajax()) {
            if($request->motivo!=null&&$request->diagnostico!=null){
                Signos_vitales::findOrFail($request->signos_vitales_id)->update($request->all());
                Consulta::findOrFail($request->consulta_id)->update($request->all());
                return response()->json(['mensaje' =>'actualizar']);
            }
            else{
                return response()->json(['mensaje' =>'no']);
            }
        } else {
            abort(404);
        }
    }
    public function receta_guardar(Request $request)
    {
        if ($request->ajax()) {
            if($request->receta!=null){
                $aux=Receta::where('consulta_id',$request->consulta_id)->get();
                if($aux->count()==0){
                   $receta=Receta::create($request->all());
                    return response()->json(['mensaje' =>'ok', 'receta' => $receta->id]);
                }
                else{
                    $aux1=Receta::where('consulta_id',$request->consulta_id)->get();
                    $receta=Receta::findOrFail($aux1[0]["id"]);
                    $receta->update($request->all());

                    return response()->json(['mensaje' =>'ok', 'receta' => $receta->id]);
                }
            }
            else{
                return response()->json(['mensaje' =>'no']);
            }
        } else {
            abort(404);
        }
    }
    public function receta_actualizar(Request $request)
    {
        if ($request->ajax()) {
            if($request->receta!=null){
                Receta::findOrFail($request->receta_id)->update($request->all());
                return response()->json(['mensaje' =>'actualizar','receta' =>$request->receta_id]);
            }
            else{
                return response()->json(['mensaje' =>'no']);
            }
        } else {
            abort(404);
        }
    }

    public function historial_guardar(Request $request)
    {
        if ($request->ajax()) {
            $aux=Historial::where('paciente_id',$request->paciente_id)->get();
            if($aux->count()==0){
                $historial=Historial::create($request->all());
                return response()->json(['mensaje' =>'ok', 'historial' => $historial->id]);
            }
            else{
                Historial::findOrFail($request->historial_id)->update($request->all());
                return response()->json(['mensaje' =>'ok', 'historial' => $request->historial_id]);
            }
        } else {
            abort(404);
        }
    }
    public function historial_actualizar(Request $request)
    {
        if ($request->ajax()) {
            if($request->historial_id!=null){
                Historial::findOrFail($request->historial_id)->update($request->all());
                return response()->json(['mensaje' =>'actualizar','historial' =>$request->historial_id]);
            }
        } else {
            abort(404);
        }
    }

    public function imprimir_historial($id)// la id es  la del paciente
    {
        $aux=Historial::where('paciente_id', $id)->get();
        $historial = Historial::findOrFail($aux[0]["id"]);
        $consulta=Consulta::findOrFail($historial->consulta_id);
        $ficha=Ficha::findOrFail($consulta->ficha_id);
        $clinica = Clinica ::findOrFail(1);
        if($clinica->logo==null)
            $image = base64_encode(file_get_contents(public_path("assets/ace/assets/images/avatars/logo.jpg")));
        else
            $image = base64_encode(file_get_contents(public_path("storage/Datos/Clinica/$clinica->logo")));
        $pdf= PDF::loadview('admin.consulta.imprimir_historial', compact('historial', 'clinica', 'image', 'ficha'));
        return $pdf->stream('ficha.pdf');

    }

    public function imprimir_consulta($id)// la id de la consulta
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
        if($clinica->logo==null)
            $image = base64_encode(file_get_contents(public_path("assets/ace/assets/images/avatars/logo.jpg")));
        else
            $image = base64_encode(file_get_contents(public_path("storage/Datos/Clinica/$clinica->logo")));
        $pdf= PDF::loadview('admin.consulta.imprimir_consulta', compact('clinica', 'image', 'ficha', 'signos_vitales', 'consulta', 'receta'));
        return $pdf->stream('ficha.pdf');

    }

    public function terminar_consulta($id)// la id de la ficha
    {
        Ficha::findOrFail($id)->update([
            'estado'=>1
        ]);
        $consulta_vector=Consulta::where('ficha_id',$id)->get();
        //dd($consulta_vector[0]["id"]);
        $consulta=Consulta::findOrFail($consulta_vector[0]["id"]);
        //dd($consulta->id);
        $signos_vitales_vector=Signos_vitales::where('consulta_id',$consulta->id)->get();
        Signos_vitales::findOrFail($signos_vitales_vector[0]["id"])->update(['estado'=>1]);
        return redirect('admin/ficha/consulta')->with('mensaje', 'Consulta terminada exitosamente');
    }

    public function gabinete_guardar (Request $request)// la id de la ficha
    {
        if ($request->ajax()) {
            if($request->estudio_g!=null){
                $aux=Gabinete::where('consulta_id',$request->consulta_id)->get();
                if($aux->count()==0){
                   $gabinete=Gabinete::create($request->all());
                    return response()->json(['mensaje' =>'ok', 'gabinete' => $gabinete->id]);
                }
                else{
                    $aux1=Gabinete::where('consulta_id',$request->consulta_id)->get();
                    $gabinete=Gabinete::findOrFail($aux1[0]["id"]);
                    $gabinete->update($request->all());

                    return response()->json(['mensaje' =>'ok', 'gabinete' => $gabinete->id]);
                }
            }
            else{
                return response()->json(['mensaje' =>'no']);
            }
        } else {
            abort(404);
        }
    }

    public function gabinete_actualizar(Request $request)
    {
        if ($request->ajax()) {
            if($request->estudio_g!=null){
                Gabinete::findOrFail($request->gabinete_id)->update($request->all());
                return response()->json(['mensaje' =>'actualizar','gabinete' =>$request->gabinete_id]);
            }
            else{
                return response()->json(['mensaje' =>'no']);
            }
        } else {
            abort(404);
        }
    }

    public function imprimir_gabinete($id)// la id de la consulta
    {
        $consulta=Consulta::findOrFail($id);
        $ficha=Ficha::findOrFail($consulta->ficha_id);
        $clinica = Clinica ::findOrFail(1);
        $aux1=Gabinete::where('consulta_id', $consulta->id)->get();
        if($aux1->count()==0){
            $gabinete=null;
        }else{
            $gabinete=Gabinete::findOrFail($aux1[0]["id"]);
        }
        if($clinica->logo==null)
            $image = base64_encode(file_get_contents(public_path("assets/ace/assets/images/avatars/logo.jpg")));
        else
            $image = base64_encode(file_get_contents(public_path("storage/Datos/Clinica/$clinica->logo")));
        $pdf= PDF::loadview('admin.consulta.imprimir_gabinete', compact('clinica', 'image', 'ficha', 'consulta', 'gabinete'));
        return $pdf->stream('ficha.pdf');
    }

    public function imprimir_receta($id)// la id de la receta
    {
        $consulta=Consulta::findOrFail($id);
        $ficha=Ficha::findOrFail($consulta->ficha_id);
        $clinica = Clinica ::findOrFail(1);
        $aux1=Receta::where('consulta_id', $consulta->id)->get();
        if($aux1->count()==0){
            $receta=null;
        }else{
            $receta=Receta::findOrFail($aux1[0]["id"]);
        }
        if($clinica->logo==null)
            $image = base64_encode(file_get_contents(public_path("assets/ace/assets/images/avatars/logo.jpg")));
        else
            $image = base64_encode(file_get_contents(public_path("storage/Datos/Clinica/$clinica->logo")));
        $pdf= PDF::loadview('admin.consulta.imprimir_receta', compact('clinica', 'image', 'ficha', 'consulta', 'receta'));
        return $pdf->stream('ficha.pdf');

    }
}
