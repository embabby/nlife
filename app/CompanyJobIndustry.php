<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyJobIndustry extends Model
{
    protected $fillable=[
        'company_id',
        'job_industry_id'
    ];

    function job_industry(){
        return $this->belongsTo('App\JobIndustry','job_industry_id');
    }
}
