<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobIndustry extends Model
{
    protected $fillable=[
        'name',
        'font_icon'
    ];

    public function job_industry_tags(){
        return $this->hasMany('App\JobIndustryTag');
    }
    public function jobs(){
        return $this->belongsToMany('App\Job','job_job_industries','job_industry_id','job_id');
    }

}
