<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCedulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cedulas', function (Blueprint $table) {
            $table->id();
			$table->string('nombre',200)->nullable();
			$table->integer('no_cedula')->nullable();
			$table->string('grado',200)->nullable();
			$table->string('ruta',200)->nullable();
			$table->unsignedBigInteger('id_doctor');
			$table->integer('status')->nullable();
			$table->timestamps();
			$table->foreign('id_doctor')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cedulas');
    }
}
