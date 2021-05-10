<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGabineteTable extends Migration
{
    public function up()
    {
        Schema::create('gabinete', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('consulta')->onDelete('restrict');
            $table->text('estudio_g')->nullable();
            $table->text('indicacion_g')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gabinete');
    }
}
