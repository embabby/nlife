@extends('layouts.candidate')
@section('content')
@include('partials.candidate_search_bar')
    <!--content--->
    <div id="tab-1" class="tab-content current">
        <div class="container">
            <div class="col-md-4">
                <div class="main-info wow fadeIn">
                    <div class="side">
                        @if($candidate->avatar && Storage::exists($candidate->avatar))
                            <img src="{{url(asset('storage/'.$candidate->avatar))}}" class="img-responsive">
                        @else
                            <img src="{{url(asset('storage/'.gender_image($candidate->gender_id)))}}"  class="img-responsive" alt="">
                        @endif
                            <table class="table-bordered table-responsive" >
                            <tr><button class="btn btn-primary update_profile"><a href="{{url('candidate/account')}}">Update Your Profile</a></button></tr>
                            <tr><td><span>User Name:</span></td><td><p>{{$candidate->user_name}}</p> </td></tr>
                            <tr><td><span>Name:</span></td><td><p>{{$candidate->first_name}} {{$candidate->last_name}}</p> </td></tr>
                            <tr><td><span>Age:</span></td><td><p>{{\Carbon\Carbon::parse($candidate->birth_date)->age}}Y</p> </td></tr>
                            <tr><td><span>Address:</span></td><td><p>{{$candidate->country?$candidate->country->name:''}} - {{$candidate->city?$candidate->city->name:''}}</p>  </td></tr>
                            <tr><td><span>Job Activity:</span></td>
                                <td>
                                    <div class="applyed">
                                        <h6>Applied</h6>
                                        <span>{{ $candidate->activity->count()}}</span>
                                    </div>
                                    <div class="shortlist">
                                        <h6>Shortlisted</h6>
                                        <span>{{ $candidate->activity->where('job_application_status_id',\Config::get('constants.SHORTLISTED'))->count()}}</span>
                                    </div>
                                    <div class="rejected">
                                        <h6>Rejected</h6>
                                        <span>{{ $candidate->activity->where('job_application_status_id',\Config::get('constants.REJECTED'))->count()}}</span>
                                    </div>
                                </td></tr>
                            <tr><td><span>Phone:</span></td><td><p>{{$candidate->phone1}}</p></td></tr>
                            <tr><td><span>Email:</span></td><td><p>{{$candidate->email}}</p>
                            <tr><td><span>Job Title:</span></td><td><p>{{$candidate->job_title}}</p>
                                    </td>
                                </tr>
                        </table>
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @elseif(Session::has('danger'))
                    <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                @endif
                <div class="job-activity wow fadeIn">
                    <ul class="tabss">
                        <li class="tab-links currents" data-tab="recommended"> Recommended Jobs </li>
                        <li class="tab-links" data-tab="savedd">Saved Jobs  </li>
                        <li class="tab-links" data-tab="applied">Applied Jobs  </li>
                    </ul>
                    <div class="all_tabs">
                        <div id="recommended" class="tab-contents currents">
                            @foreach($recommended_jobs as $job )
                                @if($job->company)
                                    <div class="job-title">
                                <a href="{{route('companyProfile.home',$job->company->slug)}}">
                                    @if($job->company->logo && Storage::exists($job->company->logo))
                                        <img src="{{url(asset('storage/'.$job->company->logo))}}">
                                    @else
                                        <img src="{{url(asset('storage/companies/default-logo.png'))}}" alt="">
                                    @endif

                                </a>
                                <div class="job-sub">
                                    <h3><a href="{{route('jobs.show',$job->slug)}}">{{$job->job_title}}</a></h3>
                                    @if($job->hide_company==1)
                                        <h4> {{'Confidential'}} </h4>
                                        @else
                                    <h4>{{$job->company->name}} - {{$job->city?$job->city->name:''}} ( {{$job->country?$job->country->name:''}} ) </h4>
                                    @endif
                                </div>
                                <div class="like pull-right">
                                    {!! Form::open(['method'=>'post','action'=>'Candidate\CandidateSavedJobsController@store']) !!}
                                    <input type="hidden" name="job_id" style="display: none" value="{{$job->id}}">
                                    @if(in_array($job->id,Auth::guard('candidate')->user()->saved_jobs->pluck('id')->toArray()))
                                        <button style="border: none;color: red;;background-color: transparent"><i class="fa fa-heart"></i></button>
                                    @else
                                        <button style="border: none;color: red;;background-color: transparent"><i class="fa fa-heart-o"></i> </button>
                                    @endif
                                    {!! Form::close() !!}
                                    <span>{{Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</span>
                                </div>
                            </div>
                                @endif
                            @endforeach
                                <a href="{{route('candidate.jobs.recommended')}}" class="view">View All</a>
                        </div>
                        <div id="savedd" class="tab-contents">
                            @foreach($candidate->saved_jobs as $job )
                                @if($job->company)
                                <div class="job-title">
                                <a href="{{route('companyProfile.home',$job->company->slug)}}">
                                    @if($job->company->logo && Storage::exists($job->company->logo))
                                        <img src="{{url(asset('storage/'.$job->company->logo))}}">
                                    @else
                                        <img src="{{url(asset('storage/companies/default-logo.png'))}}" alt="">
                                    @endif
                                </a>
                                <div class="job-sub">
                                    <h3><a href="{{route('jobs.show',$job->slug)}}">{{$job->job_title}}</a></h3>
                                    <h4>{{$job->company->name}} - {{$job->city?$job->city->name:''}} ( {{$job->country?$job->country->name:''}} ) </h4>
                                </div>
                                <div class="like pull-right">
                                    {!! Form::open(['method'=>'post','action'=>'Candidate\CandidateSavedJobsController@store']) !!}
                                    <input type="hidden" name="job_id" style="display: none" value="{{$job->id}}">
                                            <button style="border: none;color: red;background-color: transparent"><i class="fa fa-heart"></i></button>
                                    {!! Form::close() !!}
                                    <span>{{Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</span>
                                </div>
                            </div>
                                @endif
                            @endforeach
                                <a href="{{route('candidate.jobs.saved')}}" style="background-color: #5fc014;color:white;padding: 5px 15px;border-radius: 3px;" calss="view">View All</a>

                        </div>
                        <div id="applied" class="tab-contents">
                            @foreach($candidate->job_applications as $job )
                                @if($job->company)
                                <div class="job-title">
                                    <a href="{{route('companyProfile.home',$job->company->slug)}}">
                                        @if($job->company->logo && Storage::exists($job->company->logo))
                                            <img src="{{url(asset('storage/'.$job->company->logo))}}">
                                        @else
                                            <img src="{{url(asset('storage/companies/default-logo.png'))}}" alt="">
                                        @endif
                                    </a>
                                    <div class="job-sub">
                                        <h3><a href="{{route('jobs.show',$job->slug)}}">{{$job->job_title}}</a></h3>
                                        <h4>{{$job->company->name}} - {{$job->city?$job->city->name:''}} ( {{$job->country?$job->country->name:''}} ) </h4>
                                    </div>
                                    <div class="like pull-right">
                                        <i class="badge">{{candidate_job_status($job->id,$candidate->id)}}</i>
                                        <span>{{Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</span>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                                <a href="{{route('candidate.jobs.applied')}}" class="text-center view">View All</a>
                        </div>
                    </div><!--/.all_tabs-->
                </div>
            </div>
        </div>
        <!--Start Know Your Worth -->
        <div class="worth-value wow slideInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="image">
                            <img src="{{asset('front_assets/images/value.png')}}" alt="know Your Woth" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="information">
                            <h2>Are You Paid Fairly ?<br><small> Know Your Worth</small> </h2>
                            <p class="lead">Get A Free , Personalized Salary Estimated based on tbody Job Market </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Know Your Worh -->
        <!--Strart Bolg  -->
        <div class="blog">
            <div class="row">
                <div class="container">
                    @foreach($blogs as $blog)
                    <div class="col-md-4">
                        <div class="block3 wow fadeInUp">
                            <img src="{{url(asset('storage/'.$blog->image))}}" alt="{{$blog->slug}}" class="img-responsive img-thumbnail">
                            <div class="information">
                                <h4>{{$blog->title}}</h4>
                                <p>{{sanitize(substr($blog->body,0,200))}} </p>
                            </div>
                            <a href="{{route('blog.show',$blog->slug)}}" class="btn btn-success more">More Details </a>
                        </div>
                    </div>
                   @endforeach
                </div>
            </div>
        </div>
        <!--End Blog -->
    </div>
@stop
