<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clinica;
use App\Models\Admin\Consulta;
use App\Models\Admin\Ficha;
use App\Models\Admin\Historial;
use App\Models\Admin\Internacion;
use App\Models\Admin\Servicio;
use App\Models\Admin\Signos_Vitales;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class InternacionController extends Controller
{
    public function index()
    {
        $servicio=Servicio::findOrFail(3);
        $cama_cadena=$servicio->cama;
        $cama_objeto=json_decode($cama_cadena);
        $valor=0;
        foreach($cama_objeto as $dato){
            $valor++;
        }
        $datos= Internacion::where('estado',0)->orderBy('id')->get();
        return view('admin.internacion.index',compact('datos', 'valor', 'cama_objeto'));
    }

    public function index_alta()
    {
        $datos= Internacion::where('estado',1)->orderBy('id')->get();
        return view('admin.internacion.index_alta',compact('datos'));
    }

    public function create($id)
    {
        $servicio=Servicio::findOrFail(3);
        $cama_cadena=$servicio->cama;
        $camas=json_decode($cama_cadena);
        $datos=array();
        $i=0;
        foreach($camas as $cama){
            if($cama->estado=="libre"){
                $datos[$i]['orden']=$cama->orden;
                $datos[$i]['estado']=$cama->estado;
            }
            $i++;
        }
        $datos=json_encode($datos);
        $datos=json_decode($datos);
        Ficha::findOrFail($id)->update([
            'estado'=>1
        ]);
        $ficha= Ficha::findOrFail($id);
        $consulta_vector=Consulta::where('ficha_id',$id)->get();
        //dd($consulta_vector[0]["id"]);
        $consulta=Consulta::findOrFail($consulta_vector[0]["id"]);
        //dd($consulta->id);
        $signos_vitales_vector=Signos_Vitales::where('consulta_id',$consulta->id)->get();
        Signos_vitales::findOrFail($signos_vitales_vector[0]["id"])->update(['estado'=>1]);
        $SVM=Signos_vitales::findOrFail($signos_vitales_vector[0]["id"]);
        $historial=Historial::where('paciente_id', $ficha->paciente_id)->get();
        if($historial->count()==0)
            $sangre=null;
        else{
            $historial=Historial::FindOrFail($historial[0]['id']);
            $sangre=$historial->t_sangre;
        }
        return view('admin.internacion.crear', compact('ficha', 'consulta', 'sangre', 'SVM', 'datos'));

    }

    public function store(Request $request)
    {
        $num_cama=$request->cama;
        $servicio=Servicio::findOrFail(3);
        $cama_cadena=$servicio->cama;
        $cama_objeto=json_decode($cama_cadena);
        $cama_objeto[$num_cama-1]->estado='ocupado';
        $cama_cadena=json_encode($cama_objeto);
        $servicio->update([
            'cama'=>  $cama_cadena
        ]);
        Internacion::create($request->all());
        return redirect('admin/internacion')->with('mensaje', 'Datos Registrados Correctamente');
        //dd($request->all());
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        Ficha::findOrFail($id)->update([
            'estado'=>1
        ]);
        $dato = Internacion::findOrFail($id);
        $consulta = Consulta::findOrFail($dato->consulta_id);
        $ficha = Ficha:: findOrFail($consulta->ficha_id);
        $signos_vitales_vector=Signos_Vitales::where('consulta_id',$consulta->id)->get();
        $SVM=Signos_vitales::findOrFail($signos_vitales_vector[0]["id"]);
        $historial=Historial::where('paciente_id', $ficha->paciente_id)->get();
        if($historial->count()==0)
            $sangre=null;
        else{
            $historial=Historial::findOrFail($historial[0]['id']);
            $sangre=$historial->t_sangre;
        }
        $servicio=Servicio::findOrFail(3);
        $cama_cadena=$servicio->cama;
        $camas=json_decode($cama_cadena);
        $datos=array();
        $i=0;
        foreach($camas as $cama){
            if($cama->estado=="libre"||$cama->orden==$dato->cama){
                $datos[$i]['orden']=$cama->orden;
                $datos[$i]['estado']=$cama->estado;
            }
            $i++;
        }
        $datos=json_encode($datos);
        $datos=json_decode($datos);
        return view('admin.internacion.editar', compact('dato','consulta','ficha','SVM','sangre','datos'));
    }

    public function update(Request $request, $id)
    {
        $dato = Internacion::findOrfail($id);
        if($dato->cama!=$request->cama){
            $servicio=Servicio::findOrFail(3);
            $cama_cadena=$servicio->cama;
            $cama_objeto=json_decode($cama_cadena);
            $cama_objeto[$dato->cama-1]->estado='libre';
            $cama_objeto[$request->cama-1]->estado='ocupado';
            $cama_cadena=json_encode($cama_objeto);
            $servicio->update([
                'cama'=>  $cama_cadena
            ]);
        }
        Internacion::findOrFail($id)->update($request->all());
        return redirect('admin/internacion')->with('mensaje', 'Datos actualizados con exito');
    }

    public function imprimir_entrada($id)
    {
        $internacion=Internacion::findOrFail($id);
        $consulta=Consulta::findOrFail($internacion->consulta_id);
        $signos_vitales_vector=Signos_Vitales::where('consulta_id',$consulta->id)->get();
        $signos_vitales=Signos_vitales::findOrFail($signos_vitales_vector[0]["id"]);
        $clinica = Clinica ::findOrFail(1);
        if($clinica->logo==null)
            $image = base64_encode(file_get_contents(public_path("assets/ace/assets/images/avatars/logo.jpg")));
        else
            $image = base64_encode(file_get_contents(public_path("storage/Datos/Clinica/$clinica->logo")));
        $pdf= PDF::loadview('admin.internacion.imprimir_entrada', compact('internacion', 'clinica', 'image', 'signos_vitales'));
        return $pdf->stream('internacion.pdf');
    }

    public function solicitar_alta($id)
    {
        $dato = Internacion::findOrfail($id);
        $consulta=Consulta::findOrFail($dato->consulta_id);
        $ficha=Ficha::findOrFail($consulta->ficha_id);
        $signos_vitales_vector=Signos_vitales::where('consulta_id',$consulta->id)->get();
        $SVM=Signos_vitales::findOrFail($signos_vitales_vector[0]["id"]);
        $historial=Historial::where('paciente_id',$ficha->paciente_id)->get();
        if($historial->count()==0)
            $sangre=null;
        else{
            $historial=Historial::findOrFail($historial[0]["id"]);
            $sangre=$historial->t_sangre;
        }
        return view('admin.internacion.alta', compact('dato','consulta','ficha','SVM','sangre'));
    }
    public function dar_alta(Request $request, $id)
    {
        $vector=$request->fotos;
        if($vector!=null){
            $fotos=array();
            $i=0;
            foreach($vector as $dato){
                $fotos[$i]["foto"]=Internacion::setFoto($dato);
                $i++;
            }
            $fotos_cadena=json_encode($fotos);
            $request->request->add(['foto_evolucion' => $fotos_cadena]);
        }
        $request->request->add(['estado'=> 1]);
        Internacion::findOrFail($id)->update($request->all());
        $dato=Internacion::findOrFail($id);
         $servicio=Servicio::findOrFail(3);
            $cama_cadena=$servicio->cama;
            $cama_objeto=json_decode($cama_cadena);
            $cama_objeto[$dato->cama-1]->estado='libre';
            $cama_cadena=json_encode($cama_objeto);
            $servicio->update([
                'cama'=>  $cama_cadena
            ]);
        return redirect('admin/internacion_alta')->with('mensaje', 'Registro Guardado con exito');
    }

    public function imprimir_forzoso($id)
    {
        $internacion=Internacion::findOrFail($id);
        $consulta=Consulta::findOrFail($internacion->consulta_id);
        $signos_vitales_vector=Signos_Vitales::where('consulta_id',$consulta->id)->get();
        $signos_vitales=Signos_vitales::findOrFail($signos_vitales_vector[0]["id"]);
        $clinica = Clinica ::findOrFail(1);
        if($clinica->logo==null)
            $image = base64_encode(file_get_contents(public_path("assets/ace/assets/images/avatars/logo.jpg")));
        else
            $image = base64_encode(file_get_contents(public_path("storage/Datos/Clinica/$clinica->logo")));
        $pdf= PDF::loadview('admin.internacion.imprimir_forzoso', compact('internacion', 'clinica', 'image', 'signos_vitales'));
        return $pdf->stream('internacion.pdf');
    }

    public function imprimir_todo($id)
    {
        $internacion=Internacion::findOrFail($id);
        $consulta=Consulta::findOrFail($internacion->consulta_id);
        $signos_vitales_vector=Signos_Vitales::where('consulta_id',$consulta->id)->get();
        $signos_vitales=Signos_vitales::findOrFail($signos_vitales_vector[0]["id"]);
        $clinica = Clinica::findOrFail(1);
        if($clinica->logo==null)
        $image = base64_encode(file_get_contents(public_path("assets/ace/assets/images/avatars/logo.jpg")));
        else
        $image = base64_encode(file_get_contents(public_path("storage/Datos/Clinica/$clinica->logo")));
        if ($internacion->foto_evolucion==null) {
            $fotos=null;
        } else {
            $fotos=$internacion->foto_evolucion;
            $fotos=json_decode($fotos);
        }

        $pdf=PDF::loadview('admin.internacion.imprimir_todo', compact('clinica','image','internacion','signos_vitales','fotos'));
        return $pdf->stream('ficha.pdf');
    }

    public function num_camas($aux)
    {
        $servicio=Servicio::findOrFail(3);
            $cama_cadena=$servicio->cama;
            $cama_objeto=json_decode($cama_cadena);
            $valor=0;
            foreach($cama_objeto as $dato){
                $valor++;
            }
        if ($aux=="mas") {
            $cama_objeto[$valor]["orden"]=$valor+1;
            $cama_objeto[$valor]['estado']='libre';
            $cama_cadena=json_encode($cama_objeto);
            $servicio->update([
                'cama'=>  $cama_cadena
            ]);
            return redirect('admin/internacion');
        }
        else {
            if($valor==0)
            return redirect('admin/internacion')->with('mensajeerror', 'todos las camas ya fueron eliminados');
            else{
                if($dato->estado!='ocupado'){
                    $cama=array();
                    $i=0;
                    foreach($cama_objeto as $dato){
                        if($i<$valor-1){
                            $cama[$i]["orden"]=$dato->orden;
                            $cama[$i]["estado"]=$dato->estado;
                        }
                        $i++;
                    }
                    $cama_cadena=json_encode($cama);
                    $servicio->update([
                        'cama'=>  $cama
                    ]);
                    return redirect('admin/internacion');
                }
                else{
                    return redirect('admin/internacion')->with('mensajeerror', 'esa cama aún esta ocupada');
                }
            }
        }
    }
    public function mantenimiento_cama($id,$estado)
    {
        $servicio=Servicio::findOrFail(3);
        $cama_cadena=$servicio->cama;
        $cama_objeto=json_decode($cama_cadena);
        $cama_objeto[$id-1]->estado=$estado;
        $cadena=json_encode($cama_objeto);
        $servicio->update([
            'cama'=>  $cadena
        ]);
        return redirect('admin/internacion');
    }
}
