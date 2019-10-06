<?php

namespace App\Http\Controllers\Employer;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CompanyEmailPreferenceController extends Controller
{
    public function edit(){
        $employer=Auth::guard('employer')->user();
        $company=Company::find($employer->company_id);
        return view('employer.company.company_email_preference',compact('company'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'email_preference'=>'required|email',
            'receive_emails'=>'nullable|in:1',
        ]);
       $company=Company::find($id);
       $company->email_preference=sanitize($request->input('email_preference'));
       if ($request->input('receive_emails')==1){
           $company->receive_emails=1;
       }else{
           $company->receive_emails=0;
       }
       $company->save();
       Session::flash('success','Company Email Preference Updated Successfully');
       return redirect()->back();
    }
}
