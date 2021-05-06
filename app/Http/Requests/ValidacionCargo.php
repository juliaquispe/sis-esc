<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionCargo extends FormRequest
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
                'nombre' => 'required|max:50|unique:cargo,nombre,'. $this->route('id'),
                'descripcion' => 'nullable|max:250'
            ];
        }
        else{
           return [
               //crear
                'nombre' => 'required|max:50|unique:cargo,nombre',
                'descripcion' => 'nullable|max:250'
            ];
        }
    }
    public function messages()
    {
        return [
            'nombre.required' => 'Olvidaste el Nombre del Cargo',
            'nombre.max' => 'El nombre del Cargo debe ser menor a 50 caracteres',
            'nombre.unique' => 'El nombre del Cargo ya ha sido tomado',
            'descripcion.max' => 'La descripción debe ser menor a 250 caracteres'
        ];
    }

}
