<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $fillable = [
        'candidate_id',
        'job_id',
        'company_id'
    ];
}
