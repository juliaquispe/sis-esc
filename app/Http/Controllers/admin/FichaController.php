<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ficha;
use Illuminate\Http\Request;

class FichaController extends Controller
{
    public function index()
    {
        //dd('hola');
        $datos= Ficha::orderBy('id', 'desc')->get();
        return view('admin.ficha.index',compact('datos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
