<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarioConsultaTable extends Migration
{
    public function up()
    {
        Schema::create('calendario_consulta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('fecha');
            $table->string('title',10);
            $table->string('color',20);
            $table->string('textColor',20);
            $table->DateTime('start');
            $table->DateTime('end');
            $table->Integer('intervalo');
            $table->Integer('num_consultas');
            $table->text('horario');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calendario_consulta');
    }
}
