<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventAndNews extends Model
{
  protected $table = 'events';

  protected $primaryKey = 'event_id';

  protected $fillable = ['article_id', 'location', 'time1', 'time2', 'title', 'imgUrl', 'url', 'type', 'updated_at', 'created_at'];

}
