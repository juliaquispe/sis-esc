<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnfermeriaConsultaTable extends Migration
{

    public function up()
    {
        Schema::create('enfermeria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->date('fecha_nac');
            $table->string('previo',50)->nullable();
            $table->text('detalles_c')->nullable();
            $table->string('tipo_i',20)->nullable();
            $table->text('medicamento_i')->nullable();
            $table->text('detalles_i')->nullable();
            $table->string('tipo_s',32)->nullable();
            $table->text('detalles_s')->nullable();
            $table->integer('atencion_c')->nullable();;
            $table->integer('atencion_i')->nullable();;
            $table->integer('atencion_s')->nullable();;
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enfermeria');
    }
}
