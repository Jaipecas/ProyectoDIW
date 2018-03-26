<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            // usuario que solicita el reto
            $table->unsignedInteger('requesting_player');
            // idioma en el que se solicita el reto
            $table->string('language', 2)->nullable();
            // nivel contra el que se quiere jugar: número (=), (-) <=, (*10) >=
            $table->tinyInteger('level');
            // usuario contra el que se quiere jugar
            $table->unsignedInteger('opposing_player');

            // Claves externas
            // En caso de que se borre el usuario (el que solicita o contra el que se quiere jugar) se eliminan sus retos
            $table->foreign('requesting_player')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('opposing_player')->references('id')->on('users')->onDelete('cascade');
            // En caso de que se borre el lenguaje (muuy raro) el lenguaje del reto se pone a null
            $table->foreign('language')->references('language')->on('supported_languages')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challenges');
    }
}
