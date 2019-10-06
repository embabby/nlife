<?php

namespace App\Http\Controllers\Employer;

use App\CareerLevel;
use App\Company;
use App\CompanyJobIndustry;
use App\Country;
use App\Currency;
use App\Job;
use App\JobIndustry;
use App\JobIndustryTag;
use App\JobJobIndustry;
use App\JobJobIndustryTag;
use App\JobJobType;
use App\JobQuestion;
use App\JobType;
use App\SalaryType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class EmployerJobsController extends Controller
{
    public function index(){
        $employer=Auth::guard('employer')->user();
        $company=Company::find($employer->company_id);
        $jobs=Job::where('company_id',$company->id)->paginate(15);
        return view('employer.Jobs.index',compact('jobs'));
    }

    public function create(){
        $countries=Country::all();
        $job_industries=JobIndustry::all();
        $job_types=JobType::all();
        $career_levels=CareerLevel::all();
        $salary_types=SalaryType::all();
        $employer=Auth::guard('employer')->user();
        $company=Company::find($employer->company_id);
        $currency_types=Currency::all();
        return view('employer.Jobs.add',compact('currency_types','countries','job_industries','job_types','career_levels','salary_types','company'));
    }
    public function store(Request $request){

        $request->validate([
            'job_title'=>'required|string',
            'country_id'=>'required|numeric',
            'city_id'=>'required|numeric',
            'address'=>'required|string',
            'job_industries.*'=>'numeric',
            'job_industries'=>'array|required',
            'job_industries_tags.*'=>'numeric',
            'job_industries_tags'=>'array|required',
            'job_types.*'=>'numeric',
            'job_types'=>'array|required',
            'career_level_id'=>'required|numeric',
            'experience'=>['required', 'regex:/^[d]$|^[0-9][+]$|^\d+(-\d+)?$/'],
            'vacancies'=>'required|numeric',
            'start_salary'=>'required_with_all:end_salary|numeric|nullable',
            'end_salary'=>'required_with_all:start_salary|numeric|nullable',
            'salary_type_id'=>'required_with_all:start_salary,end_salary|numeric',
            'currency_id'=>'numeric|required_with_all:start_salary,end_salary',
            'hide_salary'=>'in:1|required_without:start_salary,end_salary',
            'job_description'=>'required',
            'job_requirements'=>'required',
            'questions.*'=>'string',
            'questions'=>'nullable|array',
            'hide_company'=>'nullable|in:1',
            'receive_emails'=>'nullable|in:1',
            'email_reference'=>'required_with_all:receive_emails|email',
        ]);

        $today = Carbon::now()->toDateString();
        $company = Auth::guard('employer')->user()->company;
        if($company->posted_jobs >= $company->plan_job_posts  || $company->plan_end_date < $today ){
            return redirect()->route('companyPlans.index');
        }

        $job_industries=$request->input('job_industries');
        $job_industries_tags=$request->input('job_industries_tags');
        $job_types=$request->input('job_types');
        $questions=$request->input('questions');

        //get experience
        $experience=$request->input('experience');
        $experience=str_split($experience);
        $start_years_of_experience=$experience[0];
        $end_years_of_experience=count($experience)==3?$experience[2]:null;


        $employer=Auth::guard('employer')->user();
        $job=Job::create([
            'company_id'=>$employer->company_id,
            'job_title'=>sanitize($request->input('job_title')),
            'country_id'=>$request->input('country_id'),
            'city_id'=>$request->input('city_id'),
            'address'=>sanitize($request->input('address')),
            'career_level_id'=>$request->input('career_level_id'),
            'start_years_of_experience'=>$start_years_of_experience,
            'end_years_of_experience'=>$end_years_of_experience,
            'vacancies'=>$request->input('vacancies'),
            'start_salary'=>$request->input('start_salary'),
            'end_salary'=>$request->input('end_salary'),
            'salary_type_id'=>$request->input('salary_type_id'),
            'currency_id'=>$request->input('currency_id'),
            'hide_salary'=>$request->input('hide_salary')?$request->input('hide_salary'):0,
            'job_description'=>clean($request->input('job_description')),
            'job_requirements'=>clean($request->input('job_requirements')),
            'hide_company'=>$request->input('hide_company')?$request->input('hide_company'):0,
            'receive_emails'=>$request->input('receive_emails')?$request->input('receive_emails'):0,
            'email_reference'=>$request->input('email_reference'),
        ]);
        $job->slug=str_replace(' ','-',$job->job_title).'-'.$job->id;
        $job->save();
        foreach ($job_industries as $job_industry){
            JobJobIndustry::create([
                'job_id'=>$job->id,
                'job_industry_id'=>$job_industry
            ]);
        }
        foreach ($job_industries_tags as $job_industries_tag){
            JobJobIndustryTag::create([
                'job_id'=>$job->id,
                'job_industry_tag_id'=>$job_industries_tag
            ]);
        }
        foreach ($job_types as $job_type){
            JobJobType::create([
                'job_id'=>$job->id,
                'job_type_id'=>$job_type
            ]);
        }
        foreach ($questions as $question){
            JobQuestion::create([
                'company_id'=>$employer->company_id,
                'job_id'=>$job->id,
                'question'=>sanitize($question)
            ]);
        }
        $employer->job_posts=$employer->job_posts+1;
        $employer->save();
        
        $employer->company->posted_jobs += 1;
        $employer->company->save();
        Session::flash('success','Job Added Successfully');
        return redirect()->route('employer-jobs.index');

    }

    public function edit($id){
        $countries=Country::all();
        $job_industries=JobIndustry::all();
        $job_types=JobType::all();
        $career_levels=CareerLevel::all();
        $salary_types=SalaryType::all();
        $employer=Auth::guard('employer')->user();
        $company=Company::find($employer->company_id);
        $currency_types=Currency::all();
        $job=Job::where('id',$id)->where('company_id',$company->id)->first();
        $job_job_industries=JobJobIndustry::where('job_id',$id)->pluck('job_industry_id')->toArray();
        $job_industries_tags=JobIndustryTag::whereIn('job_industry_id',$job_job_industries)->get();
        $job_job_industry_tags=JobJobIndustryTag::where('job_id',$id)->pluck('job_industry_tag_id')->toArray();

        $job_job_types=JobJobType::where('job_id',$id)->pluck('job_type_id')->toArray();

        if ($job){
            return view('employer.Jobs.edit',compact('job_job_types','job_job_industry_tags','job_industries_tags','job_job_industries','job','currency_types','countries','job_industries','job_types','career_levels','salary_types','company'));
        }else{
            Session::flash('danger','Job Doesn\'t Exist');
            return redirect()->back();
        }

    }
    public function update(Request $request,$id){

        $request->validate([
            'job_title'=>'required|string',
            'country_id'=>'required|numeric',
            'city_id'=>'required|numeric',
            'address'=>'required|string',
            'job_industries.*'=>'numeric',
            'job_industries'=>'array|required',
            'job_industries_tags.*'=>'numeric',
            'job_industries_tags'=>'array|required',
            'job_types.*'=>'numeric',
            'job_types'=>'array|required',
            'career_level_id'=>'required|numeric',
            'experience'=>['required', 'regex:/^[d]$|^[0-9][+]$|^\d+(-\d+)?$/'],
            'vacancies'=>'required|numeric',
            'start_salary'=>'required_with_all:end_salary|numeric|nullable',
            'end_salary'=>'required_with_all:start_salary|numeric|nullable',
            'salary_type_id'=>'required_with_all:start_salary,end_salary|numeric',
            'currency_id'=>'numeric|required_with_all:start_salary,end_salary',
            'hide_salary'=>'in:1|required_without:start_salary,end_salary',
            'job_description'=>'required',
            'job_requirements'=>'required',
            'questions.*'=>'string',
            'questions'=>'nullable|array',
            'hide_company'=>'nullable|in:1',
            'receive_emails'=>'nullable|in:1',
            'email_reference'=>'required_with_all:receive_emails|email',
        ]);

        $job_industries=$request->input('job_industries');
        $job_industries_tags=$request->input('job_industries_tags');
        $job_types=$request->input('job_types');
        $questions=$request->input('questions');

        //get experience
        $experience=$request->input('experience');
        $experience=str_split($experience);
        $start_years_of_experience=$experience[0];
        $end_years_of_experience=count($experience)==3?$experience[2]:null;


        $employer=Auth::guard('employer')->user();
        $job=Job::find($id)->update([
            'job_title'=>sanitize($request->input('job_title')),
            'country_id'=>$request->input('country_id'),
            'city_id'=>$request->input('city_id'),
            'address'=>sanitize($request->input('address')),
            'career_level_id'=>$request->input('career_level_id'),
            'start_years_of_experience'=>$start_years_of_experience,
            'end_years_of_experience'=>$end_years_of_experience,
            'vacancies'=>$request->input('vacancies'),
            'start_salary'=>$request->input('start_salary'),
            'end_salary'=>$request->input('end_salary'),
            'salary_type_id'=>$request->input('salary_type_id'),
            'currency_id'=>$request->input('currency_id'),
            'hide_salary'=>$request->input('hide_salary')?$request->input('hide_salary'):0,
            'job_description'=>clean($request->input('job_description')),
            'job_requirements'=>clean($request->input('job_requirements')),
            'hide_company'=>$request->input('hide_company')?$request->input('hide_company'):0,
            'receive_emails'=>$request->input('receive_emails')?$request->input('receive_emails'):0,
            'email_reference'=>$request->input('email_reference'),
        ]);



        JobJobIndustry::where('job_id',$id)->delete();
        foreach ($job_industries as $job_industry){
            JobJobIndustry::create([
                'job_id'=>$id,
                'job_industry_id'=>$job_industry
            ]);
        }
        JobJobIndustryTag::where('job_id',$id)->delete();
        foreach ($job_industries_tags as $job_industries_tag){
            JobJobIndustryTag::create([
                'job_id'=>$id,
                'job_industry_tag_id'=>$job_industries_tag
            ]);
        }
        JobJobType::where('job_id',$id)->delete();
        foreach ($job_types as $job_type){
            JobJobType::create([
                'job_id'=>$id,
                'job_type_id'=>$job_type
            ]);
        }
        JobQuestion::where('job_id',$id)->delete();
        foreach ($questions as $question){
            JobQuestion::create([
                'company_id'=>$employer->company_id,
                'job_id'=>$id,
                'question'=>sanitize($question)
            ]);
        }
        Session::flash('success','Job Updated Successfully');
        return redirect()->route('employer-jobs.index');

    }


    public function applied($slug){
        $job=Job::where('slug',$slug)->first();
        $employer=Auth::guard('employer')->user();
        $company=Company::find($employer->company_id);
        return view('employer.Jobs.applied',compact('job','company'));
    }
    public function shortlisted($slug){
        $job=Job::where('slug',$slug)->first();
        $employer=Auth::guard('employer')->user();
        $company=Company::find($employer->company_id);
        return view('employer.Jobs.shortlisted',compact('job','company'));
    }
    public function accepted($slug){
        $job=Job::where('slug',$slug)->first();
        $employer=Auth::guard('employer')->user();
        $company=Company::find($employer->company_id);
        return view('employer.Jobs.accepted',compact('job','company'));
    }
    public function rejected($slug){
        $job=Job::where('slug',$slug)->first();
        $employer=Auth::guard('employer')->user();
        $company=Company::find($employer->company_id);
        return view('employer.Jobs.rejected',compact('job','company'));
    }

}
