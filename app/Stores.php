<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
  protected $table = 'stores';

  protected $primaryKey = 'store_id';

  protected $fillable = ['name', 'sh_name', 'campus', 'updated_at', 'created_at'];
}
