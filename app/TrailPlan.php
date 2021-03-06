<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrailPlan extends Model
{
    protected $fillable=[
        'name',
        'image',
        'job_posts',
        'cvs',
        'profiles',
        'expiry_days'
    ];
}
