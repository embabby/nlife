<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobAnswer extends Model
{
    protected $fillable=[
        'job_id',
        'candidate_id',
        'answer',
        'question_id'
    ];
}
