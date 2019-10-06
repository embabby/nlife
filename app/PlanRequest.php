<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanRequest extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'plan_id',
        'employer_id',
        'company_id'
    ];
}
