<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChallengesTable extends Migration
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
            $table->string('language', 2);
            // nivel contra el que se quiere jugar: número (=), (-) <=, (*10) >=
            $table->tinyInteger('level');
            // usuario contra el que se queire jugar
            $table->unsignedInteger('opposing_player');
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
