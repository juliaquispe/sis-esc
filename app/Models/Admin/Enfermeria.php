<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Enfermeria extends Model
{
    protected $table = "enfermeria";
    protected $fillable=['fecha','nombre','apellido', 'fecha_nac', 'previo', 'detalles_c', 'tipo_i', 'medicamento_i', 'detalles_i', 'tipo_s', 'detalles_s', 'atencion_c', 'atencion_i', 'atencion_s'];
}
