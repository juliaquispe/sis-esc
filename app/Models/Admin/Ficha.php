<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $table = "ficha";
    protected $fillable=['paciente_id','unidad_id','text','textColor','start','end','estado'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class); //un paciente tiene muchas fichas
    }

}
