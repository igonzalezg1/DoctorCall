<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
			$table->string('ap_paterno',80)->nullable();
			$table->string('ap_materno',80)->nullable();
			$table->string('nombres',80)->nullable();
			$table->integer('edad')->nullable();
			$table->string('telefono',10)->nullable();
			$table->date('fecha_nacimiento')->nulleable();
			$table->string('email',100)->nullable();
			$table->string('direccion',200)->nullable();
			$table->string('cp',6)->nullable();
			$table->string('username',80)->nullable();
			$table->string('password',80)->nullable();
			$table->unsignedBigInteger('id_tipo_usuario')->nullable();
			$table->unsignedBigInteger('id_pais')->nullable();
			$table->unsignedBigInteger('id_entidad')->nullable();
			$table->unsignedBigInteger('id_municipio')->nullable();
			$table->integer('status')->nullable();
			$table->timestamps();
			$table->foreign('id_tipo_usuario')->references('id')->on('tipos_users');
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
        Schema::dropIfExists('users');
    }
}
