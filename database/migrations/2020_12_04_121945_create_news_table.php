<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            // cabecera de la noticia
            $table->string('header', 120);
            // resumen
            $table->string('abstract', 1200);
            // URL de enlace
            $table->string('url', 250);
            // tipo de noticia: información general (info), avisos alumnos (notice)
            $table->enum('type',['info','notice'])->default('info');
            // fecha de expiración
            $table->date('expires_at');
            // fecha de publicación
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
        Schema::dropIfExists('news');
    }
}
