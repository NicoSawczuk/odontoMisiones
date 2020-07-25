<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_comienzo_incidencia');
            $table->date('fecha_fin_incidencia');
            $table->double('presupuesto');
            $table->text('diagnostico_general');
            $table->double('precio_trabajo');
            //relacion con el cliente que inicia el incidente
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            //relacion con el tecnico encargado del incidente
            $table->unsignedBigInteger('tecnico_id');
            $table->foreign('tecnico_id')->references('id')->on('tecnicos');
            //relacion con el tipo de incidencia
            $table->unsignedBigInteger('tipo_incidencia_id');
            $table->foreign('tipo_incidencia_id')->references('id')->on('tipos_incidencias');
            //relacion con el estado en el que se encuetra la incidencia
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
}
