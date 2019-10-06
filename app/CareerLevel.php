<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareerLevel extends Model
{
    protected $fillable=[
        'name',
        'font_icon'
    ];

    public function jobs(){
        return $this->hasMany('App\Job','career_level_id');
    }
}
