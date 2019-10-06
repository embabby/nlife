<?php

namespace App\Http\Controllers;

use App\HotJob;
use App\Partner;
class indexController extends Controller
{
    public function index()
    {
        $partners=Partner::all();
        $hot_jobs=HotJob::orderBy('id',"DESC")->limit(6)->get();
        return view('welcome',compact('partners','hot_jobs'));
    }
}
