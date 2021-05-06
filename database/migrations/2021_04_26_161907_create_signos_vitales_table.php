<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignosVitalesTable extends Migration
{

    public function up()
    {
        Schema::create('signos_vitales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('consulta')->onDelete('restrict');
            $table->bigInteger('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('paciente')->onDelete('restrict');
            $table->Integer('altura')->nullable();
            $table->Integer('peso')->nullable();
            $table->Integer('temperatura')->nullable();
            $table->string('p_a',7)->nullable();
            $table->Integer('f_c')->nullable();
            $table->Integer('f_r')->nullable();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('signos_vitales');
    }
}
