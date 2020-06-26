<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('marca');
            $table->string('modelo');
            $table->date('fecha_garantia')->nullable();
            $table->string('numeros_serie');
            $table->string('estado');
            $table->double('precio_sugerido');
            $table->boolean('disponibilidad');
            $table->string('comprobante_asociado');
            $table->text('notas_generales')->nullable();


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
        Schema::dropIfExists('partes');
    }
}
