<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('extras', function (Blueprint $table) {
        $table->increments('extra_id');
        $table->integer('user_id');
        $table->integer('article_id');
        $table->string('description');
        $table->binary('image');
        $table->string('college');
        $table->string('organization');
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
      Schema::drop('extras');
    }
}
