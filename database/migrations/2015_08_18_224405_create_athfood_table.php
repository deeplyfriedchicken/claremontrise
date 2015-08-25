<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthfoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('athfood', function (Blueprint $table) {
        $table->increments('athfood_id');
        $table->integer('article_id');
        $table->integer('ath_id');
        $table->string('food_1')->default('N/A');
        $table->string('food_2')->default('N/A');
        $table->string('food_3')->default('N/A');
        $table->string('food_4')->default('N/A');
        $table->string('food_5')->default('N/A');
        $table->integer('start_notify');
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
      Schema::drop('athfood');
    }
}
