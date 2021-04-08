<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionPersonal;
use App\Models\Admin\Personal;
use App\Models\Admin\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonalController extends Controller
{
    public function index()
    {
        $personal = Personal::orderBy('id')->get();
        return view('admin.personal.index', compact('personal'));
    }

    public function create()
    {
        $unidad = Unidad ::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('admin.personal.crear', compact('unidad'));
    }

    public function store(ValidacionPersonal $request)
    {
        if($foto=Personal::setFoto($request->foto_up))
            $request->request->add(['foto'=>$foto]);
        if($documento=Personal::setDocumento($request->documento_up))
            $request->request->add(['curriculum'=>$documento]);
        //dd($request->all());
        Personal::create($request->all());
        return redirect('admin/personal')->with('mensaje','Personal creado con exito');

    }

    public function ver(Personal $personal)
    {
        return view ('admin.personal.foto', compact('personal'));
    }

    public function edit($id)
    {
        $unidad = Unidad::orderBy('id')->pluck('nombre', 'id')->toArray();
        $personal = Personal::with('unidad')->findOrFail($id);
        return view('admin.personal.editar', compact('personal','unidad'));
    }

    public function update(ValidacionPersonal $request, $id)
    {
        $personal = Personal::findOrFail($id);
        if ($foto = Personal::setFoto($request->foto_up, $personal->foto))
            $request->request->add(['foto' => $foto]);
        if ($documento = Personal::setDocumento($request->documento_up, $personal->curriculum))
            $request->request->add(['curriculum' => $documento]);
        $personal->update($request->all());
        return redirect('admin/personal')->with('mensaje', 'Datos actualizados con exito');
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
}
