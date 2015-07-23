<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sports extends Model
{
  protected $table = 'sports';

  protected $primaryKey = 'sports_id';

  protected $fillable = ['article_id', 'college', 'team', 'opponent', 'livestream', 'time_start', 'start_notify', 'updated_at', 'created_at'];
}
