<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateJobType extends Model
{
    protected $fillable=[
        'candidate_id',
        'job_type_id'
    ];
}
