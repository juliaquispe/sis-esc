<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalTable extends Migration
{
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->string('ci',12)->unique();
            $table->string('direccion',60)->nullable();
            $table->string('celular',12)->nullable()->unique();
            $table->date('fecha_ing');
            $table->bigInteger('unidad_id')->unsigned();
            $table->foreign('unidad_id')->references('id')->on('unidad')->onDelete('restrict');
            $table->string('foto',30)->nullable();
            $table->string('genero',6);
            $table->string('curriculum',30)->nullable();
            $table->bigInteger('estado')->nullable()->default(1);
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personal');
    }
}
