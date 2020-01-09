@extends('layouts.candidate')
@section('styles')
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css'>
@stop
@section('content')
    <div class="header">
        <div class="container">
            <div class="info1 wow fadeInDown">
         

                @if($candidate->avatar)
                    <img src="{{url(asset('avatars/'.$candidate->avatar))}}" class="img-responsive">
                @else
                    <img src="{{url(asset('avatars/'.$candidate->gender->name.'.png'))}}"  class="img-responsive" alt="">
                @endif

                <h3>{{$candidate->first_name}} {{$candidate->last_name}}  </h3>
                <p class="text-center job">{{$candidate->job_title}} </p>
                <button class="btn btn-primary"  type="button" data-toggle="modal" data-target="#exampleModal">Change Password</button>
            </div>
        </div>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @elseif(Session::has('danger'))
        <div class="alert alert-danger">{{ Session::get('danger') }}
        </div>
    @endif
    @if ($errors->has('password'))
          <div class="alert alert-danger">{{ $errors->first('password') }}</div>
    @endif
    <div class="container">
        <div class="profile">
            <div class="col-lg-12">
                {{--Personal Information --}}
                <div class="main-about wow zoomIn">
                    <div class="heading"><h4>Personal information</h4></div>
                    <!--Start edit-->
                    <div class="panel panel-default about-edit">
                        <div class="panel-heading">
                            <span class="toggle-info pull-right "> <i class="fa fa-pencil"></i></span>
                        </div>
                        <div class="panel-body">
                            {!! Form::model(Auth::guard('candidate')->user(),['method'=>'patch','action'=>['Candidate\UpdateCandidateProfileController@update',Auth::guard('candidate')->user()->slug],'files'=>true]) !!}
                            <label> First Name </label>
                            <input required class="form-control myinput" type="text" name="first_name" value="{{$candidate->first_name}}" />
                            @if ($errors->has('first_name'))
                                <div class="alert alert-danger">{{ $errors->first('first_name') }}</div>
                            @endif

                            <label> Last Name </label>
                            <input required class="form-control myinput" type="text" name="last_name" value="{{$candidate->last_name}}" />
                            @if ($errors->has('last_name'))
                                <div class="alert alert-danger">{{ $errors->first('last_name') }}</div>
                            @endif
                            <label> User name </label>
                            <input required class="form-control myinput" type="text" name="user_name" value="{{$candidate->user_name}}" />
                            @if ($errors->has('user_name'))
                                <div class="alert alert-danger">{{ $errors->first('user_name') }}</div>
                            @endif
                            <label> Email </label>
                            <input required class="form-control myinput" type="text" name="email" value="{{$candidate->email}}" />
                            @if ($errors->has('email'))
                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                            @endif
                            <label> Phone1 </label>
                            <input required class="form-control myinput" type="text" name="phone1" value="{{$candidate->phone1}}" />
                            @if ($errors->has('phone1'))
                                <div class="alert alert-danger">{{ $errors->first('phone1') }}</div>
                            @endif
                            <label> Phone2 </label>
                            <input  class="form-control myinput" type="text" name="phone2" value="{{$candidate->phone2}}" />
                            @if ($errors->has('phone2'))
                                <div class="alert alert-danger">{{ $errors->first('phone2') }}</div>
                            @endif
                            <label> Country </label>
                            <select required class="form-control" name="country_id" id="">
                                @foreach($countries as $country)
                                    <option {{$country->id==$candidate->country_id?'selected':''}} value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('country_id'))
                                <div class="alert alert-danger">{{ $errors->first('country_id') }}</div>
                            @endif
                            <label> City </label>
                            <select required class="form-control" name="city_id" >
                                @foreach($candidate->country->cities as $city)
                                    <option {{$city->id==$candidate->city_id?'selected':''}} value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('city_id'))
                                <div class="alert alert-danger">{{ $errors->first('city_id') }}</div>
                            @endif
                            <label> Address</label>
                            <input required class="form-control myinput" type="text" name="address" value="{{$candidate->address}}" />
                            @if ($errors->has('address'))
                                <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                            @endif
                            <label> Birth Date </label>
                            <input required class="form-control myinput" type="date" name="birth_date" value="{{$candidate->birth_date}}" />
                            @if ($errors->has('birth_date'))
                                <div class="alert alert-danger">{{ $errors->first('birth_date') }}</div>
                            @endif
                            <label> Gender </label>
                            <select class="form-control personal_select" name="gender_id">
                                @foreach($genders as $gender)
                                    <option {{$gender->id==$candidate->gender_id?'selected':''}} value="{{$gender->id}}">{{$gender->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('gender_id'))
                                <div class="alert alert-danger">{{ $errors->first('gender_id') }}</div>
                            @endif
                            <label> martial status </label>
                            <select name="martial_status_id" class="form-control personal_select">
                                @foreach($martial_statuses as $martial_status)
                                    <option {{$martial_status->id==$candidate->martial_status_id?'selected':''}} value="{{$martial_status->id}}">{{$martial_status->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('martial_status_id'))
                                <div class="alert alert-danger">{{ $errors->first('martial_status_id') }}</div>
                            @endif

                            <label>military state </label>
                            <select name="military_status_id" class="form-control personal_select">
                                @foreach($military_statuses as $military_status)
                                    <option {{$military_status->id==$candidate->military_status_id?'selected':''}}  value="{{$military_status->id}}">{{$military_status->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('military_status_id'))
                                <div class="alert alert-danger">{{ $errors->first('military_status_id') }}</div>
                            @endif
                            <label> Languages </label>
                            <select id="myselect" class="form-control" multiple="multiple" name="language[]">
                                @foreach($languages as $language)
                                    <option {{in_array($language->id,$candidate_languages)?'selected':''}} value="{{$language->id}}">{{$language->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('language.*'))
                                <div class="alert alert-danger">{{ $errors->first('language.*') }}</div>
                            @endif
                            <label> CV</label>
                            <input name="cv" type="file">
                            @if ($errors->has('cv'))
                                <div class="alert alert-danger">{{ $errors->first('cv') }}</div>
                            @endif
                            <label> avatar </label>
                            <input name="avatar" type="file">
                            @if ($errors->has('avatar'))
                                <div class="alert alert-danger">{{ $errors->first('avatar') }}</div>
                            @endif
                            <label> about me </label>
                            <textarea class="form-control" name="about_me"> {!! $candidate->about_me !!}</textarea>
                            @if ($errors->has('about_me'))
                                <div class="alert alert-danger">{{ $errors->first('about_me') }}</div>
                            @endif
                            <div class="buttons pull-right">
                                <input class="save" type="submit" value="Save Changes">
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!--end edit -->
                    <div class="about-body">
                        <p><strong>First Name</strong> {{$candidate->first_name}}</p>
                        @if ($errors->has('first_name'))
                            <div class="alert alert-danger">{{ $errors->first('first_name') }}</div>
                        @endif
                        <p><strong>last Name</strong> {{$candidate->last_name}}</p>
                        @if ($errors->has('last_name'))
                            <div class="alert alert-danger">{{ $errors->first('last_name') }}</div>
                        @endif
                        <p><strong>User Name</strong> {{$candidate->user_name}}</p>
                        @if ($errors->has('user_name'))
                            <div class="alert alert-danger">{{ $errors->first('user_name') }}</div>
                        @endif
                        <p><strong>Email Name</strong> {{$candidate->email}}</p>
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                        @endif
                        <p><strong>Phone number1</strong> {{$candidate->phone1}}</p>
                        @if ($errors->has('phone1'))
                            <div class="alert alert-danger">{{ $errors->first('phone1') }}</div>
                        @endif
                        <p><strong>Phone number2</strong> {{$candidate->phone2}}</p>
                        @if ($errors->has('phone2'))
                            <div class="alert alert-danger">{{ $errors->first('phone2') }}</div>
                        @endif
                        <p><strong>Country</strong> {{$candidate->country?$candidate->country->name:''}}</p>
                        @if ($errors->has('country_id'))
                            <div class="alert alert-danger">{{ $errors->first('country_id') }}</div>
                        @endif
                        <p><strong>City</strong> {{$candidate->city?$candidate->city->name:''}}</p>
                        @if ($errors->has('city_id'))
                            <div class="alert alert-danger">{{ $errors->first('city_id') }}</div>
                        @endif
                        <p><strong>Address</strong> {{$candidate->address}}</p>
                        @if ($errors->has('address'))
                            <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                        @endif
                        <p><strong>Birth Date</strong> {{$candidate->birth_date}}</p>
                        @if ($errors->has('birth_date'))
                            <div class="alert alert-danger">{{ $errors->first('birth_date') }}</div>
                        @endif
                            <p><strong>Gender</strong> {{$candidate->gender?$candidate->gender->name:''}}</p>
                        @if ($errors->has('gender_id'))
                            <div class="alert alert-danger">{{ $errors->first('gender_id') }}</div>
                        @endif
                            <p><strong>military status</strong> {{$candidate->military?$candidate->military->name:''}}</p>
                        @if ($errors->has('military_status_id'))
                            <div class="alert alert-danger">{{ $errors->first('military_status_id') }}</div>
                        @endif
                            <p><strong>martial status</strong> {{$candidate->Martial?$candidate->Martial->name:''}}</p>
                        @if ($errors->has('martial_status_id'))
                            <div class="alert alert-danger">{{ $errors->first('martial_status_id') }}</div>
                        @endif
                        <p><strong>languages</strong></p>
                            @foreach($candidate->languages as $language)
                                <span class="badge"> {{$language->name}}</span>
                            @endforeach
                        @if ($errors->has('language.*'))
                            <div class="alert alert-danger">{{ $errors->first('language.*') }}</div>
                        @endif
                        @if ($errors->has('language'))
                            <div class="alert alert-danger">{{ $errors->first('language') }}</div>
                        @endif
                            <p><strong>about me</strong> {!! $candidate->about_me !!}</p>
                        @if ($errors->has('about_me'))
                            <div class="alert alert-danger">{{ $errors->first('about_me') }}</div>
                        @endif
                        @if ($errors->has('cv'))
                            <div class="alert alert-danger">{{ $errors->first('cv') }}</div>
                        @endif
                        @if ($errors->has('avatar'))
                            <div class="alert alert-danger">{{ $errors->first('avatar') }}</div>
                        @endif
                    </div>
                </div>
                {{--Job Preference --}}
                <div class="main-about wow zoomIn">
                    <div class="heading"><h4>Job Preference</h4></div>
                    <!--Start edit-->
                    <div class="panel panel-default about-edit">
                        <div class="panel-heading">
                            <span class="toggle-info pull-right "> <i class="fa fa-pencil"></i></span>
                        </div>
                        <div class="panel-body">
                            {!! Form::model(Auth::guard('candidate')->user(),['method'=>'patch','action'=>['Candidate\UpdateCandidateProfileController@job_preference_update',Auth::guard('candidate')->user()->slug]]) !!}
                            <label> Job Title </label>
                            <input  class="form-control myinput" type="text" name="job_title" value="{{$candidate->job_title}}" />
                            @if ($errors->has('job_title'))
                                <div class="alert alert-danger">{{ $errors->first('job_title') }}</div>
                            @endif
                            <label> Current Salary </label>
                            <input  class="form-control myinput" type="number" name="current_salary" value="{{$candidate->current_salary}}" />
                            @if ($errors->has('current_salary'))
                                <div class="alert alert-danger">{{ $errors->first('current_salary') }}</div>
                            @endif
                            <label> Desired  Salary </label>
                            <input  class="form-control myinput" type="text" name="desired_salary" value="{{$candidate->desired_salary }}" />
                            @if ($errors->has('desired_salary '))
                                <div class="alert alert-danger">{{ $errors->first('desired_salary ') }}</div>
                            @endif
                            <label>Salary Types</label>
                            <select name="salary_type_id" id="" class="form-control">
                                @foreach($salary_types as $salary_type)
                                    <option {{$candidate->salary_type_id==$salary_type->id?'selected':''}} value="{{$salary_type->id}}">{{$salary_type->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('salary_type_id'))
                                <div class="alert alert-danger">{{ $errors->first('salary_type_id') }}</div>
                            @endif
                            <label>Currencies</label>
                            <select name="currency_id" id="" class="form-control">
                                @foreach($currencies as $currency)
                                    <option {{$candidate->currency_id==$currency->id?'selected':''}} value="{{$currency->id}}">{{$currency->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('currency_id'))
                                <div class="alert alert-danger">{{ $errors->first('currency_id') }}</div>
                            @endif

                            <label>Open For Jobs</label>
                            <select name="open_for_job_status_id" id="" class="form-control">
                                @foreach($open_for_job_statuses as $open_for_job_status)
                                    <option {{$candidate->open_for_job_status_id==$open_for_job_status->id?'selected':''}} value="{{$open_for_job_status->id}}">{{$open_for_job_status->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('open_for_job_status_id'))
                                <div class="alert alert-danger">{{ $errors->first('open_for_job_status_id') }}</div>
                            @endif
                            <label>Career Levels</label>
                            <select name="career_level_id" id="" class="form-control">
                                @foreach($career_levels as $career_level)
                                    <option {{$candidate->career_level_id==$career_level->id?'selected':''}} value="{{$career_level->id}}">{{$career_level->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('career_level_id'))
                                <div class="alert alert-danger">{{ $errors->first('career_level_id') }}</div>
                            @endif
                            <label>Experience Years</label>
                            <select name="years_of_experience_id" id="" class="form-control">
                                @foreach($experience_years as $experience_year)
                                    <option {{$candidate->years_of_experience_id==$experience_year->id?'selected':''}} value="{{$experience_year->id}}">{{$experience_year->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('years_of_experience_id'))
                                <div class="alert alert-danger">{{ $errors->first('years_of_experience_id') }}</div>
                            @endif
                            <div class="buttons pull-right">
                                <input class="save" type="submit" value="Save Changes">
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!--end edit -->
                    <div class="about-body">
                        <p><strong>Job Title</strong> {{$candidate->job_title}}</p>
                        @if ($errors->has('job_title'))
                            <div class="alert alert-danger">{{ $errors->first('job_title') }}</div>
                        @endif
                        <p><strong>Current Salary</strong> {{$candidate->current_salary}}</p>
                        @if ($errors->has('current_salary'))
                            <div class="alert alert-danger">{{ $errors->first('current_salary') }}</div>
                        @endif
                        <p><strong>Desired Salary</strong> {{$candidate->desired_salary}}</p>
                        @if ($errors->has('desired_salary'))
                            <div class="alert alert-danger">{{ $errors->first('desired_salary') }}</div>
                        @endif
                        <p><strong>Salary Type</strong> {{$candidate->salary_type?$candidate->salary_type->name:''}}</p>
                        @if ($errors->has('salary_type_id'))
                            <div class="alert alert-danger">{{ $errors->first('salary_type_id') }}</div>
                        @endif
                        <p><strong>Currency</strong> {{$candidate->currency?$candidate->currency->name:''}}</p>
                        @if ($errors->has('currency_id'))
                            <div class="alert alert-danger">{{ $errors->first('currency_id') }}</div>
                        @endif
                        <p><strong>Open For Jobs</strong> {{$candidate->open_for_job_status?$candidate->open_for_job_status->name:''}}</p>
                        @if ($errors->has('open_for_job_status_id'))
                            <div class="alert alert-danger">{{ $errors->first('open_for_job_status_id') }}</div>
                        @endif
                        <p><strong>Career Levels</strong> {{$candidate->career_level?$candidate->career_level->name:''}}</p>
                        @if ($errors->has('career_level_id'))
                            <div class="alert alert-danger">{{ $errors->first('career_level_id') }}</div>
                        @endif
                        <p><strong>Experience Years</strong> {{$candidate->years_of_experience?$candidate->years_of_experience->name:''}}</p>
                        @if ($errors->has('years_of_experience_id'))
                            <div class="alert alert-danger">{{ $errors->first('years_of_experience_id') }}</div>
                        @endif
                    </div>
                </div>

                <!--Start Experience -->
                <div class="main-experience wow zoomIn">
                    <div class="heading"><h4>Experience</h4>
                    </div>
                    @foreach($candidate->experiences as $experience)
                            <div class="experience-body">
                                <div class="company">
                                    <div class="panel panel-default about-edit">
                                        <div class="panel-heading">
                                            <span class="toggle-info pull-right "> <i class="fa fa-pencil"></i></span>
                                        </div>
                                        <div class="panel-body">
                                            <h3>Edit Experience</h3>
                                            {!! Form::model($experience,['method'=>'patch','action'=>['Candidate\UpdateCandidateProfileController@ExperienceUpdate',$experience->id]]) !!}
                                            <label>Job Title  </label>
                                            <input  class="form-control title" type="text" name="job_title" value="{{$experience->job_title}}" placeholder="{{$experience->job_title}}" />
                                            <label>Company Name  </label>
                                            <input  class="form-control myinput" type="text" name="company_name" value="{{$experience->company_name}}" placeholder="{{$experience->company_name}}" />
                                            <label>Company Location  </label>
                                            <input  class="form-control myinput" type="text" name="company_location"  value="{{$experience->company_location}}" placeholder="{{$experience->company_location}}" />
                                            <label>Salary</label>
                                            <input  class="form-control myinput" type="number" step=".01" name="salary" value="{{$experience->salary}}" placeholder="{{$experience->salary}}" />
                                            <label> Start Date </label>
                                            <input  class="form-control start" type="date" name="start_date"  value="{{$experience->start_date}}" placeholder="{{$experience->start_date}}"/>
                                            <label> End Date </label>
                                            <input  class="form-control   end" type="date" name="end_date"  value="{{$experience->end_date}}" placeholder="{{$experience->end_date}}" />
                                            @if($experience->current == 1)
                                                <input  class="check" type="checkbox" name="current" value="{{$experience->current}}" checked />  You Have Currently Work Hear ?? </br>
                                            @else
                                                <input  class="check" type="checkbox" name="current" value="{{$experience->current}}" />  You Have Currently Work Hear ?? </br>
                                            @endif
                                            <textarea   placeholder="{{$experience->job_description}}" value="{{$experience->job_description}}"  name="job_description" class="form-control description" cols="8" rows="5"></textarea>


                                            <div class="buttons pull-right">
                                                <input class="save" type="submit" value="SaveChanges">
                                                <a data-toggle="modal" class="btn btn-danger" data-target=".{{$experience['id'].'delete'}}" >Delete</a>
                                            </div>
                                            {!! Form::close() !!}
                                            <div class="modal fade {{$experience['id'].'delete'}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title mt-0" style="color: red">Do You Wanna Delete This Experience</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {!! Form::open(['method'=>'Delete','action'=>['Candidate\UpdateCandidateProfileController@destroy',$experience['id']]]) !!}
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                            <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div>
                                    </div>
                                    <!--End Edit -->
                                    <h4 class="mytitle">{{$experience->job_title}}</h4>
                                    <h5>From <span class="mystart"> {{$experience->start_date}}</span> To <span class="myend">{{$experience->current==1?'Current':$experience->end_date}}</span></h5>
                                    <p class="mydescription">{{$experience->company_name}}</p>

                                </div>
                            </div>
                    @endforeach

                    {!! Form::open(['method'=>'post','action'=>'Candidate\UpdateCandidateProfileController@add_experience']) !!}
                    <div id="multiple_items">
                    </div>
                    <div id="submit_button">
                    </div>
                    {!! Form::close() !!}
                    <div class="form-control">
                                <div class="col-md-12">
                                    <div id="add">
                                        <label class="control-label col-md-12 additional-experiece">Add New Experience <i class="fa fa-plus"></i> </label>
                                    </div>
                                </div>
                            </div>
                            <!--End Adding New  Experience -->
                        </div>
            </div>





                {{--  education --}}
                <div class="main-experience wow zoomIn">
                    <div class="heading"><h4>Education</h4></div>

                    <div class="experience-body">
                        <div class="company">
                            <!--Start Edit -->
                            <div class="panel panel-default about-edit">
                                <div class="panel-heading">

                                    <span class="toggle-info pull-right "> <i class="fa fa-pencil"></i></span>
                                </div>
                                <div class="panel-body">


                                    {!! Form::model(Auth::guard('candidate')->user(),['method'=>'patch','action'=>['Candidate\UpdateCandidateProfileController@EducationUpdate',Auth::guard('candidate')->user()->slug],'files'=>true]) !!}
                                    <label>university  </label>

                                    <input  class="form-control" type="text"   name="university"   value="{{$candidate->university}}"  placeholder="{{$candidate->university}}" />
                                    @if ($errors->has('university'))
                                        <div class="alert alert-danger">{{ $errors->first('university') }}</div>
                                    @endif
                                    <label>faculty </label>
                                    <input  class="form-control" type="text"   name="faculty"   value="{{$candidate->faculty}}"  placeholder="{{$candidate->faculty}}" />
                                    @if ($errors->has('faculty'))
                                        <div class="alert alert-danger">{{ $errors->first('faculty') }}</div>
                                    @endif
                                    <label>major </label>
                                    <input  class="form-control" type="text"   name="major"   value="{{$candidate->major}}"  placeholder="{{$candidate->major}}" />
                                    @if ($errors->has('major'))
                                        <div class="alert alert-danger">{{ $errors->first('major') }}</div>
                                    @endif
                                    <label>degree </label>
                                    <input  class="form-control" type="text"   name="degree"   value="{{$candidate->degree}}"  placeholder="{{$candidate->degree}}" />
                                    @if ($errors->has('degree'))
                                        <div class="alert alert-danger">{{ $errors->first('degree') }}</div>
                                    @endif


                                    <label>Start Date </label>
                                    <input  class="form-control" type="date" name="university_start_date" value="{{$candidate->university_start_date}}"/>
                                    @if ($errors->has('university_start_date'))
                                        <div class="alert alert-danger">{{ $errors->first('university_start_date') }}</div>
                                    @endif
                                    <label>End Date </label>
                                    <input  class="form-control" type="date" name="university_end_date" value="{{$candidate->university_end_date}}" />
                                    @if ($errors->has('university_end_date'))
                                        <div class="alert alert-danger">{{ $errors->first('university_end_date') }}</div>
                                    @endif




                                    <div class="buttons pull-right">
                                        <input class="save" type="submit" value="SaveChanges">
                                    </div>
                                    {!! Form::close() !!}

                                </div>

                            </div>
                            <!--End Edit -->
                            <!-- <h4 class="mytitle">{{$candidate->university}}</h4>
                            <h4 class="mydescription">{{$candidate->faculty}}</h4>
                            <h4 class="mydescription">{{$candidate->major}}</h4>
                             -->

                            <p><strong> University</strong> {{$candidate->university}}</p>
                            <p><strong> Faculty</strong> {{$candidate->faculty}}</p>
                            <p><strong> Major</strong> {{$candidate->major}}</p>
                            <p><strong> Degree</strong> {{$candidate->degree}}</p>
                            <h5>{{$candidate->university_start_date?'From':''}} <span class="mystart"> {{$candidate->university_start_date}}</span> {{$candidate->university_end_date?'To':''}}<span class="myend">{{$candidate->university_end_date}}</span></h5>                    

                        </div>
                    </div>
                </div>

            {!! Form::model(Auth::guard('candidate')->user(),['method'=>'patch','action'=>['Candidate\UpdateCandidateProfileController@jobIndustryJobTagsUpdate',Auth::guard('candidate')->user()->slug],'files'=>true]) !!}
            <div class="main-about wow zoomIn">

                <div class="heading"><h4>Job Industries</h4></div>
                <!--Start edit-->
                <div class="panel panel-default about-edit">
                    <select class="label ui selection fluid dropdown form-control" name="job_industries[]" onchange="job_industries()" id="job-industries" multiple="multiple" style="width: 100%">
                        @foreach($job_industries as $job_industry)
                            <option {{in_array($job_industry->id,$candidate_job_industries)?'selected':''}} value="{{$job_industry->id}}">{{$job_industry->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('job_industries.*'))
                          <div class="alert alert-danger">{{ $errors->first('job_industries.*') }}</div>
                    @endif
                    @if ($errors->has('job_industries'))
                          <div class="alert alert-danger">{{ $errors->first('job_industries') }}</div>
                    @endif

                </div>

                <div class="heading"><h4>Job Industries Tags</h4></div>
                <!--Start edit-->
                <div class="panel panel-default about-edit">
                    <select class="label ui selection fluid dropdown form-control" name="job_industries_tags[]" multiple="multiple" style="width: 100%">
                        @foreach(Auth::guard('candidate')->user()->candidate_job_industries as $candidate_job_industry )
                            @foreach(industry_tags($candidate_job_industry->id) as $tag)
                                <option {{in_array($tag->id,$candidate_job_industries_tags)?'selected':''}} value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                    @if ($errors->has('job_industries_tags'))
                        <div class="alert alert-danger">{{ $errors->first('job_industries_tags') }}</div>
                    @endif
                    @if ($errors->has('job_industries_tags.*'))
                        <div class="alert alert-danger">{{ $errors->first('job_industries_tags.*') }}</div>
                    @endif
                </div>
                <div class="buttons pull-right wow fadeInUp">
                    <input class="save" type="submit" value="Save Changes">
                </div>

            </div><!--profile end-->
            <!--end edit -->
            {!! Form::close() !!}



            </div>

        </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            {!! Form::open(['method'=>'post','action'=>['Candidate\UpdateCandidateProfileController@change_password']]) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                      {!! Form::label('','Old Password') !!}
                      {!! Form::password('old_password',null,['class'=>'form-control','required']) !!}
                  </div>
                    <div class="form-group">
                        {!! Form::label('','New Password') !!}
                        {!! Form::password('password',null,['class'=>'form-control','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('','Confirm Password') !!}
                        {!! Form::password('password_confirmation',null,['class'=>'form-control','required']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop




@section('scripts')
    <script
            src="{{asset('front_assets/js/custom-work-jquery.js')}}">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js'></script>
    <script  src="{{asset('companies_assets/js/multi-select-script.js')}}"></script>
    {{--Ajax request for Cities on countries --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="country_id"]').on('change', function() {
                var country_id = $(this).val();
                if(country_id) {
                    $.ajax({
                        url: window.location.origin+'/cities/ajax/'+country_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="city_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="city_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="city_id"]').empty();
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var i=1;
            $('#add').click(function(){
                i++;
                if(i<3){
                    $('#submit_button').append('<div><button class="btn btn-success">Add Experience</button> </div>');
                }

                $('#multiple_items').append('\n' +
                    '                                <div id="'+i+'" class="all_skills col-md-12">\n' +
                    '                                    <div class="all_skills_content">\n' +
                    '                                        <div class="form-conrol">\n' +
                    '                                            <label class="control-label col-md-3"> Job Title <i class="fa fa-university"></i> </label>\n' +
                    '                                            <div class="col-md-7">\n' +
                    '                                                <input type="text" name="job_title[]" class="form-control" placeholder="Job Title">\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                        <div class="form-conrol">\n' +
                    '                                            <label class="control-label col-md-3">Company Name<i class="fa fa-university"></i> </label>\n' +
                    '                                            <div class="col-md-7">\n' +
                    '                                                <input type="text" name="company_name[]" class="form-control" placeholder="Company Name">\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                        <div class="form-conrol">\n' +
                    '                                                <label class="control-label col-md-3">Company Location<i class="fa fa-university"></i> </label>\n' +
                    '                                                <div class="col-md-7">\n' +
                    '                                                    <input type="text" name="company_location[]" class="form-control" placeholder="Company Location">\n' +
                    '                                                </div>\n' +
                    '                                            </div>'+
                    '                                        <div class="form-conrol">\n' +
                    '                                            <label class="control-label col-md-3">Salary <i class="fa fa-graduation-cap"></i>  </label>\n' +
                    '                                            <div class="col-md-7">\n' +
                    '                                                <input type="number" name="salary[]" class="form-control" step=".01" placeholder="Ex: 2000">\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                        <div class="form-conrol">\n' +
                    '                                            <label class="control-label col-md-3">Start Date <i class="fa fa-calendar" aria-hidden="true"></i>  </label>\n' +
                    '                                            <div class="col-md-7">\n' +
                    '                                                <input type="date" name="start_date[]" class="form-control">\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                        <div id="end" class="form-conrol">\n' +
                    '                                            <label class="control-label col-md-3">End Date <i class="fa fa-calendar" aria-hidden="true"></i>  </label>\n' +
                    '                                            <div class="col-md-7">\n' +
                    '                                                <input type="date" name="end_date[]" class="form-control">\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                        <div id="end" class="form-conrol">\n' +
                    '                                                <label class="control-label col-md-3">Job Description <i class="fa fa-calendar" aria-hidden="true"></i>  </label>\n' +
                    '                                                <div class="col-md-7">\n' +
                    '                                                    <textarea type="text" name="job_description[]" class="form-control"></textarea>\n' +
                    '                                                </div>\n' +
                    '                                            </div>'+
                    '                                         <div id="end" class="form-conrol">\n' +
                    '                                            <label class="control-label col-md-3">Current <i class="fa fa-calendar" aria-hidden="true"></i>  </label>\n' +
                    '                                                <div class=\'col-md-1\'><input type=\'checkbox\' id=\'check22\' name=\'current[]\' >\n' +
                    '                                                </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div><!--/.all_skills_content-->\n' +
                    '                                     <div> ' +
                    '<button id="'+i+'" class="btn_remove col-md-2 pull-right">Remove</button> </div>'+
                    '                                </div> ');
                $('.no-records-found').remove();
            });


        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#'+button_id+'').remove();

            if(button_id<3){
                $('#submit_button').remove();
            }
        });
    </script>
    <script>
        $("form").submit(function () {
            var this_master = $(this);
            this_master.find('input[type="checkbox"]').each( function () {
                var checkbox_this = $(this);


                if( checkbox_this.is(":checked") == true ) {
                    checkbox_this.attr('value','1');
                } else {
                    checkbox_this.prop('checked',true);
                    //DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA
                    checkbox_this.attr('value','0');
                }
            })
        })
    </script>
    <script>
        function job_industries() {
            var industries = $('#job-industries').val();
            if(industries) {
                $.ajax({
                    url: window.location.origin+'/industries/tags/'+JSON.stringify(industries),
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="job_industries_tags[]"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="job_industries_tags[]"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="job_industries_tags[]"]').empty();
            }
        }
    </script>
@stop
