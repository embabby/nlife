<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateLanguage extends Model
{
    protected $fillable=[
        'candidate_id',
        'language_id'
    ];

    function CandidateLanguage(){
        return $this->belongsTo('\App\Candidate','candidate_id');
    }
}
