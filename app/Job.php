<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable=[
        'slug',
        'company_id',
        'job_title',
        'country_id',
        'city_id',
        'address',
        'career_level_id',
        'start_years_of_experience',
        'end_years_of_experience',
        'vacancies',
        'start_salary',
        'end_salary',
        'salary_type_id',
        'currency_id',
        'hide_salary',
        'job_description',
        'job_requirements',
        'hide_company',
        'clicks',
        'receive_emails',
        'email_reference',
    ];

    public function jobApplicants(){
        return $this->hasMany('App\JobApplicant','job_id');
    }
    public function company(){
        return $this->belongsTo('App\Company','company_id');
    }
    public function career_level(){
        return $this->belongsTo('App\CareerLevel','career_level_id');
    }
    public function job_tags(){
        return $this->belongsToMany('App\JobIndustryTag','job_job_industry_tags','job_id','job_industry_tag_id');
    }
    public function city(){
        return $this->belongsTo('App\City');
    }
    public function country(){
        return $this->belongsTo('App\Country');
    }
    public function job_types(){
        return $this->belongsToMany('App\JobType','job_job_types','job_id','job_type_id');
    }
    public function currency(){
        return $this->belongsTo('App\Currency','currency_id');
    }

    public function job_job_industries(){
        return $this->hasMany(JobJobIndustry::class);
    }
    public function job_job_tags(){
        return $this->hasMany(JobJobIndustryTag::class);
    }

    public function job_questions(){
        return $this->hasMany(JobQuestion::class,'job_id');
    }

    function activity(){
        return $this->hasMany('App\JobApplicant','job_id');
    }
    
}
