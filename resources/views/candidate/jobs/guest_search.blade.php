@extends('layouts.front')
@section('content')
@include('partials.candidate_search_bar')
    <div class="jobs">
        <h2>Search Results</h2>
         @if (Session::has('success'))
             <div class="alert alert-success">{{ Session::get('success') }}</div>
         @elseif(Session::has('danger'))
             <div class="alert alert-danger">{{ Session::get('danger') }}</div>
         @endif

        <div class="row">
            <div class="container">
                <div class="col-md-12 all_jobs wow fadeInRight">

                    @foreach($searched_jobs as $job)
                        @if($job->company)
                            <div class="jobs-adv">
                                <div class="adv1">
                                        <a href="{{route('companyProfile.home',$job->company->slug)}}">
                                            <div class="logo">
                                                @if($job->company->logo && Storage::exists($job->company->logo))
                                                    <img src="{{url(asset('storage/'.$job->company->logo))}}" alt="{{$job->company->name}}">
                                                @else
                                                    <img src="{{url(asset('storage/companies/default-logo.png'))}}">
                                                @endif
                                            </div>
                                        </a>
                                    <div class="information">
                                        <h1><a href="{{route('jobs.show',$job->slug)}}">{{$job->job_title}}</a></h1>
                                        <ul class="company-info">
                                            @if($job->hide_company==1)
                                            <li> {{'Confidential'}} </li>
                                            @else
                                            <li><a href="{{route('companyProfile.home',$job->company->slug)}}">{{$job->company->name}}</a></li>
                                            @endif
                                            <li> {{$job->vacancies}} Vacancies</li>
                                            <li >{{$job->start_years_of_experience}}{{$job->end_years_of_experience?'-'.$job->end_years_of_experience:'+'}}Yrs Of Exp </li>
                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{$job->city?$job->city->name:''}}</li>
                                            <li>{{\Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</li>
                                            
                                        </ul>
                                        <ul class="skills2">
                                            @foreach($job->job_tags as $tag)
                                                <li>{{$tag->name}}</li>
                                            @endforeach
                                        </ul>

                                    </div>
                                      
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div class=" col-lg-12 pag_number wow fadeInUp ">
                        <!-- {{$searched_jobs->links()}} -->
                         {{ $searched_jobs->appends(\App\Helpers\AppHelper::getRequestBetweenPages())->links() }} 
                    </div>


                </div>
            </div>
        </div>
    </div>
@stop


