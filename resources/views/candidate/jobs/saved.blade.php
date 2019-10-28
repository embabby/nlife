@extends('layouts.candidate')
@section('content')
    @include('partials.candidate_search_bar')


    <div class="jobs">
        <h2>Saved Jobs</h2>

         @if (Session::has('success'))
             <div class="alert alert-success">{{ Session::get('success') }}</div>
         @elseif(Session::has('danger'))
             <div class="alert alert-danger">{{ Session::get('danger') }}</div>
         @endif
        <div class="row">
            <div class="container">
                <div class="col-md-12 all_jobs wow fadeInRight">

                    @foreach($saved_jobs as $job)
                        @if($job->job)
                            @if($job->job->company)
                            <div class="jobs-adv">
                                <div class="adv1">
                                        <a href="{{route('companyProfile.home',$job->job->company->slug)}}">
                                            <div class="logo">
                                                @if($job->job->company->logo && Storage::exists($job->job->company->logo))
                                                    <img src="{{url(asset('storage/'.$job->job->company->logo))}}" alt="{{$job->job->company->name}}">
                                                @else
                                                    <img src="{{url(asset('storage/companies/default-logo.png'))}}" alt="">
                                                @endif
                                            </div>
                                        </a>
                                    <div class="information">
                                        <h1><a href="{{route('jobs.show',$job->job->slug)}}">{{$job->job->job_title}}</a></h1>
                                        <ul class="company-info">
                                            @if($job->job->hide_company==1)
                                            <li> {{'Confidential'}} </li>
                                            @else
                                            <li><a href="{{route('companyProfile.home',$job->job->company->slug)}}">{{$job->job->company->name}}</a></li>
                                            @endif
                                            

                                            <li> {{$job->job->vacancies}} Vacancies</li>
                                            <li >{{$job->job->start_years_of_experience}}{{$job->job->end_years_of_experience?'-'.$job->job->end_years_of_experience:'+'}}Yrs Of Exp </li>
                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{$job->job->city?$job->job->city->name:''}}</li>
                                            <li>{{\Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</li>
                                        </ul>
                                        <ul class="skills2">
                                            @foreach($job->job->job_tags as $tag)
                                                <li>{{$tag->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                        <div class="like pull-right">
                                            {!! Form::open(['method'=>'post','action'=>'Candidate\CandidateSavedJobsController@store']) !!}
                                            <input type="hidden" name="job_id" style="display: none" value="{{$job->job->id}}">
                                            <button style="border: none;color: red;background-color: transparent"><i class="fa fa-heart"></i></button>
                                            {!! Form::close() !!}
                                        </div>
                                </div>
                            </div>
                            @endif
                        @endif
                    @endforeach

                    <div class=" col-lg-12 pag_number wow fadeInUp ">
                        {{$saved_jobs->links()}}
                    </div>


                </div>
            </div>
        </div>
    </div>
@stop
