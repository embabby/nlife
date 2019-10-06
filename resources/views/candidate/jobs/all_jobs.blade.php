@extends('layouts.candidate')
@section('content')
 @include('partials.candidate_search_bar')
    <!--Left Filter Jobs -->
    <div class="jobs">
        <div class="row">
            <div class="container">
                <div class="col-md-3">
                    <div class="filter filter_job wow fadeInLeft">
                        <form>
                            <button class="btn btn-default">Clear Filters</button>
                            <div class="panel panel-success">
                                <div class="panel-heading filter-heading">
                                    Country
                                    <span class="toggle-info pull-right">
                                        <img src="{{asset('front_assets/images/arrows/top.png')}}" alt="top">
                                    </span>
                                </div>
                                <div class="panel-body">
                                    @foreach($countries as $country)
                                        <input type="checkbox" name="location1" >{{$country->name}}<span>({{$country->jobs->count()}})</span><br>
                                    @endforeach

                                </div>
                            </div>
                            <div class="panel panel-success">
                                <div class="panel-heading filter-heading">
                                    City
                                    <span class="toggle-info pull-right">
                                        <img src="{{asset('front_assets/images/arrows/top.png')}}" alt="top">
                                    </span>
                                </div>
                                <div class="panel-body">
                                    @foreach($cities as $city)
                                        <input type="checkbox" name="location1" >{{$city->name}}<span>({{$city->jobs->count()}})</span><br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="panel panel-success">
                                <div class="panel-heading filter-heading">
                                    Job Industry
                                    <span class="toggle-info pull-right">
                                        <img src="{{asset('front_assets/images/arrows/top.png')}}" alt="top">
                                    </span>
                                </div>
                                <div class="panel-body">
                                    @foreach($job_industries as $job_industry)
                                        <input type="checkbox" name="cat1" >{{$job_industry->name}}<span> ({{$job_industry->jobs->count()}})</span><br>
                                    @endforeach
                                </div>
                            </div>

                            <div class="panel panel-success">
                                <div class="panel-heading filter-heading">
                                    Experience Level
                                    <span class="toggle-info pull-right">
                                        <img src="{{asset('front_assets/images/arrows/top.png')}}" alt="top">
                                    </span>
                                </div>
                                <div class="panel-body">
                                    @foreach($career_levels as $career_level)
                                        <input type="checkbox" name="junior" >{{$career_level->name}}<span> ({{$career_level->jobs->count()}})</span><br>
                                    @endforeach

                                </div>
                            </div>

                            <div class="panel panel-success">
                                <div class="panel-heading filter-heading">
                                    Job Type
                                    <span class="toggle-info pull-right">
                                        <img src="{{asset('front_assets/images/arrows/top.png')}}" alt="top">
                                    </span>
                                </div>
                                <div class="panel-body">
                                    @foreach($job_types as $job_type)
                                        <input type="checkbox" name="junior" >{{$job_type->name}}<span> ({{$job_type->jobs->count()}})</span><br>
                                    @endforeach

                                </div>
                            </div>
                            <input type="submit" class="btn btn-success sub_filter" value="Submit">
                        </form>
                    </div>

                </div>
                <div class="col-md-9 all_jobs wow fadeInRight">

                    @foreach($jobs as $job)
                        @if($job->company)
                        <div class="jobs-adv">
                            <div class="adv1">
                                <div class="logo">
                                    @if($job->company->logo && Storage::exists($job->company->logo))
                                        <img src="{{url(asset('storage/'.$job->company->logo))}}" alt="{{$job->company->name}}">
                                    @else
                                        <img src="{{url(asset('storage/companies/default-logo.png'))}}" alt="">
                                    @endif
                                </div>
                                <div class="information">
                                    <h1><a href="{{route('jobs.show',$job->slug)}}">{{$job->job_title}}</a></h1>
                                    <ul class="company-info">
                                        <li>{{$job->company->name}}</li>
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
                        {{$jobs->links()}}
                    </div>


                </div>
            </div>
        </div>


    </div>
@stop
