<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
  protected $table = 'weather';

  protected $primaryKey = 'weather_id';

  protected $fillable = ['article_id', 'icon', 'current_temp', 'max', 'min', 'sunsetTime', 'sunriseTime', 'updated_at', 'created_at'];
}
