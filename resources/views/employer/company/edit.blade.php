@extends('layouts.companies')
@section('styles')
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css'>
@stop
@section('content')
    <div class="all_content">
        <div class="right_col ">
            <div class="row company-info ">
                <div class="container">
                    <div class="up-title header1">
                        <img class="company-icon wow fadeInDown" src="{{asset('companies_assets/img/company-icon.png')}}">
                        <span class="wow fadeInDown">Company Details</span>
                    </div>
                </div>
            </div>
             @if (Session::has('success'))
                 <div class="alert alert-success">{{ Session::get('success') }}</div>
             @elseif(Session::has('danger'))
                 <div class="alert alert-danger">{{ Session::get('danger') }}</div>
             @endif
            <!--inner_content-->
            <div class="inner_content col-lg-12">
                <div class="left_side col-lg-7">
                    <!--left_content-->
                        {!! Form::model($company,['method'=>'patch','action'=>['Employer\CompaniesAccountController@update',$company->id],'files'=>true]) !!}
                        <div class="left_content col-lg-12">
                            <div class="basic-info-part1">
                                <div class="title-steps">
                                    <span class="wow fadeInDown">Basic Info</span>
                                </div>
                            </div>
                            <!--left_bottom-->
                            <div class="left_bottom">
                                <!--contents-->
                                <div class="contents">
                                    <div class="content-details">
                                        <div class="main-content-details">
                                            <div class="icons1">
                                                <div class="basic-info-upheadr  ">
                                                    <div class="box1">
                                                        <div class="left-icon col-md-6 col-xs-6 wow fadeInDown">
                                                            <img src="{{asset('companies_assets/img/r1.png')}}" class="img-responsive">
                                                            <span class="rate">Company Name</span>
                                                        </div>
                                                        <div class="right_2 col-md-6 col-xs-6 wow fadeInDown">
                                                            <img src="{{asset('companies_assets/img/l1.png')}}" class="img-responsive">
                                                            <span class="pen">Company Phone</span>
                                                        </div>
                                                    </div><!--box1 end-->
                                                </div>
                                                <!--forms -->
                                                <div class="all_forms">
                                                    <div class="left-form col-md-5 col-sm-5 col-xs-5 wow fadeInDown">
                                                            {!! Form::text('name',null,['class'=>'form-control','required']) !!}
                                                        @if ($errors->has('name'))
                                                              <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="right-form col-lg-5 col-md-5 col-sm-5 col-xs-5 wow fadeInDown">
                                                        {!! Form::tel('phone',null,['class'=>'form-control','required']) !!}
                                                        @if ($errors->has('phone'))
                                                            <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                                                        @endif
                                                    </div>
                                                </div><!--all_forms-->


                                                <div class="basic-info-upheadr">
                                                    <div class="box1">
                                                        <div class="left-icon col-md-6 col-xs-3 wow fadeInDown">
                                                            <img src="{{asset('companies_assets/img/l2.png')}}" class="img-responsive">
                                                            <span class="rate">Industry</span>
                                                        </div>

                                                        <div class="right_2 col-lg-6 col-xs-3 wow fadeInDown">
                                                            <img src="{{asset('companies_assets/img/r2.png')}}" class="img-responsive">
                                                            <span class="pen">Company Type</span>
                                                        </div>
                                                    </div><!--box1 end-->

                                                </div>
                                                <!--forms -->
                                                <div class="all_forms">
                                                    <div class="left-form col-md-5 col-sm-5 col-xs-5 wow fadeInDown">

                                                        <select name="job_industry[]" multiple="" class="label ui selection fluid dropdown">
                                                            @foreach($job_industries as $job_industry)
                                                                <option {{in_array($job_industry->id,$company_job_industries)?'selected':''}} value="{{$job_industry->id}}">{{$job_industry->name}}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('job_industry.*'))
                                                            <div class="alert alert-danger">{{ $errors->first('job_industry.*') }}</div>
                                                        @endif
                                                    </div>

                                                    <div class="right-form col-lg-5 col-md-5 col-sm-5 col-xs-5 wow fadeInDown">
                                                        <select class="form-control" required name="company_type_id">
                                                            @foreach($company_types as $company_type)
                                                            <option {{$company_type->id==$company->company_type_id?'selected':''}} value="{{$company_type->id}}">{{$company_type->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('company_type_id'))
                                                              <div class="alert alert-danger">{{ $errors->first('company_type_id') }}</div>
                                                        @endif
                                                    </div>
                                                </div><!--all_forms-->


                                                <div class="basic-info-upheadr">
                                                    <div class="box1">
                                                        <div class="left-icon col-md-6 col-xs-3 wow fadeInDown">
                                                            <img src="{{asset('companies_assets/img/l2.png')}}" class="img-responsive">
                                                            <span class="rate">Company Size</span>
                                                        </div>

                                                        <div class="right_2 col-lg-6 col-xs-3 wow fadeInDown">
                                                            <img src="{{asset('companies_assets/img/l5.png')}}" class="img-responsive">
                                                            <span class="rate">Year Founded</span>
                                                        </div>
                                                    </div><!--box1 end-->

                                                </div>
                                                <!--forms -->
                                                <div class="all_forms">
                                                    <div class="left-form col-md-5 col-sm-5 col-xs-5 wow fadeInDown">
                                                            <select required class="form-control" name="company_size_id">
                                                                @foreach($company_sizes as $company_size)
                                                                    <option {{$company_size->id==$company->company_size_id?'selected':''}} value="{{$company_size->id}}">{{$company_size->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        @if ($errors->has('company_size_id'))
                                                            <div class="alert alert-danger">{{ $errors->first('company_size_id') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="right-form col-lg-5 col-md-5 col-sm-5 col-xs-5 wow fadeInDown">
                                                            {!! Form::date('year_founded',null,['class'=>'form-control','required']) !!}
                                                        @if ($errors->has('year_founded'))
                                                            <div class="alert alert-danger">{{ $errors->first('year_founded') }}</div>
                                                        @endif
                                                    </div>
                                                </div><!--all_forms-->
                                                <div class="basic-info-upheadr">
                                                    <div class="box1">
                                                        <div class="left-icon col-md-6 col-xs-3 wow fadeInDown">
                                                            <img src="{{asset('companies_assets/img/r1.png')}}" class="img-responsive">
                                                            <span class="rate">HQ Country</span>
                                                        </div>

                                                        <div class="right_2 col-lg-5 col-xs-3 wow fadeInDown">
                                                            <img src="{{asset('companies_assets/img/r4.png')}}" class="img-responsive">
                                                            <span class="pen">HQ City</span>
                                                        </div>
                                                    </div><!--box1 end-->

                                                </div>
                                                <!--forms -->
                                                <div class="all_forms">
                                                    <div class="left-form col-md-5 col-sm-5 col-xs-5 wow fadeInDown">
                                                        <select class="form-control" required name="country_id">
                                                            @foreach($countries as $country)
                                                            <option {{$company->country_id==$country->id?'selected':''}} value="{{$country->id}}">{{$country->name}}</option>
                                                                @endforeach
                                                        </select>
                                                        @if ($errors->has('country_id'))
                                                              <div class="alert alert-danger">{{ $errors->first('country_id') }}</div>
                                                        @endif
                                                    </div>

                                                    <div class="right-form col-lg-5 col-md-5 col-sm-5 col-xs-5 wow fadeInDown">
                                                        <select name="city_id" required class="form-control">
                                                            @if($company->country)
                                                            @foreach($company->country->cities as $city)
                                                            <option {{$company->city_id==$city->id?'selected':''}} value="{{$city->id}}">{{$city->name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @if ($errors->has('city_id'))
                                                              <div class="alert alert-danger">{{ $errors->first('city_id') }}</div>
                                                        @endif
                                                    </div>
                                                </div><!--all_forms-->
                                                <div class="basic-info-upheadr">
                                                    <div class="box1">
                                                        <div class="left-icon col-md-6 col-xs-3 wow fadeInDown">
                                                            <img src="{{asset('companies_assets/img/r5.png')}}" class="img-responsive">
                                                            <span class="pen">Company Details Location</span>
                                                        </div>
                                                    </div><!--box1 end-->
                                                </div>
                                                <!--forms -->
                                                <div class="all_forms">
                                                    <div class="left-form col-md-12 col-sm-12 col-xs-12 wow fadeInDown">
                                                        <textarea class="form-control" required name="address" cols="1" rows="1">{{$company->address}}</textarea>
                                                    </div>
                                                    @if ($errors->has('address'))
                                                          <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                                                    @endif
                                                </div><!--all_forms-->
                                            </div>
                                        </div>
                                    </div>
                                </div><!--contents end-->
                            </div><!--left_bottom end-->


                            <!--apperance-->
                            <div class="apperance ">
                                <!--bottom_content-->
                                <div class="bottom_content">
                                    <div class="content-part2 basic-info-part2 ">
                                        <div class="right-content-col">
                                            <div class="container-fluid">
                                                <div class="title-steps basic-info-title-part2">
                                                    <span class="wow fadeInDown">Appearance</span>
                                                </div>

                                                <div class="container-fluid">
                                                    <div class="upload-photos col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="upload-photo">
                                                                @if($company->logo && file_exists(public_path().'/storage/'.$company->logo))
                                                                <img width="100" style="float: right"  aria-hidden="true" src="{{asset('storage/'.$company->logo)}}" alt="">
                                                                    <h2>Change Logo</h2>
                                                                @else
                                                                    <i class="fa fa-camera" aria-hidden="true"></i>
                                                                    <h2>Add Logo</h2>
                                                                @endif
                                                                <input type="file" name="logo">
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="upload-cover">
                                                                @if($company->cover_image && file_exists(public_path().'/storage/'.$company->cover_image))
                                                                    <img width="100" style="float: right"  aria-hidden="true" src="{{asset('storage/'.$company->cover_image)}}" alt="">
                                                                    <h2>Change Cover Photo</h2>
                                                                @else
                                                                    <i class="fa fa-film" aria-hidden="true"></i>
                                                                    <h2>Add Cover Photo</h2>
                                                                @endif

                                                                <input type="file" name="cover_image">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div><!--container-fluid-->
                                        </div><!--right-content-col end-->
                                    </div><!--content-part2-->

                                </div><!--bottom_content end-->
                            </div><!--apperance end-->

                            <div class="apperance ">
                                <!--bottom_content-->
                                <div class="bottom_content">
                                    <div class="content-part2 basic-info-part2 ">
                                        <div class="right-content-col">
                                            <div class="container-fluid">
                                                <div class="title-steps basic-info-title-part2">
                                                    <span class="wow fadeInDown">About Company</span>
                                                </div>

                                                <!-- this is a text editor-->
                                                <div class="notepad">
                                                    <textarea name="about_company" required class="form-control" rows="6" placeholder="Your Text Here">{{$company->about_company}}</textarea>
                                                </div>
                                            </div><!--container-fluid-->
                                        </div><!--right-content-col end-->
                                    </div><!--content-part2-->
                                </div><!--bottom_content end-->
                            </div><!--apperance end-->

                            <div class="next next-btn wow fadeInDown">
                                <button type="submit" style="background-color: #3e9ddd" class="button_post">Save Changes</button>
                            </div>

                        </div><!--left content-->
                        {!! Form::close() !!}
                </div><!--left_side end-->
            </div><!--inner content-->
        </div><!--right_col-->
    </div><!--all content-->

@stop
@section('script')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js'></script>
    <script  src="{{asset('companies_assets/js/multi-select-script.js')}}"></script>

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

