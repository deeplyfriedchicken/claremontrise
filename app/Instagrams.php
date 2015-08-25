<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instagrams extends Model
{
  protected $table = 'instagrams';

  protected $primaryKey = 'insta_id';

  protected $fillable = ['article_id', 'imgUrl', 'caption', 'updated_at', 'created_at'];
}
