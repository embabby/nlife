<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobQuestion extends Model
{
    protected $fillable=[
        'question',
        'job_id',
        'company_id'
    ];
}
