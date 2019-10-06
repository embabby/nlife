<?php

namespace App\Http\Controllers\Employer;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CompanySocialController extends Controller
{
    public function edit(){
        $employer=Auth::guard('employer')->user();
        $company=Company::find($employer->company_id);
        return view('employer.company.company_social',compact('company'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'website'=>'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'linked_in'=>'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'twitter'=>'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'facebook'=>'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
        ],
            [
                'website.regex'=>'Url Not Valid',
                'linked_in.regex'=>'Url Not Valid',
                'twitter.regex'=>'Url Not Valid',
                'facebook.regex'=>'Url Not Valid',
            ]);

        $website=sanitize($request->input('website'));
        $linked_in=sanitize($request->input('linked_in'));
        $twitter=sanitize($request->input('twitter'));
        $facebook=sanitize($request->input('facebook'));

        Company::find($id)->update([
            'website'=>$website,
            'linked_in'=>$linked_in,
            'twitter'=>$twitter,
            'facebook'=>$facebook
        ]);

        Session::flash('success','Social Media Updated Successfully');
        return redirect()->back();
    }
}
