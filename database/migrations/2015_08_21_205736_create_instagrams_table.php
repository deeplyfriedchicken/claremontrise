<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstagramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('instagrams', function (Blueprint $table) {
        $table->increments('insta_id');
        $table->integer('article_id');
        $table->string('imgUrl');
        $table->string('caption');
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
      Schema::drop('instagrams');
    }
}
