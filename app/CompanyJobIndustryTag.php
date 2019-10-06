<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyJobIndustryTag extends Model
{
    protected $fillable=[
        'company_id',
        'job_industry_tag_id'
    ];
}
