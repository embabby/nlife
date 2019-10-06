<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BenefitCategory extends Model
{
    protected $fillable=[
        'name',
    ];

    function benefits(){
        return $this->hasMany('App\Benefit','benefit_category_id');
    }
}
