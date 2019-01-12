<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
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
            // idioma en el que se esta jugando
            $table->string('language', 2);
            // estado de la partida: sin empezar, turno j1, turno j2, acabada
            $table->enum('state',['unstarted','turn_p1','turn_p2','win_p1','win_p2'])->default('unstarted');
            // jugador 1
            $table->unsignedInteger('player_1')->nullable();
            // puntos jugador 1
            $table->smallInteger('player_1_score')->default(0);
            // letras jugador 1. Formato LPPLPP... L letra y PP puntuacion
            $table->string('player_1_letters', 21)->default("");
            // jugador 2
            $table->unsignedInteger('player_2')->nullable();
            // puntos jugador 2
            $table->smallInteger('player_2_score')->default(0);
            // letras jugador 2. Formato LPPLPP... L letra y PP puntuacion
            $table->string('player_2_letters', 21)->default("");
            // estado tablero 15x15 caracteres
            $table->string('tableboard',225)->default("");
            // letras restantes
            $table->string('remaining_letters', 122)->default("");
            // tiradas. Formato: PLLLWWWWWWWWWW|PLLLWWWWWWWWW|... P : jugador 1 o 2, L posicion: 06D, J11. 
            // Si el número va delante será vertical y si va la letra será horizontal, W palabra
            // se separan por |
            $table->text('throw')->nullable();

            // Claves externas
            // En caso de que se borre el jugador se pone a null su id
            $table->foreign('player_1')->references('id')->on('users')->onDelete('set null');
            $table->foreign('player_2')->references('id')->on('users')->onDelete('set null');
            
            $table->foreign('language')->references('language')->on('supported_languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropForeign('games_player_1_foreign');
            $table->dropForeign('games_player_2_foreign');
            $table->dropForeign('games_language_foreign'); 
        });

        Schema::dropIfExists('games');
    }
}
