<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Enfermeria extends Model
{
    protected $table = "enfermeria";
    protected $fillable=['fecha', 'paciente_id', 'previo', 'detalles_c', 'tipo_i', 'medicamento_i', 'detalles_i', 'tipo_s', 'detalles_s', 'atencion_c', 'atencion_i', 'atencion_s'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class); //un paciente tiene muchas fichas
    }
}
