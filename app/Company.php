<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Company extends Model
{
    protected $fillable=[
      'name',
      'slug',
      'phone',
      'company_size_id',
      'terms_conditions',
      'country_id',
      'city_id',
      'address',
      'year_founded',
      'company_type_id',
      'about_company',
      'website',
      'facebook',
      'linked_in',
      'twitter',
      'logo',
      'cover_image',
      'email_preference',
      'receive_emails',
      'downloaded_cvs',
      'unlocked_accounts',
      'posted_jobs',
        ///package//
        'plan_id',  //if 0 equals trail
        'plan_job_posts',
        'plan_cvs',
        'plan_profiles',
        'plan_expiry_days',
        'plan_start_date',
        'plan_end_date'
    ];


    public function job_industries(){
        return $this->belongsToMany('App\JobIndustry','company_job_industries','company_id','job_industry_id');
    }
    public function company_job_industry_tags(){
        return $this->belongsToMany('App\JobIndustryTag','company_job_industry_tags','company_id','job_industry_tag_id');
    }
    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function city(){
        return $this->belongsTo('App\City');
    }

    public function category_benefits(){
        return $this->hasMany('App\BenefitCategory','company_id');
    }

    public function images(){
        return $this->hasMany('App\CompanyImage','company_id');
    }

    public function employers(){
        return $this->hasMany('App\Employer','company_id');
    }
    public function plan(){
       return $this->belongsTo('App\Plan','plan_id');
    }
    public function size(){
        return $this->belongsTo('App\CompanySize','company_size_id');
    }
    public  function type(){
        return $this->belongsTo('App\CompanyType','company_type_id');
    }
    public function benefits_categories(){
        return $this->belongsToMany('App\BenefitCategory','company_benefits','company_id','benefit_category_id')->distinct();
    }
    public function benefits(){
        return $this->belongsToMany('App\Benefit','company_benefits','company_id','benefit_id');
    }

    public function jobs(){
        return $this->hasMany('App\Job','company_id');
    }

    public function candidates(){
        return $this->hasMany('App\JobApplicant','company_id');
    }


    public function clicks(){
        return $this->hasMany('App\Click','company_id');
    }


}
