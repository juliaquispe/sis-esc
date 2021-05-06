<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultaTable extends Migration
{
    public function up()
    {
        Schema::create('consulta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ficha_id')->unsigned();
            $table->foreign('ficha_id')->references('id')->on('ficha')->onDelete('restrict');
            $table->text('motivo');
            $table->text('sintoma')->nullable();
            $table->text('diagnostico');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consulta');
    }
}
