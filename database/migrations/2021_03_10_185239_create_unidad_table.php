<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadTable extends Migration
{
    public function up()
    {
        Schema::create('unidad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',50)->unique();
            $table->string('sigla',10)->unique();
            $table->string('descripcion',250)->nullable();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('unidad');
    }
}
