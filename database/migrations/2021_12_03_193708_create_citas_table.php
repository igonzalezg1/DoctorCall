<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
			$table->string('tipo_cita',200)->nullable(); //presencial o en linea
			$table->unsignedBigInteger('id_cliente')->nullable();
			$table->unsignedBigInteger('id_doctor')->nullable();
			$table->unsignedBigInteger('id_forma_pago')->nullable();
			$table->integer('status')->nullable(); //1 activo (proxima a ser). 0 Finalizado. 2 Cancelado.
			$table->timestamps();
			$table->foreign('id_doctor')->references('id')->on('users');
			$table->foreign('id_cliente')->references('id')->on('users');
			$table->foreign('id_forma_pago')->references('id')->on('formas_pagos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
