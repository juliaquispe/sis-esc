<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaTable extends Migration
{
    public function up()
    {
        Schema::create('ficha', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('paciente')->onDelete('restrict');
            $table->bigInteger('unidad_id')->unsigned();
            $table->foreign('unidad_id')->references('id')->on('unidad')->onDelete('restrict');
            $table->string('color',20);
            $table->string('textColor',20);
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('estado',10);
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ficha');
    }
}
