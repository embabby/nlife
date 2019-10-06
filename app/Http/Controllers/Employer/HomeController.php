<?php

namespace App\Http\Controllers\Employer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Job;
use App\JobApplicant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public  function index(){
    	$employer=Auth::guard('employer')->user();
        $company=Company::find($employer->company_id);

        // $jobs=Job::where('company_id',$company->id)->paginate(15);
        $opened_contacts = JobApplicant::where('company_id', $company->id)->where('opened_contact', 1)->get()->count();
        $opened_contacts_today = JobApplicant::where('company_id', $company->id)->where('opened_contact', 1)->whereDate('created_at', Carbon::today())->get()->count();
        $downloaded_cvs = JobApplicant::where('company_id', $company->id)->where('downloaded_cv', 1)->get()->count();
        $downloaded_cvs_today = JobApplicant::where('company_id', $company->id)->where('downloaded_cv', 1)->whereDate('created_at', Carbon::today())->get()->count();

        $clicks = $company->clicks->count();

        return view('employer.dashboard',compact('company','opened_contacts','opened_contacts_today','downloaded_cvs','downloaded_cvs_today','clicks'));
    }
}


