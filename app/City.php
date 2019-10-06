<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable=[
        'country_id',
        'name'
    ];

    public function jobs(){
        return $this->hasMany('App\Job','city_id');
    }
}
