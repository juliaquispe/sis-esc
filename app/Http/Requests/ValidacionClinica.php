<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionClinica extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if($this->route('id')){
            return [
                    //editar
                    'nombre'=>'required|min:10|max:100|unique:clinica,nombre,'. $this->route('id'),
                    'direccion'=>'required|min:10|max:60',
                    'telefono'=>'nullable|min:5|max:10|unique:clinica,telefono,'. $this->route('id'),
                    'contacto_1'=>'required|min:5|max:10|unique:clinica,contacto_1,'. $this->route('id'),
                    'contacto_2'=>'nullable|min:5|max:10|unique:clinica,contacto_2,'. $this->route('id'),
                    'propietario'=>'nullable|min:20|max:100',
                    'mision'=>'nullable|min:10',
                    'vision'=>'nullable|min:10',
                    'descripcion'=>'nullable|min:10',
                    'color'=>'required',
                    'foto_up'=>'nullable|image|max:3000',
                    'logo_up'=>'nullable|image|max:1000',
                ];
            }
    }
    public function messages()
    {
        return [
            'nombre.required' => 'Olvidaste el nombre de la Clinica',
        ];
    }
}
