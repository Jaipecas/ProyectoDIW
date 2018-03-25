<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            // idioma en el que se esta jugandp
            $table->string('language', 2);
            // estado de la partida: sin empezar, turno j1, turno j2, acabada
            $table->enum('state',['unstarted','turn_p1','turn_p2','win_p1','win_p2'])->default('unstarted');
            // jugador 1
            $table->unsignedInteger('player_1');
            // puntos jugador 1
            $table->smallInteger('player_1_score');
            // letras jugador 1
            $table->string('player_1_letters', 7);
            // jugador 2
            $table->unsignedInteger('player_2');
            // puntos jugador 2
            $table->smallInteger('player_2_score');
            // letras jugador 2
            $table->string('player_2_letters', 7);
            // estado tablero 15x15 caracteres
            $table->string('tableboard',225);
            // letras restantes
            $table->string('remaining_letters', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
