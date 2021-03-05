<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionRol extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        if($this ->route('id')){
            return [
                'rol' =>'required|max:50|unique:roles,rol,' .$this->route('id')//PARA PODER EDITAR Y ACTUALIZAR
            ];
        }
        else{
            return [
                'rol' =>'required|max:50|unique:roles,rol', // para poder crear
            ];
        }
    }
    public function messages()
    {
        return[
            'rol.required' => 'El nombre del rol es requerido',
            'rol.max' => 'El rol debe ser menor o igual a 50 carracteres',
            'rol.unique' => 'Nombre de Rol ya fue tomado',
        ];
    }
}
