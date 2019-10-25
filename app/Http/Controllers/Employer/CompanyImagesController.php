<?php

namespace App\Http\Controllers\Employer;

use App\Company;
use App\CompanyImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CompanyImagesController extends Controller
{

    public function index()
    {
        $employer=Auth::guard('employer')->user();
        $company=Company::find($employer->company_id);
        return view('employer.company.company_images',compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'=>'string|required|max:100'
        ]);

        if($file=$request->file('image')){

            $file->move('storage/company-images/'.Carbon::now()->format('FY'),time().$file->getClientOriginalName());
            $name='company-images/'.Carbon::now()->format('FY').'/'.time().$file->getClientOriginalName();
            CompanyImage::create([
                'image'=>$name,
                'company_id'=>$id,
                'title'=>sanitize($request->input('title'))
            ]);
        }

        Session::flash('success','Image added successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $image=CompanyImage::find($id);
        if($image->image && file_exists(public_path().'/company_images/'.$image->image)){
            unlink(public_path().'/company_images/'.$image->image);
        }

        $image->delete();
        Session::flash('danger','Image Deleted Successfully');
        return redirect()->back();
    }
}
