<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicaTable extends Migration
{
    public function up()
    {
        Schema::create('clinica', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',100)->unique();
            $table->string('direccion', 60);
            $table->string('telefono',10)->nullable()->unique();
            $table->string('contacto_1',10)->unique();
            $table->string('contacto_2',10)->nullable()->unique();
            $table->string('propietario',100)->nullable();
            $table->text('mision')->nullable();
            $table->text('vision')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('color',10);
            $table->string('foto',10)->nullable();
            $table->string('logo',10)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clinica');
    }
}
