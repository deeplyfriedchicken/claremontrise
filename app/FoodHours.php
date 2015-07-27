<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodHours extends Model
{
  protected $table = 'food_hours';

  protected $primaryKey = 'hours_id';

  protected $fillable = ['name', 'type', 'wk_morning_hours', 'wk_afternoon_hours', 'wk_night_hours', 'wknd_morning_hours', 'wknd_afternoon_hours', 'wknd_night_hours', 'updated_at', 'created_at'];
}
