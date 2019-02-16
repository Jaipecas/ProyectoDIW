<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatisticsLevels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('levels', function(Blueprint $table) {
            $table->string('longest_word', 16)->default("");
            $table->string('most_valuable_word', 16)->default("");
            $table->integer('most_valuable_word_points')->default(0);
            $table->unsignedInteger('most_valuable_word_game')->nullable()->default(null);
            $table->unsignedInteger('shortest_game')->nullable()->default(null);
            $table->unsignedInteger('longest_game')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('levels', function($table) {
            $table->dropColumn('longest_word');
            $table->dropColumn('most_valuable_word');
            $table->dropColumn('most_valuable_word_points');
            $table->dropColumn('most_valuable_word_game');
            $table->dropColumn('shortest_game');
            $table->dropColumn('longest_game');
        });
    }
}
