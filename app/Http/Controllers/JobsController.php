<?php

namespace App\Http\Controllers;

use App\CareerLevel;
use App\City;
use App\Country;
use App\Job;
use App\JobIndustry;
use App\JobJobIndustry;
use App\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\JobApplicant;
use App\Click;

class JobsController extends Controller
{

    public function index(){
        $countries=Country::all();
        $cities=City::all();
        $career_levels=CareerLevel::all();
        $job_types=JobType::all();
        $job_industries=JobIndustry::all();

        // $jobs=Job::orderBy('id','DESC')->paginate('9');
        $jobs=Job::orderBy('id','DESC');

        if(isset(request()->country)) {
          $jobs = $jobs->where('country_id',request()->country);
        }
        if(isset(request()->city)) {
          $jobs = $jobs->where('city_id',request()->city);
        }

        if(isset(request()->level)) {
          $jobs = $jobs->where('career_level_id',request()->level);
        }

        $jobs = $jobs->paginate('9');
        return view('jobs',compact('jobs','countries','cities','career_levels','job_types','job_industries'));
    }

    public function show($slug){

        $job=Job::where('slug',$slug)->first();

        //to check if he opened this job before
        if(Auth::guard('candidate')->user()){
            $clicked_before = Click::where('candidate_id', Auth::guard('candidate')->user()->id)->where('job_id',$job->id)->first();
            if(!$clicked_before) {
                Click::create([
                    'candidate_id' =>  Auth::guard('candidate')->user()->id,
                    'job_id' => $job->id,
                    'company_id' => $job->company_id
                ]);                
            }
        }



        if (!$job->company){
            Session::flash('danger','job Not Available Any More');
            return redirect()->back();
        }
        $job_industries=JobJobIndustry::where('job_id',$job->id)->pluck('job_industry_id')->toArray();
        $similar_jobs=Job::WhereHas('job_job_industries',function($q) use($job_industries) {
           $q->whereIn('job_industry_id', $job_industries);
       })->where('id','!=',$job->id)->orderBy('id',"DESC")->limit(4)->get();

        $user_applied_before = '';
            if(Auth::guard('candidate')->user()){
                $user_applied_before = JobApplicant::where('candidate_id', Auth::guard('candidate')->user()->id)->where('job_id', $job->id)->first();
                // if(!isset($user_applied_before)) {
                //     $job->clicks += 1;
                //     $job->save();
                // }
            }
            // return $user_job;
        return view('job_details',compact('job','similar_jobs', 'user_applied_before'));
    }



}
