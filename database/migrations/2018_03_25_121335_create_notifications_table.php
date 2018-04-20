<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
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

            // Claves externas
            // En caso de que se borre el usuario al que va destinada se elimina la notificación
            $table->foreign('recipient')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign('notifications_recipient_foreign');
        });

        Schema::dropIfExists('notifications');
    }
}
