<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    
  protected $guarded = [];

    public function Postion($value='')
    {
      return $this->hasMany('App\Postion','dep_id');
    }

}
