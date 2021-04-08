<?php

namespace App\Models\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class Usuario extends Authenticatable
{
    protected $remember_token =false;
    Protected $table = "usuarios";
    protected $fillable = ['rol_id','usuario','nombre','apellido', 'email', 'password', 'foto', 'estado'];
    public function rol ()
    {
        return $this->belongsTo(Rol::class); //se relaciona con el modelo Rol mediate la tabla usuario_rol
    }
    public function setPasswordAttribute($pass)//funcion de laravel para encriptar el password
    {
        $this->attributes['password']= Hash::make($pass);
    }

    public static function setFoto($foto, $actual = false) //fotoo(al crear) y actual (al editar)
    {
        if($foto) {
            if($actual){
                Storage::disk('public')->delete("Datos/Usuario/Fotos/$actual"); //si es la actual borra la fto anterior
            }
            $Nombre =Str::random(10). '.jpg'; //Str es para lla,mar a random que crea un nombre aleatorio de 10 carracteres
            $Imagen = image::make($foto)->encode('jpg', 75); //codifica con la extension jpgcon un75% de la imagen real
            $Imagen->resize(500, 550, function ($constraint){ //redirecciona el tamaño de la foto
                $constraint->upsize();
            });
            Storage::disk('public')->put("Datos/Usuario/Fotos/$Nombre", $Imagen-> stream()); // guarda la imagen en esta ruta
            return $Nombre; // retorna el nombre de la imagen
        } else{
            return false;
        }
    }
    public function setSession($rol)
    {
            Session::put(
            [
                'usuario'=> $this->usuario,
                'usuario_id' =>$this->id,
                'nombre_usuario'=>$this->nombre,
                'apellido_usuario'=>$this->apellido,
                'email_usuario'=>$this->email,
                'foto_usuario'=>$this->foto,
                'rol_usuario'=>$this->rol->rol,
                'rol_id'=>$this->rol->id,
            ]
            );
    }
}

