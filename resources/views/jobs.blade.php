@extends('layouts.front')
@section('content')
    <div class="col-md-12">
        <div  id="searchBar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-lg-offset-1">
                        <div class="search-bar">
                            <div class="col-lg-10">
                                <input class="job" type="text" id="input1" placeholder=" &#xf0b1; Job Title , Keywords ,or Company">
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-success  search1"><i class="fa fa-search "></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @elseif(Session::has('danger'))
                        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                    @endif
                    @foreach($jobs as $job)
                        @if($job->company)
                            <div class="jobs-adv">
                                <div class="adv1">
                                    <div class="logo">
                                        <a href="{{route('companyProfile.home',$job->company->slug)}}">
                                            @if($job->company->logo && Storage::exists($job->company->logo))
                                                <img src="{{url(asset('storage/'.$job->company->logo))}}">
                                            @else
                                                <img src="{{url(asset('storage/companies/default-logo.png'))}}" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="information">
                                        <h1><a href="{{route('jobs.show',$job->slug)}}">{{$job->job_title}}</a></h1>
                                        <ul class="company-info">

                                            @if($job->hide_company == 1)
                                            <li>Confidential</li>
                                            @else
                                            <a href="{{route('companyProfile.home',$job->company->slug)}}"><li>{{$job->company->name}}</li></a>
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
                        {{$jobs->links()}}
                    </div>
                </div>
            </div>
        </div>


    </div>
@stop
