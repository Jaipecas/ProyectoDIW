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
            $table->string('language', 2)->nullable(false);
            // nivel contra el que se quiere jugar: número (=), (-) <=, (*10) >=
            // 0 aleatorio
            $table->tinyInteger('level')->default(0);
            // usuario contra el que se quiere jugar
            $table->unsignedInteger('opposing_player')->nullable()->default(null);

            // Claves externas
            // En caso de que se borre el usuario (el que solicita o contra el que se quiere jugar) se eliminan sus retos
            $table->foreign('requesting_player')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('opposing_player')->references('id')->on('users')->onDelete('cascade');
            // El caso de que se borre un lenguaje es muy raro. Prefiero controlar que todo reto tenga asignado uno (nullable(false))
            // y dejar que en caso de que se repita el lenguaje permanezca
            $table->foreign('language')->references('language')->on('supported_languages'); //->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('challenges', function (Blueprint $table) {
            $table->dropForeign('challenges_requesting_player_foreign');
            $table->dropForeign('challenges_opposing_player_foreign');
            $table->dropForeign('challenges_language_foreign'); 
        });
        
        Schema::dropIfExists('challenges');
    }
}
