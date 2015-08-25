<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sports', function (Blueprint $table) {
        $table->increments('sports_id');
        $table->integer('article_id');
        $table->string('college');
        $table->string('team');
        $table->string('opponent');
        $table->string('location');
        $table->boolean('livestream');
        $table->integer('start_notify')->default(1);
        $table->dateTime('time_start');
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
      Schema::drop('sports');
    }
}
