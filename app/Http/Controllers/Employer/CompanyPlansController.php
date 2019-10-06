<?php

namespace App\Http\Controllers\Employer;

use App\Company;
use App\Plan;
use App\TrailPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\PlanRequest;
use Illuminate\Support\Facades\Session;



class CompanyPlansController extends Controller
{
    public function index(){

    	// return Auth::guard('employer')->user()->id;
        $plans=Plan::all();
        $employer=Auth::guard('employer')->user();
        $company=Company::find($employer->company_id);
        $trail=TrailPlan::first();
        $today = Carbon::now()->toDateString();

        ($company->plan_end_date < $today) ? $remaining = 0 : $remaining = Carbon::parse($today)->diffInDays(Carbon::parse($company->plan_end_date));

        return view('employer.plans',compact('plans','company','trail','remaining'));
    
    }


    public function makePlanRequest(Request $request){

    	$request->validate([
            'email' => 'required|email|max:100',
            'phone' => 'required|max:30',
        ]);

        $plan_request=PlanRequest::create([
        	'email' => $request->email,
        	'phone' => $request->phone,
        	'plan_id' => $request->plan_id,
        	'employer_id' => $request->employer_id,
        	'company_id' => $request->company_id,
        ]);

        Session::flash('message','Your Request Sent Successfully');
    	return redirect()->route('employer.dashboard');
    }
}
