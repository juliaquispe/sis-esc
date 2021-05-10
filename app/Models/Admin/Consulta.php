<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = "consulta";
    protected $fillable=['ficha_id','motivo', 'sintoma', 'diagnostico', 'doctor'];

}
