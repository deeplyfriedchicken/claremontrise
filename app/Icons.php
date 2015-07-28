<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icons extends Model
{
  protected $table = 'icons';

  protected $primaryKey = 'icon_id';

  protected $fillable = ['name', 'imgUrl', 'updated_at', 'created_at'];
}
