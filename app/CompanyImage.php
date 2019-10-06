<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyImage extends Model
{
    protected $fillable=[
        'company_id',
        'image',
        'title'
    ];
}
