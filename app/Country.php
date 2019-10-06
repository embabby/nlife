<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable=[
        'name'
    ];

    function cities(){
        return $this->hasMany('App\City','country_id');
    }

    public function jobs(){
        return $this->hasMany('App\Job','country_id');
    }
}
