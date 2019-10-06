<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    protected $fillable=[
        'name',
        'benefit_category_id'
    ];
}
