<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ath', function (Blueprint $table) {
        $table->increments('ath_id');
        $table->integer('article_id');
        $table->string('speaker');
        $table->string('title');
        $table->string('speaker_img');
        $table->string('description');
        $table->string('event_time');
        $table->integer('start_notify')->default(1);
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
      Schema::drop('ath');
    }
}
