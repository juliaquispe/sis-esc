<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class Clinica extends Model
{
    protected $table = "clinica";
    protected $fillable=['nombre','direccion','telefono','contacto_1','contacto_2','propietario','mision','vision','descripcion','color','foto','logo'];

    public static function setFoto($foto, $actual = false) //foto (al crear), actual (al editar)
    {
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("Datos/Clinica/$actual"); // si es actual borra la anterior
            }
            $imageName = Str::random(5) . '.jpg';  //STR para llamar a rando q crea un nombre aleatorio de 15 caracteres con la extension .jpg
            $imagen = Image::make($foto)->encode('jpg', 100); //codifica a jpg con un 75% de la imagen real
            $imagen->resize(700, 500, function ($constraint) { //redimensiona la imagen
                $constraint->upsize();
            });
            Storage::disk('public')->put("Datos/Clinica/$imageName", $imagen->stream()); //guarda la imagen
            return $imageName; //retorna el nombre de la imagen
        } else {
            return false;
        }

    }
    public static function setLogo($logo, $actual = false) //foto (al crear), actual (al editar)
    {
        if ($logo) {
            if ($actual) {
                Storage::disk('public')->delete("Datos/Clinica/$actual"); // si es actual borra la anterior
            }
            $imageName = Str::random(5) . '.jpg';  //STR para llamar a rando q crea un nombre aleatorio de 15 caracteres con la extension .jpg
            $imagen = Image::make($logo)->encode('jpg', 80); //codifica a jpg con un 75% de la imagen real
            $imagen->resize(500, 500, function ($constraint) { //redimensiona la imagen
                $constraint->upsize();
            });
            Storage::disk('public')->put("Datos/Clinica/$imageName", $imagen->stream()); //guarda la imagen
            return $imageName; //retorna el nombre de la imagen
        } else {
            return false;
        }

    }
}
