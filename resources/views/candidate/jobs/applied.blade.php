@extends('layouts.candidate')
@section('content')
   @include('partials.candidate_search_bar')
    <div class="jobs">
        <h2>Applied Jobs</h2>
        <div class="row">
            <div class="container">
                <div class="col-md-12 all_jobs wow fadeInRight">

                    @foreach($applied_jobs as $job)
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
                                        <li><i class="badge">{{candidate_job_status($job->job_id,$candidate->id)}}</i></li>
                                    </ul>
                                    <ul class="skills2">
                                        @foreach($job->job->job_tags as $tag)
                                            <li>{{$tag->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                            @endif
                        @endif
                    @endforeach
                    <div class=" col-lg-12 pag_number wow fadeInUp ">
                        {{$applied_jobs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
