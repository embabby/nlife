<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobTag extends Model
{
    /*
    not using try use jobjobindustrytag
    */
    protected $fillable=[
        'job_industry_tag_id',
        'job_id'
    ];
}
