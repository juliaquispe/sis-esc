<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionPaciente;
use App\Models\Admin\Clinica;
use App\Models\Admin\Consulta;
use App\Models\Admin\Ficha;
use App\Models\Admin\Gabinete;
use App\Models\Admin\Historial;
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
            $datos=Paciente::where($seleccion, 'LIKE', '%'. $query . '%')->paginate(100);
            $contador=Paciente::where($seleccion, 'LIKE', '%'. $query . '%')->count();
            $aux=0;
            if($contador==0)
            return back()->with('mensajeerror', 'No se  encontró los resultados de tu búsqueda');
            else
                return view('admin.paciente.index',['datos'=>$datos,'search'=>$query, 'aux'=>$aux, 'seleccion'=>$seleccion]);
        }
        else {
            $datos = Paciente::orderBy('id', 'desc')->paginate(10);
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
        $signos_vitales= Signos_Vitales :: where('paciente_id', $paciente->id)->get();
        $SVM=$signos_vitales->max();
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
            $j++;
        }
        return view('admin.paciente.ver', compact('paciente', 'SVM','datos'));
    }

    public function ordenar(Request $request)
    {
        //dd($request->all());
        if($request->search==null){
            if ($request->id==1)
                    $datos = Paciente::orderBy('apellido_p')->paginate(10);
            else
                if ($request->id==2)
                        $datos = Paciente::orderBy('ci')->paginate(10);
                else
                    if ($request->id==3)
                            $datos = Paciente::orderBy('ci')->paginate(10);
                    else
                        if ($request->id==4)
                                $datos = Paciente::orderBy('fecha_nac', 'desc')->paginate(10);
                        else
                            if ($request->id==5)
                                    $datos = Paciente::orderBy('t_sangre')->paginate(10);
                            else
                                    $datos = Paciente::orderBy('celular')->paginate(10);
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
                $datos = Paciente::where($seleccion, 'LIKE', '%'. $query . '%')->orderBy('apellido_p')->paginate(100);
            else
                if ($request->id==100)
                        $datos = Paciente::where($seleccion, 'LIKE', '%'. $query . '%')->orderBy('ci')->paginate(100);
                else
                    if ($request->id==3)
                            $datos = Paciente::where($seleccion, 'LIKE', '%'. $query . '%')->orderBy('ci')->paginate(100);
                    else
                        if ($request->id==4)
                                $datos = Paciente::where($seleccion, 'LIKE', '%'. $query . '%')->orderBy('fecha_nac', 'desc')->paginate(100);
                        else
                            if ($request->id==5)
                                    $datos = Paciente::where($seleccion, 'LIKE', '%'. $query . '%')->orderBy('t_sangre')->paginate(100);
                            else
                                    $datos = Paciente::where($seleccion, 'LIKE', '%'. $query . '%')->orderBy('celular')->paginate(100);
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
        if($clinica->logo==null)
            $image = base64_encode(file_get_contents(public_path("assets/ace/assets/images/avatars/logo.jpg")));
        else
            $image = base64_encode(file_get_contents(public_path("storage/Datos/Clinica/$clinica->logo")));
        $pdf= PDF::loadview('admin.paciente.imprimir_consulta', compact('clinica', 'image', 'ficha', 'signos_vitales', 'consulta', 'receta', 'gabinete'));
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
            $j++;
        }
        if($clinica->logo==null)
            $image = base64_encode(file_get_contents(public_path("assets/ace/assets/images/avatars/logo.jpg")));
        else
            $image = base64_encode(file_get_contents(public_path("storage/Datos/Clinica/$clinica->logo")));
        $pdf= PDF::loadview('admin.paciente.ver_expediente', compact('clinica', 'image', 'historial', 'paciente', 'datos'));
        return $pdf->stream('ficha.pdf');
    }
}
