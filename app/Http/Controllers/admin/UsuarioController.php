<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionUsuario;
use App\Models\Admin\Personal;
use App\Models\Admin\Rol;
use App\Models\Admin\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    public function index()
    {
        $datos= Usuario::where('estado',1)->orderBy('id')->get();
        return view('admin.usuarios.index',compact('datos'));
        //return view('admin.usuarios.index');
    }

    public function create()
    {
        $roles = Rol ::orderBy('id')->pluck('rol', 'id')->toArray();
        return view('admin.usuarios.crear', compact('roles'));
    }

    public function store(ValidacionUsuario $request)
    {
        //dd($request->all());
        if($foto=Usuario::setFoto($request->foto_up))
        $request->request->add(['foto'=>$foto]);
        Usuario::create($request->all());
        return redirect('admin/usuario')->with('mensaje','usuario creada con exito');
    }


    public function ver(Usuario $usuario)
    {
        return view ('admin.usuarios.foto', compact('usuario'));
        //dd($usuarios);
    }
    public function edit($id)
    {
        $mi_usuario=null;
        $rols = Rol ::orderBy('id')->pluck('rol', 'id')->toArray();
        $usuario = Usuario ::findOrfail($id);
        return view('admin.usuarios.editar', compact('usuario','rols', 'mi_usuario'));
    }

    public function update(ValidacionUsuario $request, $id)
    {
        $usuario=Usuario::findOrFail($id);
        if ($foto = Usuario::setFoto($request->foto_up, $usuario->foto))
            $request->request->add(['foto' => $foto]);
        $usuario->update(array_filter($request->all()));
        return redirect('admin/usuario')->with('mensaje', 'Usuario actualizado con exito');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $usuario=Usuario::findOrFail($id);
            if (Usuario::destroy($id)) {
                Storage::disk('public')->delete("Datos/Fotos/Usuario/$usuario->foto");
                if($usuario->personal_id!=null){
                    $personal= Personal::findOrFail($usuario->personal_id);
                    $personal->update(['sistema'=>'no']);
                }
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
        $datos= Usuario::where('estado',0)->orderBy('id')->get();
        return view('admin.usuarios.inactivos',compact('datos'));
        //return view('admin.usuarios.index');
    }

    public function inactivar(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                $request->request->add(['estado' => 0]);
                Usuario::findOrFail($id)->update($request->all());
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
                Usuario::findOrFail($id)->update($request->all());
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

    public function edit_usuario($id) //PARA QUE EDITE DE CADA USUARIO EN HEDER
    {
        if($id==session()->get('usuario_id')){
            $mi_usuario='heder';
            $usuario = Usuario ::findOrfail($id);
            return view('admin.usuarios.editar', compact('usuario', 'mi_usuario'));
        }
        else{
            return back()->with('mensajeerror', 'Usted no puede editar otros usuarios');
        }
    }

    public function update_usuario(ValidacionUsuario $request, $id) //PARA QUE EDITE DE CADA USUARIO HEDER
    {
        $usuario=Usuario::findOrFail($id);
        if ($foto = Usuario::setFoto($request->foto_up, $usuario->foto))
            $request->request->add(['foto' => $foto]);
        $usuario->update(array_filter($request->all()));
        $rol=$usuario->rol()->get();
        $usuario->setSession($rol);
        return redirect('admin')->with('mensaje', 'Usuario actualizado con exito');
    }

    public function aceptar($id)
    {
        $usuario= Usuario:: findOrFail($id);
        $usuario->update([
            'estado'=>1
        ]);
        return redirect('admin/usuario')->with('mensaje', 'Usuario Agregado al Sistema');

    }

        public function rechazar($id)
    {
        $usuario= Usuario:: findOrFail($id);
        Usuario::destroy($id);
        $personal= Personal::findOrFail($usuario->personal_id);
        $personal->update(['sistema'=>'no']);
        return back()->with('mensajeerror', 'Usuario Denegado al Sistema');
    }
}
