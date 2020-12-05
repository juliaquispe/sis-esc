<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rol', 50)->unique();
            $table->enum('añadir',['1','0'])->default('0');
            $table->enum('editar',['1','0'])->default('0');
            $table->enum('eliminar',['1','0'])->default('0');
            $table->charset='utf8mb4';
            $table->collation='utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
