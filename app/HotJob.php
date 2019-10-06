<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotJob extends Model
{
    protected $fillable=[
        'job_id',
        'image',
        'description'
    ];

    public function job (){
        return $this->belongsTo(Job::class,'job_id');
    }
}
