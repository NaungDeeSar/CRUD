<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postion extends Model
{
    
    protected $fillable = [
        'name','dep_id','price'
    ];

public function Department($value='')
  {
      return $this->belongsTo('App\Department','dep_id');
  }
  public function Employee($value='')
    {
      return $this->hasMany('App\Employee');
    }
 
}
