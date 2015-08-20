<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('events', function (Blueprint $table) {
        $table->increments('event_id');
        $table->integer('article_id')
        $table->string('location');
        $table->string('title');
        $table->string('imgUrl');
        $table->string('url');
        $table->string('type');
        $table->integer('start_notify');
        $table->dateTime('time1');
        $table->dateTime('time2');
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
      Schema::drop('events');
  }
}
