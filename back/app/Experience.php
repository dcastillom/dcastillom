<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
  protected $fillable = [
      'position', 'company', 'start', 'end', 'description', 'links',
  ];
}
