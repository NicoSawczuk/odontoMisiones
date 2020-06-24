<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nombres');
            $table->string('apellidos');
            $table->string('sexo');
            $table->date('fecha_nacimiento');
            $table->string('dni');
            $table->string('cuil');
            $table->string('numero_cliente')->nullable();
            $table->string('telefono');
            $table->string('email');
            $table->boolean('disponibilidad_crediticia');
            $table->boolean('estado_crediticio');
            $table->text('notas_particulares')->nullable();

            $table->unsignedBigInteger('direccion_id');
            $table->foreign('direccion_id')->references('id')->on('direcciones');


            $table->softDeletes();
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
        Schema::dropIfExists('clientes');
    }
}
