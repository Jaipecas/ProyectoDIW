<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            
            // código del idioma soportado
            $table->string('language_code', 2)->nullable(false);
            $table->string('most_valuable_word', 16)->default("");
            $table->integer('most_valuable_word_points')->default(0);

            // Claves externa
            $table->foreign('language_code')->references('language')->on('supported_languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistics');
    }
}
