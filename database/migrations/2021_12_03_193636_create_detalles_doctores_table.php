<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesDoctoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_doctores', function (Blueprint $table) {
            $table->id();
			$table->string('descripcion',300)->nullable();
			$table->integer('calificacion')->nullable();
			$table->integer('precio_consulta')->nullable();
			$table->unsignedBigInteger('id_doctor')->nullable();
			$table->unsignedBigInteger('id_consultorio')->nullable();
			$table->unsignedBigInteger('id_especialidad')->nullable();
			$table->integer('status')->nullable();
			$table->timestamps();
			$table->foreign('id_doctor')->references('id')->on('users');
			$table->foreign('id_consultorio')->references('id')->on('consultorios');
			$table->foreign('id_especialidad')->references('id')->on('especialidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles_doctores');
    }
}
