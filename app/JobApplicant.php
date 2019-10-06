<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class JobApplicant extends Model
{
    protected $fillable=[
        'company_id',
        'job_id',
        'candidate_id',
        'opened_contact',
        'downloaded_cv',
        'job_application_status_id',
        'employer_id'
    ];

    public function candidate(){
        return $this->belongsTo('App\Candidate','candidate_id');
    }
    public function job(){
        return $this->belongsTo(Job::class,'job_id');
    }


//     public function getCreatedAtAttribute($value)
// {
//     return Carbon::createFromFormat('Y-m-d H', $value)->format('m');
// }

    public function getCreatedAtAttribute($value)
    {
         // return $value->toDateString();
        return Carbon::parse($value)->toDateString();
    }


    public function getUpdatedAtAttribute($value)
    {
         // return $value->toDateString();
        return Carbon::parse($value)->toDateString();
    }
}
