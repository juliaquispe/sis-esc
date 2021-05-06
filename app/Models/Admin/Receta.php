<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $table = "receta";
    protected $fillable=['consulta_id','receta', 'indicacion'];
}
