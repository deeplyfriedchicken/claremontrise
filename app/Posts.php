<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
  protected $table = 'posts';

  protected $primaryKey = 'post_id';

  protected $fillable = ['article_id', 'author', 'title', 'description', 'imgUrl', 'url', 'source', 'updated_at', 'created_at'];
}
