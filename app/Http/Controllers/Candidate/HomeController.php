<?php

namespace App\Http\Controllers\Candidate;

use App\Blog;
use App\Candidate;
use App\CandidateJobIndustry;
use App\CandidateJobIndustryTag;
use App\CandidateSavedJob;
use App\CareerLevel;
use App\City;
use App\Country;
use App\Job;
use App\JobApplicant;
use App\JobIndustry;
use App\JobType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public  function dashboard(){
        $candidate=Auth::guard('candidate')->user();

        $blogs=Blog::orderBy('id','DESC')->limit(3)->get();
        $candidate_job_industries=CandidateJobIndustry::where('candidate_id',$candidate->id)->pluck('job_industry_id')->toArray();
        $candidate_job_industries_tags=CandidateJobIndustryTag::where('candidate_id',$candidate->id)->pluck('tag_id')->toArray();

        $recommended_jobs=
            Job::
            where('job_title','like',"%{$candidate->job_title}%")
                ->orWhereHas('job_job_industries',function($q) use($candidate_job_industries) {
                    $q->whereIn('job_industry_id', $candidate_job_industries);
                })
                ->OrwhereHas('job_job_tags',function($q) use($candidate_job_industries_tags) {
                    $q->whereIn('job_industry_tag_id', $candidate_job_industries_tags);
                })
                ->where('career_level_id',$candidate->career_level_id)->limit(8)->get();


        return view('candidate.home',compact('candidate','blogs','recommended_jobs'));

    }

    public function applied(){
        $candidate=Auth::guard('candidate')->user();
        $applied_jobs=JobApplicant::where('candidate_id',$candidate->id)->orderBy('id','DESC')->paginate(12);
        return view('candidate.jobs.applied',compact('candidate','applied_jobs'));
    }
    public function saved(){
        $candidate=Auth::guard('candidate')->user();
        $saved_jobs=CandidateSavedJob::where('candidate_id',$candidate->id)->orderBy('id','DESC')->paginate(12);
        return view('candidate.jobs.saved',compact('candidate','saved_jobs'));
    }
    public function recommended(){
        $candidate=Auth::guard('candidate')->user();
        $candidate_job_industries=CandidateJobIndustry::where('candidate_id',$candidate->id)->pluck('job_industry_id')->toArray();
        $candidate_job_industries_tags=CandidateJobIndustryTag::where('candidate_id',$candidate->id)->pluck('tag_id')->toArray();

        $recommended_jobs=
            Job::where('job_title','like',"%{$candidate->job_title}%")
                ->orWhereHas('job_job_industries',function($q) use($candidate_job_industries) {
                    $q->whereIn('job_industry_id', $candidate_job_industries);
                })
                ->OrwhereHas('job_job_tags',function($q) use($candidate_job_industries_tags) {
                    $q->whereIn('job_industry_tag_id', $candidate_job_industries_tags);
                })
                ->where('career_level_id',$candidate->career_level_id)->paginate(12);
        return view('candidate.jobs.recommended',compact('candidate','recommended_jobs'));
    }

    public function all_jobs(){
        $candidate=Auth::guard('candidate')->user();
        $jobs=Job::orderBy('id','DESC')->paginate('9');
        $countries=Country::all();
        $cities=City::all();
        $career_levels=CareerLevel::all();
        $job_types=JobType::all();
        $job_industries=JobIndustry::all();
        return view('candidate.jobs.all_jobs',compact('candidate','jobs','countries','cities','career_levels','job_types','job_industries'));

    }

}
