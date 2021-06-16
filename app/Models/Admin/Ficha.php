<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $table = "ficha";
    protected $fillable=['paciente_id','servicio_id','fecha','hora','estado', 'turno'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class); //un paciente tiene muchas fichas
    }
    public function servicio()
    {
        return $this->belongsTo(Servicio::class); //un servicio tiene muchas fichas
    }
}
