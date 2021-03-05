<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuRolTable extends Migration
{
    public function up()
    {
        Schema::create('menu_rol', function (Blueprint $table) {
            $table->unsignedbigInteger('rol_id');
            $table->foreign('rol_id', 'fk_menurol_rol')->references('id')->on('roles')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedbigInteger('menu_id');
            $table->foreign('menu_id', 'fk_menurol_menu')->references('id')->on('menu')->onDelete('cascade')->onUpdate('restrict');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_rol');
    }
}
