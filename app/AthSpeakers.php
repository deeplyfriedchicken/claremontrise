<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AthSpeakers extends Model
{
  protected $table = 'ath';

  protected $primaryKey = 'ath_id';

  protected $fillable = [ 'article_id', 'speaker', 'description', 'event_time', 'start_notify', 'updated_at', 'created_at'];

}
