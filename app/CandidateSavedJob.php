<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateSavedJob extends Model
{
    protected $fillable=[
        'candidate_id',
        'job_id'
    ];
    public function job(){
        return $this->belongsTo(Job::class,'job_id');
    }
}
