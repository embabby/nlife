<?php

namespace App\Http\Controllers\Candidate;

use App\Candidate;
use App\CandidateSavedJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CandidateSavedJobsController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'job_id'=>'numeric|required'
        ]);
        $candidate=Auth::guard('candidate')->user();
        $saved_job=CandidateSavedJob::where('candidate_id',$candidate->id)->where('job_id',$request->input('job_id'))->first();
        if (!$saved_job){
            CandidateSavedJob::create([
                'job_id'=>$request->input('job_id'),
                'candidate_id'=>$candidate->id
            ]);
            Session::flash('success','Job Saved Successfully');
        }else{
            $saved_job->delete();
            Session::flash('danger','Job Removed From Saved');
        }
        return redirect()->back();
    }
}
