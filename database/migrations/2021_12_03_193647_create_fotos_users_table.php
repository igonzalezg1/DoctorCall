<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotosUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_users', function (Blueprint $table) {
            $table->id();
			$table->string('ruta',200)->nullable();
			$table->unsignedBigInteger('id_user');
			$table->integer('status')->nullable();
			$table->timestamps();
			$table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotos_users');
    }
}
