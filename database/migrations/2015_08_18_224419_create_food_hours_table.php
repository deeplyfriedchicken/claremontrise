<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('store_hours', function (Blueprint $table) {
        $table->increments('hours_id');
        $table->integer('store_id');
        $table->integer('day_of_week');
        $table->string('morning_hours')->default('empty');
        $table->string('afternoon_hours')->default('empty');
        $table->string('night_hours')->default('empty');
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
      Schema::drop('store_hours');
    }
}
