<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hours extends Model
{
  protected $table = 'food_hours';

  protected $primaryKey = 'hours_id';

  protected $fillable = ['store_id', 'day_of_week', 'morning_hours', 'afternoon_hours', 'night_hours', 'updated_at', 'created_at'];
}
