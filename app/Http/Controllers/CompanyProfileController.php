<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyImage;
use App\CompanyJobIndustry;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyProfileController extends Controller
{
    public function home($slug){
        $company=Company::where('slug',$slug)->first();
        if (!$company){
            Session::flash('danger','Company Not Available');
            return redirect()->back();
        }
        $company_job_industries=CompanyJobIndustry::where('company_id',$company->id)->pluck('id')->toArray();
        $related_jobs= Job::where('company_id','!=',$company->id)->WhereHas('job_job_industries',function($q) use($company_job_industries) {
            $q->whereIn('job_industry_id', $company_job_industries);
        })->orderBy('id','DESC')->limit(5)->get();

        return view('company_profile.home',compact('company','related_jobs'));

    }

    public function benefits($slug){
        $company=Company::where('slug',$slug)->first();
        if (!$company){
            Session::flash('danger','Company Not Available');
            return redirect()->back();
        }
        $company_job_industries=CompanyJobIndustry::where('company_id',$company->id)->pluck('id')->toArray();
        $related_jobs= Job::where('company_id','!=',$company->id)->WhereHas('job_job_industries',function($q) use($company_job_industries) {
            $q->whereIn('job_industry_id', $company_job_industries);
        })->orderBy('id','DESC')->limit(5)->get();
        return view('company_profile.benefits',compact('company','related_jobs'));
    }

    public function images($slug){
        $company=Company::where('slug',$slug)->first();
        if (!$company){
            Session::flash('danger','Company Not Available');
            return redirect()->back();
        }
        $company_images=CompanyImage::where('company_id',$company->id)->paginate(9);
        $company_job_industries=CompanyJobIndustry::where('company_id',$company->id)->pluck('id')->toArray();
        $related_jobs= Job::where('company_id','!=',$company->id)->WhereHas('job_job_industries',function($q) use($company_job_industries) {
            $q->whereIn('job_industry_id', $company_job_industries);
        })->orderBy('id','DESC')->limit(5)->get();
        return view('company_profile.images',compact('company','company_images','related_jobs'));
    }

    public function jobs($slug){
        $company=Company::where('slug',$slug)->first();
        if (!$company){
            Session::flash('danger','Company Not Available');
            return redirect()->back();
        }
        $company_jobs=Job::where('company_id',$company->id)->orderBy('id','DESC')->paginate(9);
        $company_job_industries=CompanyJobIndustry::where('company_id',$company->id)->pluck('id')->toArray();
        $related_jobs= Job::where('company_id','!=',$company->id)->WhereHas('job_job_industries',function($q) use($company_job_industries) {
            $q->whereIn('job_industry_id', $company_job_industries);
        })->orderBy('id','DESC')->limit(5)->get();
        return view('company_profile.jobs',compact('company','company_jobs','related_jobs'));
    }

}
