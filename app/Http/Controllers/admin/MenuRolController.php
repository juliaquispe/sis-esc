<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Admin\Rol;
use Illuminate\Http\Request;

class MenuRolController extends Controller
{
    public function index()
    {
        $rols = Rol::orderBy('id')->pluck('rol','id')->toArray(); //solo mostrara los atributos del pluck y lo convierte en un array
        $menus = Menu::getMenu(); //ls funcion getmenu nos da los menus(padres) y submenus(hijos)
        $menusRols=Menu::with('roles')->get()->pluck('roles', 'id')->toArray();
        return view('admin.menu-rol.index', compact('rols', 'menus', 'menusRols'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $menus = new Menu();
            if ($request->input('estado') == 1) {
                $menus->find($request->input('menu_id'))->roles()->attach($request->input('rol_id'));//attach=añadir en BD
                return response()->json(['respuesta' => 'El Menú se asignó correctamente']);
            } else {
                $menus->find($request->input('menu_id'))->roles()->detach($request->input('rol_id'));//detach=quitar de BD
                return response()->json(['respuesta' => 'El Menú se quitó correctamente']);
            }
        } else {
            abort(404);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
