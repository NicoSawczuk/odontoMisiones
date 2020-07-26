<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciaParteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencia_parte', function (Blueprint $table) {
            $table->unsignedBigInteger('incidencia_id');
            $table->foreign('incidencia_id')->references('id')->on('incidencias');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parte_id');
            $table->foreign('parte_id')->references('id')->on('partes');
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
        Schema::dropIfExists('incidencia_parte');
    }
}
