<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateJobIndustryTag extends Model
{
    protected $fillable=[
        'candidate_id',
        'tag_id',
    ];
}
