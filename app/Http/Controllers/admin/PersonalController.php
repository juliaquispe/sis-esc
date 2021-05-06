<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionPersonal;
use App\Models\Admin\Cargo;
use App\Models\Admin\Personal;
use App\Models\Admin\Rol;
use App\Models\Admin\Unidad;
use App\Models\Admin\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PersonalController extends Controller
{
    public function index()
    {
        $personal = Personal::where('estado',1)->orderBy('id')->get();
        return view('admin.personal.index', compact('personal'));
    }

    public function create()
    {
        $roles= Rol ::orderBy('id')->pluck('rol', 'id');
        $cargo = Cargo ::orderBy('id')->pluck('nombre', 'id');
        $unidad = Unidad ::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('admin.personal.crear', compact('unidad','cargo', 'roles'));
    }

    public function store(ValidacionPersonal $request)
    {
        //dd($request->all());
        if($foto=Personal::setFoto($request->foto_up))
            $request->request->add(['foto'=>$foto]);
        if($documento=Personal::setDocumento($request->documento_up))
            $request->request->add(['curriculum'=>$documento]);
        if($request->rol_id==null){
            $request->request->add(['sistema'=>'no']);
            $personal= Personal::create($request->all());
            return redirect('admin/personal')->with('mensaje','Personal creado con exito');
        }
        else{
            $request->request->add(['sistema'=>'si']);
            $personal= Personal::create($request->all());
            if(Auth::user()->rol_id==1)
                $aux=1;
            else
                $aux=2;
            Usuario::create([
                'rol_id'=>$request->rol_id,
                'usuario'=>$personal->ci,
                'nombre'=>$personal->nombre,
                'apellido'=>$personal->apellido,
                'email'=>$personal->ci.'@gmail.com',
                'password'=>$personal->ci,
                'estado'=>$aux,
                'personal_id'=>$personal->id
            ]);
            return redirect('admin/personal')->with('mensaje','Personal y Usuario creado con exito');
        }
    }

    public function ver(Personal $personal)
    {
        return view ('admin.personal.foto', compact('personal'));
    }

    public function edit($id)
    {
        $roles= Rol ::orderBy('id')->pluck('rol', 'id');
        $cargo = Cargo ::orderBy('id')->pluck('nombre', 'id');
        $unidad = Unidad::orderBy('id')->pluck('nombre', 'id')->toArray();
        $personal = Personal::with('unidad')->findOrFail($id);
        return view('admin.personal.editar', compact('personal','unidad', 'cargo', 'roles'));
    }

    public function update(ValidacionPersonal $request, $id)
    {
        $personal = Personal::findOrFail($id);
        if ($foto = Personal::setFoto($request->foto_up, $personal->foto))
            $request->request->add(['foto' => $foto]);
        if ($documento = Personal::setDocumento($request->documento_up, $personal->curriculum))
            $request->request->add(['curriculum' => $documento]);
        if($request->rol_id==null){
            $personal->update($request->all());
            return redirect('admin/personal')->with('mensaje', 'Datos actualizados con exito');
        }
        else{
            $request->request->add(['sistema'=>'si']);
            $personal->update($request->all());
            if(Auth::user()->rol_id==1)
                $aux=1;
            else
                $aux=2;
            Usuario::create([
                'rol_id'=>$request->rol_id,
                'usuario'=>$request->ci,
                'nombre'=>$request->nombre,
                'apellido'=>$request->apellido,
                'email'=>$request->ci.'@gmail.com',
                'password'=>$request->ci,
                'estado'=>$aux,
                'personal_id'=>$personal->id
            ]);
            return redirect('admin/personal')->with('mensaje', 'Usuario creado con exito');
        }
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $personal = Personal::findOrFail($id);
            if (Personal::destroy($id)) {
                Storage::disk('public')->delete("Datos/Personal/Fotos/$personal->foto");
                Storage::disk('public')->delete("Datos/Personal/Documentos/$personal->curriculum");
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    public function foto($id){
        $personal = Personal::findOrFail($id);
        return view ('admin.personal.ver', compact('personal'));
        //dd($personal);
    }
    public function pdf($id)
    {
        $personal = Personal::findOrFail($id);
        $file= public_path().'\storage\Datos/Personal/Documentos/'.$personal->curriculum;
        return response()->file($file);
    }

    public function index_inactivo()
    {
        $personal= Personal::where('estado',0)->orderBy('id')->get();
        return view('admin.personal.inactivo',compact('personal'));
        //return view('admin.personal.index');
    }

    public function inactivar(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                $request->request->add(['estado' => 0]);
                Personal::findOrFail($id)->update($request->all());
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
                Personal::findOrFail($id)->update($request->all());
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
