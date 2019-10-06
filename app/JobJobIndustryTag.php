<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobJobIndustryTag extends Model
{
    protected $fillable=[
        'job_id',
        'job_industry_tag_id',
    ];
}
