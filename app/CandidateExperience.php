<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateExperience extends Model
{
    protected $fillable=[
        'candidate_id',
        'company_name',
        'company_location',
        'job_title',
        'job_description',
        'current',
        'salary',
        'start_date',
        'end_date'
    ];
}
