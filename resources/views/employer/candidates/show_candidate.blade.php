@extends('layouts.companies')
@section('content')
    <div class="right_col" role="main">
        <!-- <div class="row company-info">
            <div class="container">
                <div class="up-title">
                    <img class="company-icon wow fadeInDown" src="http://www.newlifehr.com/companies_assets/images/letter.png" style="visibility: visible; animation-name: fadeInDown;">
                    <span class="wow fadeInDown">Dashboard</span>
                </div>

            </div>
        </div> -->
        <!--inner_content-->
        <div class="inner_content col-lg-12">
            <div class="left_side">
                <div class="content-part1">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-content-col">
                        <div class="menu_tab col-lg-12 col-md-12">

                            <div class="cover-letter">
                                <div class="container">
                                    <div class="col-md-12">
                                        <div class="leter">
                                            <div class="navigation-bar wow fadeInDown">
                                                <div class="image">
                                                    @if($candidate->avatar && Storage::exists($candidate->avatar))
                                                        <img src="{{url(asset('storage/'.$candidate->avatar))}}" class="img-responsive">
                                                    @else
                                                        <img src="{{url(asset('storage/'.gender_image($candidate->gender_id)))}}"  class="img-responsive" alt="">
                                                    @endif
                                                </div>  
                                                <div class="head-info">
                                                    <h1>{{$candidate->first_name.' '.$candidate->last_name}}</h1>
                                                    <p>{{$candidate->job_title}} </p>
                                                    <p>{{$candidate->career_level?$candidate->career_level->name:''}} -  {{$candidate->years_of_experience?$candidate->years_of_experience->name:''}}</p>
                                                    <p>{{$candidate->phone1}} {{$candidate->phone2?' - '.$candidate->phone2:''}}                            </p>
                                                    <p>{{$candidate->country?$candidate->country->name:''}} {{$candidate->city?' - '.$candidate->city->name:''}}</p>
                                                </div>

                                                <div class="download">
                                                @if($candidate->cv && file_exists(public_path().'/cvs/'.$candidate->cv))
                                                    <a href="{{route('employer.cv.download',$job_applicant->id)}}" class="btn btn-primary">
                                                        Download CV 
                                                    </a>
                                                @endif
                                                </div>


                                            </div>
                                            <div class="personal-data">

                                                <div class="about wow fadeInRight" >
                                                    <h2>About Me </h2>
                                                    <p>{!! $candidate->about_me !!} </p>
                                                </div>

                                                <div class="education wow fadeInRight">
                                                    <h2>My Education  </h2>
                                                    <ul>
                                                        <li>
                                                            <h5>From : <span style="color: #6E6F71"> {{$candidate->university_start_date}} </span></h5>
                                                            <h5>To  : <span style="color: #6E6F71"> {{$candidate->university_end_date}} </span></h5>
                                                            <h5>University  : <span style="color: #6E6F71"> {{$candidate->university}} </span></h5>
                                                            <h5>Faculty  : <span style="color: #6E6F71"> {{$candidate->faculty}} </span></h5>
                                                            <h5>Major  : <span style="color: #6E6F71"> {{$candidate->major}} </span></h5>
                                                            <h5>Major  : <span style="color: #6E6F71"> {{$candidate->major}} </span></h5>
                                                            <h5>Degree  : <span style="color: #6E6F71"> {{$candidate->degree}} </span></h5>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="skills wow fadeInRight">
                                                    <h2>Skills </h2>
                                                    <div class="skill">
                                                        <ul>
                                                            @foreach($candidate->candidate_job_industries_tags as $tag)
                                                            <li>{{$tag->name}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="experience wow fadeInRight">
                                                    <h2>My Experience </h2>
                                                    <ul>
                                                        @foreach($candidate->experiences as $experience)
                                                        <li>
                                                            <h6>Title: {{$experience->job_title}}</h6>
                                                            <h5>Company: {{$experience->company_name}}</h5>
                                                            <h5>Salary: {{$experience->salary}}</h5>
                                                            <h4>
                                                                @if($experience->current==1)
                                                                    {{$experience->start_date?Carbon\Carbon::parse($experience->start_date)->format('M Y'):''}} – Current
                                                                    @if($experience->start_date)
                                                                        {{Carbon\Carbon::createFromDate($experience->start_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days')}}
                                                                    @endif
                                                                @else
                                                                    {{$experience->start_date?Carbon\Carbon::parse($experience->start_date)->format('M Y'):''}} –   {{$experience->end_date?Carbon\Carbon::parse($experience->end_date)->format('M Y'):''}}
                                                                    @if($experience->start_date && $experience->start_date)
                                                                        {{Carbon\Carbon::createFromDate($experience->start_date)->diff(\Carbon\Carbon::parse($experience->end_date))->format('%y years, %m months and %d days')}}
                                                                    @endif
                                                                @endif
                                                            </h4>
                                                            <ul class="responsibility">
                                                                <li class="responsibility-head">Job Description: {{$experience->job_description}}</li>
                                                            </ul>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>

                                                <div class="languages wow fadeInRight">
                                                    <h2>Languages </h2>
                                                    <div class="language">
                                                        <ul>
                                                            @foreach($candidate->languages as $language)
                                                            <li>{{$language->name}} </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div style="float: right;padding-top: 20px;">
                                                    <a href="{{route('employer.candidate.status', [$job_applicant->id, 3])}}" class="btn btn-{{($job_applicant->job_application_status_id == 3) ? 'success'  :'default'}} "> Accepted</a>
                                                    
                                                    <a href="{{route('employer.candidate.status', [$job_applicant->id, 2])}}" class="btn btn-{{($job_applicant->job_application_status_id == 2) ? 'warning'  :'default'}} "> Shortlisted</a>

                                                    <a href="{{route('employer.candidate.status', [$job_applicant->id, 4])}}" class="btn btn-{{($job_applicant->job_application_status_id == 4) ? 'danger'  :'default'}} "> Rejected</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!--menu_tab end-->

                    </div><!--right-content-col-->

                </div>
            </div><!--left_side end-->
        </div>
    </div>


@stop
