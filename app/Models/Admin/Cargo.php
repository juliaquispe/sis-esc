<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = "cargo";
    protected $fillable=['nombre','descripcion'];
}
