<?php

namespace App\Http\Controllers\Employer;

use App\Candidate;
use App\Company;
use App\JobApplicant;
use App\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use PDF;
use Carbon\Carbon;


class CandidatesController extends Controller
{
    public function unlocked_candidates(){
        $employer=Auth::guard('employer')->user();
        $company=Company::find($employer->company_id);
        $unlocked_candidates=JobApplicant::where('company_id',$company->id)->where('opened_contact',1)->paginate(15);
        return view('employer.candidates.unlocked_candidates',compact('unlocked_candidates'));
    }
    public function show_candidate($slug,$job_slug){

        $employer=Auth::guard('employer')->user();
        $company=Company::find($employer->company_id);
        $candidate=Candidate::where('slug',$slug)->first();
        $job = Job::where('slug',$job_slug)->first();
        $job_applicant = JobApplicant::where('candidate_id', $candidate->id)->where('job_id', $job->id)->first();
        if($job_applicant->opened_contact == 0){

            $today = Carbon::now()->toDateString();
            if($company->unlocked_accounts >= $company->plan_profiles  || $company->plan_end_date < $today ){
                return redirect()->route('companyPlans.index');
            }

            $job_applicant->opened_contact = 1;
            $job_applicant->save();
            $employer->company->unlocked_accounts += 1;
            $employer->company->save();
        }
        return view('employer.candidates.show_candidate',compact('candidate','company','employer','job_applicant'));

    }


    public function download_cv($applicant_id){

     $job_applicant = JobApplicant::findOrFail($applicant_id);
     $candidate = $job_applicant->candidate;
     // $candidate=Candidate::where('slug',$slug)->first();
     if($candidate->cv && file_exists(public_path().'/cvs/'.$candidate->cv)){
         $file = public_path()."/cvs/".$candidate->cv;

        if($job_applicant->downloaded_cv == 0){


            $today = Carbon::now()->toDateString();
            $company = Auth::guard('employer')->user()->company;
            if($company->downloaded_cvs >= $company->plan_cvs  || $company->plan_end_date < $today ){
                return redirect()->route('companyPlans.index');
            }


             $job_applicant->downloaded_cv = 1;
             $job_applicant->save();
             $employer=Auth::guard('employer')->user();
             $employer->company->downloaded_cvs += 1;
             $employer->company->save();
        }
         return Response::download($file);
     }else{
         Session::flash('danger','File Doesn\'t Exists' );
         return \redirect()->back();
     }

    }


    public function changeStatus($applicant_id, $type){
        $job_applicant = JobApplicant::findOrFail($applicant_id);
        $job_applicant->job_application_status_id = $type;
        $job_applicant->save();
        return \redirect()->back();

    }
}
