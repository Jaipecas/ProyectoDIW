<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            // tipo de usuario: jugador o administrador
            $table->enum('type',['player','admin'])->default('player');
            // estado del usuario: desactivado, offline, online
            $table->enum('state',['disable','offline','online'])->default('offline');
            // Partidas ganadas
            $table->integer('won')->default(0);
            // Partidas perdidas
            $table->integer('lost')->default(0);
            // pais del jugador
            $table->string('country', 2)->default('ES');
            // lenguaje preferido para jugar
            $table->string('favourite_language', 2)->default('ES')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
