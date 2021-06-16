<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternacionConsultaTable extends Migration
{
    public function up()
    {
        Schema::create('internacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('paciente')->onDelete('restrict');
            $table->bigInteger('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('consulta')->onDelete('restrict');
            $table->integer('cama');
            $table->date('fecha_ingreso');
            $table->string('contacto_emergencia',12)->nullable();
            $table->text('motivo_i');
            $table->text('e_fisico')->nullable();
            $table->text('craneo_cara')->nullable();
            $table->text('cuello_tiroides')->nullable();
            $table->text('torax')->nullable();
            $table->text('genitales')->nullable();
            $table->text('columna')->nullable();
            $table->text('e_neurologico')->nullable();
            $table->text('impresion_d')->nullable();
            $table->text('conducta')->nullable();
            $table->date('fecha_salida')->nullable();
            $table->text('diagnostico_salida')->nullable();
            $table->text('tratamiento_realizado')->nullable();
            $table->string('nombre_resp',80)->nullable();
            $table->string('ci_resp',12)->nullable();
            $table->string('testigo',80)->nullable();
            $table->text('foto_evolucion')->nullable();
            $table->enum('estado', ['0' , '1'])->default('0');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('internacion');
    }
}
