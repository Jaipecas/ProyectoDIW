<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            // usuario destinatario de la notificación
            $table->unsignedInteger('recipient');
            // estado de la notificación: no leida, leida, borrada
            $table->enum('state',['unread','read','delete'])->default('unread');
            // tipo de la notificación: información, aviso, importante
            $table->enum('type',['info','warning','important'])->default('info');
            // texto de la notificación
            $table->string('notification')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
