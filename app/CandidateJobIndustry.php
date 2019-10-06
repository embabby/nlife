<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateJobIndustry extends Model
{
    protected $fillable=[
        'candidate_id',
        'job_industry_id'
    ];

    public function candidate_industry(){
        return $this->belongsTo('App\JobIndustry','job_industry_id');
    }
}
