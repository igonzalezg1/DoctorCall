<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultorios', function (Blueprint $table) {
            $table->id();
			$table->string('nombre',80)->nullable();
			$table->string('direccion',200)->nullable();
			$table->string('cp',6)->nullable();
			$table->string('telefono',10)->nullable();
			$table->unsignedBigInteger('id_pais');
			$table->unsignedBigInteger('id_entidad');
			$table->unsignedBigInteger('id_municipio');
			$table->integer('status')->nullable();
			$table->timestamps();
			$table->foreign('id_pais')->references('id')->on('paises');
			$table->foreign('id_entidad')->references('id')->on('entidades');
			$table->foreign('id_municipio')->references('id')->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultorios');
    }
}
