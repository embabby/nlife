<?php

namespace App\Http\Controllers\Employer;

use App\Benefit;
use App\BenefitCategory;
use App\Company;
use App\CompanyBenefit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\Constraint\Count;

class CompanyBenefitController extends Controller
{
    public function edit(){

        $employer=Auth::guard('employer')->user();
        $company=Company::find($employer->company_id);
        $benefit_categories=BenefitCategory::all();
        $company_benefits=CompanyBenefit::where('company_id',$company->id)->pluck('benefit_id')->toArray();
        return view('employer.company.company_benefits',compact('company','benefit_categories','company_benefits'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'benefits.*'=>'numeric',
        ]);
        if ($request->input('benefits')){
        CompanyBenefit::where('company_id',$id)->delete();
        for ($i=0;$i<\count($request->input('benefits'));$i++){
            $benefit=Benefit::find($request->input('benefits')[$i]);
            if ($benefit){
                CompanyBenefit::create([
                    'company_id'=>$id,
                    'benefit_id'=>$request->input('benefits')[$i],
                    'benefit_category_id'=>$benefit->benefit_category_id
            ]);
            }
        }
        }
        Session::flash('success','Company Benefits Updated Successfully');
        return redirect()->back();

    }
}
