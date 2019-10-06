<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'cover_image',
        'image',
        'title',
        'slug',
        'body'
    ];
}
