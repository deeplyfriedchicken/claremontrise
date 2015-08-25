<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('weather', function (Blueprint $table) {
        $table->increments('weather_id');
        $table->integer('article_id');
        $table->string('icon');
        $table->integer('current_temp');
        $table->integer('max');
        $table->integer('min');
        $table->dateTime('sunriseTime');
        $table->dateTime('sunsetTime');
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
      Schema::drop('weather');
    }
}
