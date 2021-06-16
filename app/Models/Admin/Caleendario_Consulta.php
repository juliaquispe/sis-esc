<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Caleendario_Consulta extends Model
{
    protected $table = "calendario_consulta";
    protected $fillable=['fecha','title', 'color', 'textColor', 'start', 'end', 'intervalo', 'num_consultas', 'horario'];
}
