<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_citas', function (Blueprint $table) {
            $table->id();
			$table->date('fecha')->nullable();
			$table->string('hora')->nullable();
			$table->float('subtotal',10,2)->nullable();
			$table->float('iva',10,2)->nullable();
			$table->float('total',10,2)->nullable();
			$table->string('no_tarjeta',16)->nullable();
			$table->string('vencimiento',5)->nullable();
			$table->string('cvv',3)->nullable();
			$table->unsignedBigInteger('id_cita')->nullable();
			$table->integer('status')->nullable()->nullable();
			$table->timestamps();
			$table->foreign('id_cita')->references('id')->on('citas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles_citas');
    }
}
