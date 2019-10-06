<?php

namespace App\Http\Controllers\Candidate;

use App\Job;
use App\JobAnswer;
use App\JobApplicant;
use App\JobQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Config;
use Illuminate\Support\Facades\Session;

class JobApplicationController extends Controller
{
    public  function store(Request $request){

        $candidate=Auth::guard('candidate')->user();
        $job_id=$request->input('job_id');
        $job=Job::find($job_id);
        $applied_job=JobApplicant::where('candidate_id',$candidate->id)->where('job_id',$job_id)->first();
        if (!$applied_job){
            $request->validate([
                'job_id'=>'required|numeric',
                'answers.*'=>'string|nullable',
            ]);
            if ($request->input('answers')){
                foreach($request->input('answers') as $key=>$answer){
                    JobAnswer::create([
                        'job_id'=>$job_id,
                        'candidate_id'=>$candidate->id,
                        'question_id'=>$key,
                        'answer'=>$answer,
                    ]);
                }

            }
            JobApplicant::create([
                'company_id'=>$job->company_id,
                'job_id'=>$job_id,
                'candidate_id'=>$candidate->id,
                'job_application_status_id'=>\Config::get('constants.APPLIED')
            ]);
            Session::flash('success','Applied Successfully');
        }else{
            Session::flash('danger','Already Applied On This Job');
        }
        return redirect()->back();
    }
}
