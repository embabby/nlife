@extends('layouts.front')
@section('content')

    <div class="skills">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="skills_page">
                        <div class="col-lg-12">
                            <div class="skills_icons">
                                <ul>
                                    <li><a href="#" class="num6 wow fadeInDown" ><img src="{{asset('front_assets/images/think.png')}}"></a></li>
                                    <li><a href="#" class="num9 wow fadeInDown"><img src="{{asset('front_assets/images/exper2.png')}}"></a> </li>
                                    <li><a href="#" class="num7 wow fadeInDown"><img src="{{asset('front_assets/images/3.png')}}"></a> </li>
                                    <li><a href="#" class="num8 wow fadeInDown"> <img src="{{asset('front_assets/images/5.png')}}"></a> </li>
                                </ul>
                            </div><!--/.skills_icons-->
                        </div>

                        <div class="col-lg-12">
                            <div class="skills_content">
                                <div class="skills_title">
                                    <div class="title  wow fadeInDown"><h1 class="text-center">Personal Information</h1></div>
                                </div>
                                {!! Form::open(['method'=>'post','action'=>'CandidateAuth\CandidateCompleteRegister@post_register_personal_information','files'=>true]) !!}
                                <div class="all_skills">
                                    <div class="row wow fadeIn" data-wow-duration="2s">
                                        <!--Start Job title -->
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3">Country
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            </label>
                                            <div class="col-md-8">
                                                <select  class="form-control" name="country_id" id="">
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('country_id'))
                                                      <div class="alert alert-danger">{{ $errors->first('country_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <!--Start Job title -->
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3">City
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            </label>
                                            <div class="col-md-8">
                                                <select  class="form-control" name="city_id" >
                                                    @foreach($countries->first()->cities as $city)
                                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('city_id'))
                                                    <div class="alert alert-danger">{{ $errors->first('city_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <!--End Job title -->

                                        <!--Start Job title -->
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3"> Address
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            </label>
                                            <div class="col-md-8">
                                                {!! Form::text('address',null,['class'=>'form-control','placeholder'=>'Enter Your address Here']) !!}
                                            </div>
                                        </div>
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3">Years Of Experience
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            </label>
                                            <div class="col-md-8">
                                                <select  class="form-control" name="years_of_experience_id" id="">
                                                    @foreach($years_of_experiences as $years_of_experience)
                                                        <option value="{{$years_of_experience->id}}">{{$years_of_experience->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('years_of_experience_id'))
                                                      <div class="alert alert-danger">{{ $errors->first('years_of_experience_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3">Mobile Number
                                                <i class="fa fa-mobile" aria-hidden="true"> </i>
                                            </label>
                                            <div class="col-md-8">
                                                {!! Form::tel('phone1',Auth::guard('candidate')->user()->phone1,['class'=>'form-control']) !!}
                                                @if ($errors->has('phone1'))
                                                    <div class="alert alert-danger">{{ $errors->first('phone1') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3">Mobile Number+
                                                <i class="fa fa-mobile" aria-hidden="true"> </i>
                                            </label>
                                            <div class="col-md-8">
                                                {!! Form::tel('phone2',null,['class'=>'form-control']) !!}
                                                @if ($errors->has('phone2'))
                                                    <div class="alert alert-danger">{{ $errors->first('phone2') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <!--Start Job title -->
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3">Date Of Birth
                                                <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                                            </label>
                                            <div class="col-md-8">
                                                {!! Form::date('birth_date',null,['class'=>'form-control']) !!}
                                                @if ($errors->has('birth_date'))
                                                    <div class="alert alert-danger">{{ $errors->first('birth_date') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <!--End Job title -->
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3">Languages
                                                <i class="fa fa-language" aria-hidden="true"></i>
                                            </label>
                                            <div class="col-md-8">
                                                <select id="myselect" class="form-control" multiple="multiple" name="language[]">
                                                    @foreach($languages as $language)
                                                        <option value="{{$language->id}}">{{$language->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('language'))
                                                    <div class="alert alert-danger">{{ $errors->first('language') }}</div>
                                                @endif
                                                @if ($errors->has('language.*'))
                                                    <div class="alert alert-danger">{{ $errors->first('language.*') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group uplood">
                                            <label class="control-label col-md-3">Upload File
                                                <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                            </label>
                                            <div class="col-md-8">
                                                <input name="cv" type="file">
                                                @if ($errors->has('cv'))
                                                    <div class="alert alert-danger">{{ $errors->first('cv') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group uplood">
                                            <label class="control-label col-md-3">Upload Image
                                                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                            </label>
                                            <div class="col-md-8">
                                                <input name="avatar" type="file">
                                                @if ($errors->has('avatar'))
                                                    <div class="alert alert-danger">{{ $errors->first('avatar') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="clear"></div>

                                        <div class="s_job">
                                            <div class="status_all col-lg-12" style="float: right; padding: 0">
                                                <div class="col-lg-3">
                                                    <label class="control-label">Gender</label>
                                                    <select class="form-control personal_select" name="gender_id">
                                                        @foreach($genders as $gender)
                                                            <option value="{{$gender->id}}">{{$gender->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('gender_id'))
                                                          <div class="alert alert-danger">{{ $errors->first('gender_id') }}</div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-3">
                                                    <label class="control-label">Martial Status</label>
                                                    <select name="martial_status_id" class="form-control personal_select">
                                                       @foreach($martial_statuses as $martial_status)
                                                            <option value="{{$martial_status->id}}">{{$martial_status->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('martial_status_id'))
                                                        <div class="alert alert-danger">{{ $errors->first('martial_status_id') }}</div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-3">
                                                    <label class="control-label">Military status</label>
                                                    <select name="military_status_id" class="form-control personal_select">
                                                        @foreach($military_statuses as $military_status)
                                                        <option value="{{$military_status->id}}">{{$military_status->name}}</option>
                                                            @endforeach
                                                    </select>
                                                    @if ($errors->has('military_status_id'))
                                                        <div class="alert alert-danger">{{ $errors->first('military_status_id') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center fade-in">
                                        <button type="submit" class="btn btn-success">Next</button>
                                    </div>
                                </div><!--/.all_skills_content-->
                                {!! Form::close() !!}
                            </div><!--/.all_skills-->


                        </div><!--/.col-lg-12-->
                    </div><!--/.skills_page-->
                </div><!--/.col-lg-10-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.skills-->

@stop
@section('scripts')
    <script
        src="{{asset('front_assets/js/custom-work-jquery.js')}}">
    </script>
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
@stop
