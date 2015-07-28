<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  protected $table = 'dining_hall_food';

  protected $primaryKey = 'food_id';

  protected $fillable = ['store_id', 'article_id', 'foodName', 'meal', 'created_at', 'updated_at'];
}
