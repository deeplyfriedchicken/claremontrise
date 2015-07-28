<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snack extends Model
{
  protected $table = 'snack';

  protected $primaryKey = 'snack_id';

  protected $fillable = ['article_id', 'foodname', 'updated_at', 'created_at'];
}
