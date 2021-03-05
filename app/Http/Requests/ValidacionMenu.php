<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionMenu extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        if($this ->route('id')){
            return [
                'nombre' =>'required|min:3|max:30|unique:menu,nombre,' .$this->route('id'),//PARA PODER EDITAR Y ACTUALIZAR
                'url'=>'required|max:50|unique:menu,url,' .$this->route('id'),
                'icono'=>'nullable|max:20'
            ];
        }
        else{
            return [
                'nombre' =>'required|min:3|max:30|unique:menu,nombre', // para poder crear
                'url'=>'required|max:50|unique:menu,url',
                'icono'=>'nullable|max:20'
            ];
        }
    }
    public function messages()
    {
        return[
            'nombre.required' => 'El nombre del Menú es requerido',
            'nombre.min' => 'El nombre debe ser mayor o igual a 3 carracteres',
            'nombre.max' => 'El nombre debe ser menor o igual a 30 carracteres',
            'nombre.unique' => 'El nombre del Menú ya fue tomado',
            'url.required'=>'la URL del Menú es requerido',
            'url.max'=>'La URL debe ser menor o igual a 50 carracteres',
            'url.unique' => 'La ruta del Menú ya fue tomado',
            'icono.max' => 'El Icono debe ser menor o igual a 20 carracteres'
        ];
    }

}
