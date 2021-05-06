<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Signos_Vitales extends Model
{
    protected $table = "signos_vitales";
    protected $fillable=['consulta_id', 'paciente_id','altura', 'peso', 'temperatura', 'p_a', 'f_c', 'f_r' ];
}
