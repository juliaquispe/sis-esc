<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionPaciente extends FormRequest
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
                    'apellido_p'=>'required|min:3|max:20',
                    'apellido_m'=>'nullable|min:3|max:20',
                    'ci'=>'required|min:7|max:12|unique:paciente,ci,'. $this->route('id'),
                    'direccion'=>'nullable|min:4|max:60',
                    'celular'=>'nullable|min:5|max:12',
                    'fecha_nac'=>'required|date|date_format:Y-m-d',
                    'genero'=>'required|max:6',
                    't_sangre'=>'nullable|min:10|max:11',
                    'foto_up'=>'nullable|image|max:3000',
                ];
            }
            else{
                return [
                    //crear
                    'nombre'=>'required|min:2|max:50',
                    'apellido_p'=>'required|min:3|max:20',
                    'apellido_m'=>'nullable|min:3|max:20',
                    'ci'=>'required|min:7|max:12|unique:paciente,ci',
                    'direccion'=>'nullable|min:4|max:60',
                    'celular'=>'nullable|min:5|max:12',
                    'fecha_nac'=>'required|date|date_format:Y-m-d',
                    'genero'=>'required|max:6',
                    't_sangre'=>'nullable|min:10|max:11',
                    'foto_up'=>'nullable|image|max:3000',
                ];
            }
    }
    public function messages()
    {
        return [
            'nombre.required' => 'Olvidaste el nombre del Paciente',
            'nombre.max' => 'El nombre del paciente debe ser menor a 50 caracteres',
            'nombre.min' => 'El nombre del paciente debe ser mayor a 2 caracteres',
            'apellido_p.required' => 'Olvidaste el apellido paterno del paciente',
            'apellido_p.max' => 'El apellido paterno del paciente debe ser menor a 20 caracteres',
            'apellido_p.min' => 'El apellido paterno del paciente debe ser mayor a 3 caracteres',
            'apellido_m.max' => 'El apellido materno del paciente debe ser menor a 20 caracteres',
            'apellido_m.min' => 'El apellido materno del paciente debe ser mayor a 3 caracteres',
            'ci.required' => 'Olvidaste el Número de Carnet del paciente',
            'ci.max' => 'El número de Carnet del paciente no puede tener mas de 12 digitos',
            'ci.min' => 'El número de Carnet del paciente debe tener al menos 7 digitos',
            'ci.unique' => 'El Número de Carnet ya ha sido tomado',
            'direccion'=>'La dirrección no puede tener mas de 60 caracteres',
            'direccion'=>'La dirrección debe tener al menos 4 caracteres',
            'celular.unique' => 'El número de Celular ya ha sido tomado',
            'celular.max' => 'El número de Celular no puede tener mas de 12 digitos',
            'celular.min' => 'El número de Celular debe tener al menos 5 digitos',
            'fecha_nac.required' => 'Olvidaste la fecha de ingreso',
            'genero.required' => 'Olvidaste el Genero',
            't_sangre.min'=>'El tipo de sangre debe ser menor 11 digitos',
            't_sangre.max'=>'El tipo de sangre debe ser mayor 10 digitos',
            'foto_up.image' => 'La Foto debe de estar en un formato .jpg .png .jpeg',
            'foto_up.max' => 'El tamaño máximo de la Foto es de 3 MB',
        ];
    }
}
