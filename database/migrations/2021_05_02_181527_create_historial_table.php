<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialTable extends Migration
{
    public function up()
    {
        Schema::create('historial', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('paciente')->onDelete('restrict');
            $table->bigInteger('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('consulta')->onDelete('restrict');
            $table->string('t_sangre',15)->nullable();
            $table->string('vivienda',15)->nullable();
            $table->string('agua',2)->nullable();
            $table->string('luz',2)->nullable();
            $table->string('alcantarillado',2)->nullable();
            $table->string('p_h_a',2)->nullable();
            $table->string('p_varices',2)->nullable();
            $table->string('p_diabetes',2)->nullable();
            $table->string('p_renal',2)->nullable();
            $table->string('p_pulmonar',2)->nullable();
            $table->string('p_hepatopatia',2)->nullable();
            $table->string('p_mamaria',2)->nullable();
            $table->string('p_genitales',2)->nullable();
            $table->string('p_cardiopatias',2)->nullable();
            $table->string('p_gastrointestinal',2)->nullable();
            $table->string('p_its',2)->nullable();
            $table->string('p_chagas',2)->nullable();
            $table->text('p_detalles')->nullable();
            $table->string('f_h_a',2)->nullable();
            $table->string('f_varices',2)->nullable();
            $table->string('f_diabetes',2)->nullable();
            $table->string('f_renal',2)->nullable();
            $table->string('f_pulmonar',2)->nullable();
            $table->string('f_hepatopatia',2)->nullable();
            $table->string('f_mamaria',2)->nullable();
            $table->string('f_genitales',2)->nullable();
            $table->string('f_cardiopatias',2)->nullable();
            $table->string('f_gastrointestinal',2)->nullable();
            $table->string('f_its',2)->nullable();
            $table->string('f_chagas',2)->nullable();
            $table->text('f_detalles')->nullable();
            $table->string('np_fisica',2)->nullable();
            $table->string('np_alcoholismo',2)->nullable();
            $table->string('np_tabaquismo',2)->nullable();
            $table->string('np_sustancias',2)->nullable();
            $table->text('np_detalles')->nullable();
            $table->string('o_alergias',2)->nullable();
            $table->string('o_cirugias',2)->nullable();
            $table->string('o_traumatismos',2)->nullable();
            $table->string('o_medicamentos',2)->nullable();
            $table->string('o_transfusionales',2)->nullable();
            $table->text('o_detalles')->nullable();
            $table->string('g_embarazos',2)->nullable();
            $table->string('g_gestante',2)->nullable();
            $table->string('g_c_mama',2)->nullable();
            $table->text('g_detalles')->nullable();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial');
    }
}
