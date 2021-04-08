<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionPaciente;
use App\Models\Admin\Paciente;
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

    public function destroy($id)
    {
        //
    }

    public function ver($id)
    {
        $paciente = Paciente::findOrfail($id);
        return view('admin.paciente.ver', compact('paciente'));
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
}
