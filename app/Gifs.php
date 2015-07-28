<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gifs extends Model
{
  protected $table = 'gifs';

  protected $primaryKey = 'gif_id';

  protected $fillable = ['article_id', 'imgUrl', 'updated_at', 'created_at'];
}
