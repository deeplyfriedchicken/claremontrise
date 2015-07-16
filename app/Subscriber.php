<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
  protected $table = 'subscribers';

  protected $primaryKey = 'subscriber_id';

  protected $fillable = ['email', 'college', 'updated_at', 'created_at'];

}
