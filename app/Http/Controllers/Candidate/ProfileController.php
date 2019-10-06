<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use PDF;

class ProfileController extends Controller
{
    public function profile(){
        $candidate=Auth::guard('candidate')->user();
        return view('candidate.profile',compact('candidate'));

    }

    public function download_cv(){
     $candidate=Auth::guard('candidate')->user();

     if($candidate->cv && file_exists(public_path().'/cvs/'.$candidate->cv)){
         $file = public_path()."/cvs/".$candidate->cv;
         return Response::download($file);
     }else{
         Session::flash('danger','File Doesn\'t Exists' );
         return \redirect()->back();
     }

    }


    public function upload_cv(Request $request)
    {
      $request->validate([          
            'cv'=>'nullable|mimes:doc,odt,pdf,rtf,tex,txt,wks,wpd,docx|max:50000',
        ]);
      // return $request->file('cv');
      if($file=$request->file('cv')){
            $ext = strtolower($file->getClientOriginalExtension());
            $name=Auth::guard('candidate')->user()->user_name.'NewLifeHr'.time().'.'.$ext;
            $file->move('cvs',$name);
            $cv=$name;
            $candidate=Auth::guard('candidate')->user();
            $candidate->cv=$cv;
            $candidate->save();
        }
        return \redirect()->back();
        
    }


    public function create_cv(){
        $candidate=Auth::guard('candidate')->user();
        $pdf = \PDF::loadView('candidate.cv', compact('candidate'));
        // $pdf = PDF::loadView('candidate.pdf', $data);
        return $pdf->download('myCV.pdf');
    }
}
