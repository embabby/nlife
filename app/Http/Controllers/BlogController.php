<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs=Blog::orderBy('id','DESC')->paginate(12);
        return view('blog',compact('blogs'));
    }
    public function show($slug){
        $blog=Blog::where('slug',$slug)->first();
        return view('blog_details',compact('blog'));
    }
}
