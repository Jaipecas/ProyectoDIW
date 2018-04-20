<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLanguageForeignKeyUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Clave externa
            // En caso de que se borre el lenguaje (muy raro) el lenguaje preferido se pone a null
            $table->foreign('favourite_language')->references('language')->on('supported_languages')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Se elimina la clave externa
            // el nombre de la relacion es tabla_columna_foreign
            $table->dropForeign('users_favourite_language_foreign');
        });
    }
}
