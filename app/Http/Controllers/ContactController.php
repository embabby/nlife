<?php

namespace App\Http\Controllers;

use App\Contact_us;
use App\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact_us');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:100',
            'message'=>'required|string|max:500',
            'email'=>'required|email|max:100',
        ]);


        $name=sanitize($request->input('name'));
        $email=sanitize($request->input('email'));
        $message=sanitize($request->input('message'));

        ContactUs::create([
            'name'=>$name,
            'email'=>$email,
            'message'=>$message
        ]);

        Session::flash('success','You Form Submitted Created Successfully');
        return redirect()->back();
    }

}
