<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionUsuario extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        if($this ->route('id')){
            return [
                'usuario' =>'required|min:3|max:30|unique:usuarios,usuario,' .$this->route('id'),//PARA PODER EDITAR Y ACTUALIZAR
                'nombre' =>'required|min:3|max:50',
                'apellido' =>'required|min:3|max:50',
                'email' =>'required|email|min:10|max:50|unique:usuarios,email,' .$this->route('id'),
                'password' =>'nullable|min:5|max:100',
                're_password'=>'nullable|required_with:password|same:password',
                'rol_id'=>'required|integer',
                'foto_up'=>'nullable|image|max:3000'
                //required_with::password   el campo re_pass se vuelve required solo si hay pass
            ];
        }
        else{
            return [
                'usuario' =>'required|min:3|max:30|unique:usuarios,usuario', //PARA PODER CREAR
                'nombre' =>'required|min:3|max:50',
                'apellido' =>'required|min:3|max:50',
                'email' =>'required|email|min:10|max:50|unique:usuarios,email',
                'password' =>'required|min:5|max:100',
                're_password'=>'required|same:password',
                'rol_id'=>'required|integer',
                'foto_up'=>'nullable|image|max:3000'
             ];
        }
    }
    public function messages()
    {
        return[
            'usuario.required' => 'El usuario es requerido',
            'usuario.min'=> 'Los caracteres del usuario deben ser mayor a 3',
            'usuario.max' => 'Los caracteres del usuario deben ser menor a 15',
            'usuario.unique' => 'Este usuario ya fue tomado',
            'nombre.required' => 'El nombre del usuario es requerido',
            'nombre.min' => 'Los caracteres de nombre de usuario debe ser mayor a 3 carracteres',
            'nombre.max' => 'Los caracteres de nombre de usuario debe menor a 40 carracteres',
            'nombre.unique' => 'Nombre del usuario ya fue tomado',
            'apellido.required' => 'El apellido del usuario es requerido',
            'apellido.min' => 'Los caracteres de apellido del usuario debe ser mayor a 3 carracteres',
            'apellido.max' => 'Los caracteres de apellido del usuario debe menor a 50 carracteres',
            'email.required' => 'El correo es requerido',
            'email.email'=>'El correo debe ser de tipo email',
            'email.min' => 'Los caracteres del correo debe ser mayor a 10 carracteres',
            'email.max' => 'Los caracteres del correo debe menor a 40 carracteres',
            'email.unique' => 'Este correo ya fue tomado',
            'password.required'=>'La constraseña del usuario es requerido',
            'password.max' => 'La contraseña excede el número de caracteres (100 caracteres)',
            'password.min'=>'La constraseña debe ser mayor a 5 carracteres',
            're_password.same'=>'Las contraseñas deben ser iguales',
            're_password.required_with'=>'Si llena contraseña debe confirmar la contraseña',
            'rol_id.required' => 'Olvidaste asignar un Rol al Usuario',
            'foto_up.image'=>'La foto debe ser tipo imagen',
            'foto_up.max' => 'El tamaño máximo de la Foto es de 3 MB',
        ];
    }
}
