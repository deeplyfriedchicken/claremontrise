<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('posts', function (Blueprint $table) {
        $table->increments('post_id');
        $table->integer('article_id');
        $table->string('title');
        $table->string('author')->default('N/A');
        $table->string('description')->default('N/A');
        $table->string('imgUrl')->default('N/A');
        $table->string('url')->default('N/A');
        $table->string('source');
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
      Schema::drop('posts');
    }
}
