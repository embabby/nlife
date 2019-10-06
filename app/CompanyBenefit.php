<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyBenefit extends Model
{
    protected $fillable=[
        'company_id',
        'benefit_id',
        'benefit_category_id'
    ];
}
