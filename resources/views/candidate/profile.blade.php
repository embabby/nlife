@extends('layouts.candidate')
@section('content')

    <div class="cover-letter">
        <div class="container">
            <div class="col-md-12">
                <div class="leter">
                    <div class="navigation-bar wow fadeInDown">
                        <div class="image">
                            @if($candidate->avatar && Storage::exists($candidate->avatar))
                                <img src="{{url(asset('avatars/'.$candidate->avatar))}}" class="img-responsive">
                            @else
                                <img src="{{url(asset('avatars/'.$candidate->gender->name.'.png'))}}"  class="img-responsive" alt="">
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
                            @if(isset($candidate->cv))
                            <a href="{{route('candidate.download_cv')}}" class="btn btn-primary">Download Your CV </a>
                            @else                            
                            <a href="{{route('candidate.create_cv')}}" class="btn btn-info">Create Your CV </a>                        
                             <form action="{{route('candidate.upload_cv')}}" method="POST" enctype="multipart/form-data" id="upload_cv_form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <label for="upload_cv" class="btn btn-default">Upload Your CV</label>
                                <input type="file" id="upload_cv" name="cv" class="hide" accept="application/pdf">
                            </form>
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
                                    <h5>Degree  : <span style="color: #6E6F71"> {{$candidate->degree}} </span></h5>
                                </li>
                            </ul>

                        </div>

                        <div class="skills wow fadeInRight">
                            <h2>Skills/Job Industry Tags </h2>
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

                        <div class="education wow fadeInRight">
                            <h2>Personal Information</h2>
                            <ul>
                                <li>
                                    <h5>Country : <span style="color: #6E6F71"> {{$candidate->country?$candidate->country->name:''}} </span></h5>
                                    <h5>City  : <span style="color: #6E6F71"> {{$candidate->city?$candidate->city->name:''}} </span></h5>
                                    <h5>Address  : <span style="color: #6E6F71"> {{$candidate->address}} </span></h5>

                                    @if(isset($candidate->birth_date))
                                    <h5>Age  : <span style="color: #6E6F71">{{\Carbon\Carbon::parse($candidate->birth_date)->age}}Y</span></h5>
                                    @endif
                                    <h5>Gender  : <span style="color: #6E6F71"> {{$candidate->gender->name}} </span></h5>
                                    <h5>Major  : <span style="color: #6E6F71"> {{$candidate->major}} </span></h5>
                                    <h5>Degree  : <span style="color: #6E6F71"> {{$candidate->degree}} </span></h5>
                                    <h5>Martial Status  : <span style="color: #6E6F71"> {{$candidate->Martial?$candidate->Martial->name:''}} </span></h5>
                                    <h5>Military Status  : <span style="color: #6E6F71"> {{$candidate->military?$candidate->military->name:''}} </span></h5>
                                </li>
                            </ul>
                        </div>
                        <div class="education wow fadeInRight">
                            <h2>Job Preference</h2>
                            <ul>
                                <li>
                                    <h5>Open For Jobs : <span style="color: #6E6F71">{{$candidate->open_for_job_status?$candidate->open_for_job_status->name:''}}</span></h5>
                                    <h5>Current Salary  : <span style="color: #6E6F71"> {{$candidate->current_salary}} </span></h5>
                                    <h5>Desired Salary  : <span style="color: #6E6F71"> {{$candidate->desired_salary}} </span></h5>
                                    <h5>Salary Type  : <span style="color: #6E6F71"> {{$candidate->salary_type?$candidate->salary_type->name:''}} </span></h5>
                                    <h5>Currency  : <span style="color: #6E6F71"> {{$candidate->currency?$candidate->currency->name:''}}</span></h5>
                                    <h5>Career Level  : <span style="color: #6E6F71"> {{$candidate->career_level?$candidate->career_level->name:''}} </span></h5>
                                    <h5>Experience Years : <span style="color: #6E6F71"> {{$candidate->years_of_experience?$candidate->years_of_experience->name:''}} </span></h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
