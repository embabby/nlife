<?php

namespace App\Http\Controllers\Employer;

use App\Company;
use App\Employer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CompanyUsersController extends Controller
{
    public function index(){
        $employer=Auth::guard('employer')->user();
        $company=Company::find($employer->company_id);
        $primary_account=Employer::where('company_id',$company->id)->where('super_user',1)->first();
        return view('employer.company.company_users',compact('company','primary_account'));
    }

    public function store(Request $request){
        $request->validate([
            'first_name'=>'required|string|max:200',
            'last_name'=>'required|string|max:200',
            'job_title'=>'required|string|max:200',
            'phone'=>'required|string|max:200',
            'email'=>'required|email|max:200|unique:employers',
            'password'=>'required',
        ]);
        $employer=Auth::guard('employer')->user();
        $first_name=sanitize($request->input('first_name'));
        $last_name=sanitize($request->input('last_name'));
        $job_title=sanitize($request->input('job_title'));
        $phone=sanitize($request->input('phone'));
        $email=sanitize($request->input('email'));
        $password=bcrypt($request->input('password'));

        Employer::create([
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'job_title'=>$job_title,
            'phone'=>$phone,
            'email'=>$email,
            'password'=>$password,
            'company_id'=>$employer->company_id
        ]);
        Session::flash('success','Employer Added Successfully');
        return redirect()->back();
    }

    public function update(Request $request,$id){
        $request->validate([
            'password'=>'required',
            'first_name'=>'required|string|max:200',
            'last_name'=>'required|string|max:200',
            'job_title'=>'required|string|max:200',
            'phone'=>'required|string|max:200',
            'email'=>'required|email|max:200|unique:employers,email,'.$id,
        ]);

        $employer=Employer::find($id);
        if (Hash::check($request->input('password'), $employer->password)) {
            Employer::find($id)->update([
                'first_name'=>sanitize($request->input('first_name')),
                'last_name'=>sanitize($request->input('last_name')),
                'job_title'=>sanitize($request->input('job_title')),
                'phone'=>sanitize($request->input('phone')),
                'email'=>sanitize($request->input('email')),
            ]);
            Session::flash('success','User Updated Successfully');
            return redirect()->back();
        }else{
            Session::flash('danger','Password Doesn\'t Match Our Records');
            return redirect()->back();
        }

    }

    public function changePassword(Request $request,$id){
        $request->validate([
            'old_password'=>'required',
            'password'=>'required|confirmed'
        ]);

        $employer=Employer::find($id);

        if (Hash::check($request->input('old_password'), $employer->password)) {
            $employer->password=bcrypt($request->input('password'));
            $employer->save();
            Session::flash('success','Password Changed Successfully');
            return redirect()->back();
        }else{
            Session::flash('danger','Old Password Doesn\'t Match Our Records');
            return redirect()->back();
        }
    }

    public function destroy(Request $request,$id){

        $request->validate([
            'admin_password'=>'required'
        ]);
        $employer=Employer::find($id);

        if ($employer){
            $admin_account=Employer::where('company_id',$employer->company_id)->where('super_user',1)->first();

            if ($admin_account->id !=$id){
                if (Hash::check($request->input('admin_password'), $admin_account->password)) {
                    $employer->delete();
                    Session::flash('danger','Account Deleted Successfully');
                    return redirect()->back();
                }else{
                    Session::flash('danger','Admin Password Doesn\'t Match Our Records');
                    return redirect()->back();
                }
            }else{
                Session::flash('danger','Primary Account Can\'t be Deleted');
                return redirect()->back();
            }

        }

    }
}
