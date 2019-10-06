@extends('layouts.company_profile')
@section('content')
     @if (Session::has('success'))
         <div class="alert alert-success">{{ Session::get('success') }}</div>
     @elseif(Session::has('danger'))
         <div class="alert alert-danger">{{ Session::get('danger') }}</div>
     @endif
    <div class="Home-content container-fluid">
            <div class="left-element col-lg-8 col-md-12 col-sm-12 col-xs-12 wow slideInLeft">
                <div class="result">
                    <p>Jobs</p>
                </div>
                <div class="active_job">
                    <div class="row your-saved-jobs">
                        @foreach($company_jobs as $job)
                        <div class="left-result col-lg-2 col-md-2 col-sm-3 col-xs-12">
                            @if($company->logo && Storage::exists('public/'.$company->logo))
                                <img src="{{url(asset('storage/'.$company->logo))}}" alt="{{$company->name}}"  class="company1 img-responsive img-thumbnail">
                            @else
                                <img src="{{url(asset('storage/companies/default-logo.png'))}}" class="company1 img-responsive img-thumbnail">
                            @endif
                        </div>
                        <div class="right-result col-lg-10 col-md-10 col-sm-9 col-xs-12">
                            <div style="float: right">
                                {!! Form::open(['method'=>'post','action'=>'Candidate\CandidateSavedJobsController@store']) !!}
                                <input type="hidden" name="job_id" style="display: none" value="{{$job->id}}">
                                @if(!Auth::guard('candidate')->check())
                                    <button style="border: none;color: #5FC45B;background-color: transparent"><i class="fa fa-heart-o"></i></button>
                                @else
                                    @if(in_array($job->id,Auth::guard('candidate')->user()->saved_jobs->pluck('id')->toArray()))
                                        <button style="border: none;color: red;background-color: transparent"><i class="fa fa-heart"></i></button>
                                    @else
                                        <button style="border: none;color: #5FC45B;background-color: transparent"><i class="fa fa-heart-o"></i></button>
                                    @endif
                                @endif
                                {!! Form::close() !!}
                            </div>
                            <p class="job-name">
                                <a style="text-decoration: none" href="{{route('jobs.show',$job->slug)}}">
                                    {{$job->job_title}}
                                    @if(\Carbon\Carbon::parse($job->created_at)->diffInDays(\Carbon\Carbon::now()) < 3)
                                        <span class="new">New</span>
                                    @endif
                                </a>
                            </p>
                            <p class="company-name">
                                {{$job->company->name}}
                                @if($company->plan_id!=0)
                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                @endif
                                <span class="date"> {{\Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</span></p>
                            <div class="description">
                                <p>
                                    <span class="badge">{{$job->career_level?$job->career_level->name:''}}</span>
                                    <span class="badge">{{$job->start_years_of_experience}}{{$job->end_years_of_experience?'-'.$job->end_years_of_experience:'+'}}Yrs Of Exp </span>
                                    <span class="badge">{{$job->vacancies}} Vacancies</span>
                                   @foreach($job->job_tags as $tag)
                                       <span class="badge">{{$tag->name}}</span>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div><!--active job-->
            </div> <!--left element-->

            <!--right element-->
        @include('partials.company_related_jobs')
        </div><!--Home-content end-->
@stop
