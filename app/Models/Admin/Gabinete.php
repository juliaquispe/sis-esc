<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Gabinete extends Model
{
    protected $table = "gabinete";
    protected $fillable=['consulta_id','estudio_g','indicacion_g'];
}
