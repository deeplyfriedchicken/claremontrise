<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AthFood extends Model
{
  protected $table = 'athfood';

  protected $primaryKey = 'athfood_id';

  protected $fillable = [ 'article_id', 'speaker_id', 'food_1', 'food_2', 'food_3', 'food_4', 'food_5', 'start_notify', 'updated_at', 'created_at'];
}
