<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $fillable=[
        'name'
    ];
    public function jobs(){
        return $this->belongsToMany('App\Job','job_job_types','job_type_id','job_id');
    }
}
