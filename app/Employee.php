<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
 protected $fillable = [
        'name', 'email', 'password','phone','address','photo','position_id'
    ];

    public function Postion($value='')
    {
        return $this->belongsTo('App\Postion','position_id');
    }
}
