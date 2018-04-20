<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// al ser una table pivot o tabla de apoyo para la relación muchos a muchos, lo normal
// hubiera sdo nombrarla con la nomenclatura laravel: language_user, pero como esta enfocada a
// el control de lo niveles del usuario en un idioma, se le cambia el nombre. Eso implica tener que definir el 
// nombre en cada llamada a belongsToMany()

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            
            // usuario
            $table->unsignedInteger('user_id')->nullable(false);;
             // código del idioma soportado
            $table->string('language_code', 2)->nullable(false);
            // level
            $table->tinyInteger('level')->default(0);
            // Partidas ganadas
            $table->integer('won')->default(0);
            // Partidas perdidas
            $table->integer('lost')->default(0);

            // Claves externa
            $table->foreign('language_code')->references('language')->on('supported_languages')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('levels', function (Blueprint $table) {
            $table->dropForeign('levels_language_code_foreign');
            $table->dropForeign('levels_user_id_foreign');
        });

        Schema::dropIfExists('levels');
    }
}
