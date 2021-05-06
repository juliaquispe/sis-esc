<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionPersonal extends FormRequest
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
                    'nombre'=>'required|min:2|max:50',
                    'apellido'=>'required|min:2|max:50',
                    'ci'=>'required|min:7|max:12|unique:personal,ci,'. $this->route('id'),
                    'direccion'=>'nullable|min:5|max:60',
                    'celular'=>'nullable|min:5|max:12|unique:personal,celular,'. $this->route('id'),
                    'fecha_ing'=>'required|date|date_format:Y-m-d',
                    'cargo_id'=>'required|integer',
                    'unidad_id'=>'required|integer',
                    'foto_up'=>'nullable|image|max:3000',
                    'genero'=>'required|max:6',
                    'documento_up'=>'nullable|max:3000',
                ];
            }
            else{
                return [
                    //crear
                    'nombre'=>'required|min:2|max:50',
                    'apellido'=>'required|min:2|max:50',
                    'ci'=>'required|min:7|max:12|unique:personal,ci',
                    'direccion'=>'nullable|min:5|max:60',
                    'celular'=>'nullable|min:5|max:12|unique:personal,celular',
                    'fecha_ing'=>'required|date|date_format:Y-m-d',
                    'cargo_id'=>'required|integer',
                    'unidad_id'=>'required|integer',
                    'foto_up'=>'nullable|image|max:3000',
                    'genero'=>'required|max:6',
                    'documento_up'=>'nullable|max:3000',
                ];
            }
    }
    public function messages()
    {
        return [
            'nombre.required' => 'Olvidaste el nombre del Personal',
            'nombre.max' => 'El nombre del Personal debe ser menor a 50 caracteres',
            'nombre.min' => 'El nombre del Personal debe ser mayor a 2 caracteres',
            'apellido.required' => 'Olvidaste el apellido del Personal',
            'apellido.max' => 'El apellido del Personal debe ser menor a 50 caracteres',
            'apellido.min' => 'El apellido del Personal debe ser mayor a 2 caracteres',
            'ci.required' => 'Olvidaste el número de Carnet del Personal',
            'ci.max' => 'El número de Carnet del Personal no puede tener mas de 12 digitos',
            'ci.min' => 'El número de Carnet del Personal debe tener al menos 7 digitos',
            'ci.unique' => 'El número de Carnet ya ha sido tomado',
            'direccion'=>'La dirrección no puede tener mas de 60 caracteres',
            'direccion'=>'La dirrección debe tener al menos 5 caracteres',
            'celular.unique' => 'El número de Celular ya ha sido tomado',
            'celular.max' => 'El número de Celular no puede tener mas de 12 digitos',
            'celular.min' => 'El número de Celular debe tener al menos 5 digitos',
            'fecha_ing.required' => 'Olvidaste la fecha de ingreso',
            'unidad_id.required'=>'Olvidaste asignar el cargo a la que Pertenece',
            'unidad_id.required' => 'Olvidaste asignar la Unidad a la que Pertenece',
            'foto_up.image' => 'La Foto debe de estar en un formato .jpg .png .jpeg',
            'foto_up.max' => 'El tamaño máximo de la Foto es de 3 MB',
            'genero.required' => 'Olvidaste el Genero',
            'documento_up.max' => 'El tamaño máximo del Curriculum es de 10 MB',
        ];
    }
}
