<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  protected $table = 'email_articles';

  protected $primaryKey = 'article_id';

  protected $fillable = [ 'post_date', 'file_directory', 'updated_at', 'created_at'];
}
