<?php

namespace App;

use App\Notifications\CandidateResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Candidate extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'user_name',
        'email',
        'password',
        'first_name',
        'last_name',
        'phone1',
        'phone2',
        'country_id',
        'city_id',
        'address',
        'birth_date',
        'gender_id',
        'martial_status_id',
        'military_status_id',
        'cv',
        'avatar',
        'university',
        'faculty',
        'major',
        'degree',
        'university_start_date',
        'university_end_date',
        'job_title',
        'current_salary',
        'salary_type_id',
        'currency_id',
        'desired_salary',
        'availability',
        'open_for_job_status_id',
        'last_seen',
        'about_me',
        'profile_views',
        'career_level_id',
        'years_of_experience_id',
         ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CandidateResetPassword($token));
    }

    function candidate_job_industries(){
        return $this->belongsToMany('App\JobIndustry','candidate_job_industries','candidate_id','job_industry_id');
    }
    function candidate_job_industries_tags(){
        return $this->belongsToMany('App\JobIndustryTag','candidate_job_industry_tags','candidate_id','tag_id');
    }
    function gender(){
        return $this->belongsTo('App\Gender','gender_id');
    }
    function military(){
        return $this->belongsTo('\App\MilitaryStatus','military_status_id');
    }
    function Martial(){
        return $this->belongsTo('\App\MartialStatus','martial_status_id');
    }
    function languages(){
        return $this->belongsToMany('App\Language','candidate_languages','candidate_id','language_id');
    }

    function country(){
        return $this->belongsTo('App\Country');
    }
    function city(){
        return $this->belongsTo('App\City');
    }
    function experiences(){
        return $this->hasMany('\App\CandidateExperience','candidate_id');
    }
    function years_of_experience(){
       return $this->belongsTo('App\ExperienceYear','years_of_experience_id');
    }
    function job_applications(){
      return  $this->belongsToMany('App\Job','job_applicants','candidate_id','job_id');
    }
    function saved_jobs(){
        return $this->belongsToMany('App\Job','candidate_saved_jobs','candidate_id','job_id');
    }
    function open_for_job_status(){
        return $this->belongsTo(OpenForJobStatus::class,'open_for_job_status_id');
    }
    function career_level(){
        return $this->belongsTo(CareerLevel::class,'career_level_id');
    }
    function salary_type(){
        return $this->belongsTo(SalaryType::class,'salary_type_id');
    }
    function currency(){
        return $this->belongsTo(Currency::class,'currency_id');
    }


    function activity(){
        return $this->hasMany('App\JobApplicant','candidate_id');
    }
}
