<?php

namespace App\Http\Controllers\Employer;

use App\Company;
use App\CompanyJobIndustry;
use App\CompanySize;
use App\CompanyType;
use App\Country;
use App\JobIndustry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CompaniesAccountController extends Controller
{
    public function edit(){
        $employer=Auth::guard('employer')->user();
        $company=Company::find($employer->company_id);
        $company_job_industries=CompanyJobIndustry::where('company_id',$company->id)->pluck('job_industry_id')->toArray();
        $job_industries=JobIndustry::all();
        $company_sizes=CompanySize::all();
        $company_types=CompanyType::all();
        $countries=Country::all();
        return view('employer.company.edit',compact('company','job_industries','company_job_industries','company_sizes','company_types','countries'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required|string',
            'phone'=>'required|string',
            'job_industry'=>'array',
            'job_industry.*'=>'required|numeric',
            'company_type_id'=>'numeric|required',
            'company_size_id'=>'numeric|required',
            'year_founded'=>'date|required',
            'country_id'=>'required|numeric',
            'city_id'=>'required|numeric',
            'address'=>'required|string',
            'about_company'=>'required|string'
        ]);

        $this->validate($request, [
        'job_industry' => 'required',
        
    ]);

        $name=sanitize($request->input('name'));
        $slug=$name.'-'.$id;
        $phone=sanitize($request->input('phone'));
        $address=sanitize($request->input('address'));
        $about_company=sanitize($request->input('about_company'));
        $company=Company::find($id);

      if($file=$request->file('logo')){
          if($company->logo && Storage::disk('local')->exists($company->logo)){
              unlink(public_path().'/storage/'.$company->logo);
          }
              $file->move('storage/companies/'.Carbon::now()->format('FY'),time().$file->getClientOriginalName());
              $logo='companies/'.Carbon::now()->format('FY').'/'.time().$file->getClientOriginalName();
              $company->logo=$logo;
      }

        if($file=$request->file('cover_image')){
            if($company->cover_image && Storage::disk('local')->exists($company->cover_image)){
                unlink(public_path().'/storage/'.$company->cover_image);
            }
            $file->move('storage/companies/'.Carbon::now()->format('FY'),time().$file->getClientOriginalName());
            $cover_image='companies/'.Carbon::now()->format('FY').'/'.time().$file->getClientOriginalName();
            $company->cover_image=$cover_image;
        }



           $company->name=$name;
           $company->slug=$slug;
           $company->phone=$phone;
           $company->company_type_id=$request->input('company_type_id');
           $company->company_size_id=$request->input('company_size_id');
           $company->year_founded=$request->input('year_founded');
           $company->country_id=$request->input('country_id');
           $company->city_id=$request->input('city_id');
           $company->address=$address;
           $company->about_company=$about_company;
           $company->save();


        CompanyJobIndustry::where('company_id',$id)->delete();
        for ($i=0;$i<count($request->input('job_industry'));$i++){
            if ($request->input('job_industry')[$i]){
                CompanyJobIndustry::create([
                    'company_id'=>$id,
                    'job_industry_id'=>sanitize($request->input('job_industry')[$i])
                ]);
            }
        }

       Session::flash('success','Company Updated Successfully');
       return redirect()->back();
    }
}
