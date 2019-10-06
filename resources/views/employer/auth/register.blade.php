@extends('layouts.front')
@section('styles')
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css'>
@stop
@section('content')
    <div class="skills">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="skills_page">
                        <div class="col-lg-12">
                            {!! Form::open(['method'=>'post','action'=>'EmployerAuth\RegisterController@register']) !!}
                            <div class="title wow fadeInDown">
                                <h1 class="text-center">Welcome to  <span>NewLifeHR</span>  Companies Area</h1>
                                <h2 class="text-center"> Company Information</h2>
                            </div>
                            <div class="description wow fadeInDown">
                                <div class="information wow fadeIn" data-wow-duration="2s">
                                    <div class="row">
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3 mylabel">Company Name<i class="fa fa-user"></i> </label>
                                            <div class="col-md-7 regester">
                                                <input type="text" required name="company_name" maxlength="100" value="{{ old('company_name') }}" placeholder="Company Name Here" class="form-control @error('company_name') is-invalid @enderror" >
                                                @if ($errors->has('company_name'))
                                                    <div class="alert alert-danger">{{ $errors->first('company_name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3 mylabel"> Phone No<i class="fa fa-user"></i> </label>
                                            <div class="col-md-7 regester">
                                                <input type="tel" required name="company_phone" maxlength="100"  value="{{ old('company_phone') }}" placeholder="+2123456789" class="form-control @error('company_phone') is-invalid @enderror" >
                                                @if ($errors->has('company_phone'))
                                                    <div class="alert alert-danger">{{ $errors->first('company_phone') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3 mylabel"> Website<i class="fa fa-user"></i> </label>
                                            <div class="col-md-7 regester">
                                                <input type="url" name="website" maxlength="100"  value="{{ old('website') }}" placeholder="EX: google.com " class="form-control @error('website') is-invalid @enderror" >
                                                @if ($errors->has('website'))
                                                    <div class="alert alert-danger">{{ $errors->first('website') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3">Job Industry
                                                <i class="fa fa-language" aria-hidden="true"></i>
                                            </label>
                                            <div class="col-md-7 regester">
                                                <select  required class="form-control" name="job_industry[]">
                                                    @foreach($job_industries as $job_industry)
                                                        <option value="{{$job_industry->id}}">{{$job_industry->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('job_industry.*'))
                                                      <div class="alert alert-danger">{{ $errors->first('job_industry.*') }}</div>
                                                @endif
                                                @if ($errors->has('job_industry'))
                                                    <div class="alert alert-danger">{{ $errors->first('job_industry') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3">Company Size
                                                <i class="fa fa-language" aria-hidden="true"></i>
                                            </label>
                                            <div class="col-md-7 regester">
                                                <select required class="form-control" name="company_size_id" >
                                                    @foreach($company_sizes as $company_size)
                                                        <option value="{{$company_size->id}}">{{$company_size->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('company_size_id'))
                                                      <div class="alert alert-danger">{{ $errors->first('company_size_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3">Company Type
                                                <i class="fa fa-language" aria-hidden="true"></i>
                                            </label>
                                            <div class="col-md-7 regester">
                                                <select required class="form-control" name="company_type_id" >
                                                    @foreach($company_types as $company_type)
                                                        <option value="{{$company_type->id}}">{{$company_type->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('company_type_id'))
                                                      <div class="alert alert-danger">{{ $errors->first('company_type_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3">Country
                                                <i class="fa fa-city" aria-hidden="true"></i>
                                            </label>
                                            <div class="col-md-7 regester">
                                                <select required class="form-control" name="country_id" >
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('country_id'))
                                                    <div class="alert alert-danger">{{ $errors->first('country_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3">City
                                                <i class="fa fa-city" aria-hidden="true"></i>
                                            </label>
                                            <div class="col-md-7 regester">
                                                <select required class="form-control" name="city_id" >
                                                    @if($countries)
                                                        @foreach($countries->first()->cities as $city)
                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                            @endforeach
                                                    @endif
                                                </select>
                                                @if ($errors->has('city_id'))
                                                    <div class="alert alert-danger">{{ $errors->first('city_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3 mylabel"> Address<i class="fa fa-user"></i> </label>
                                            <div class="col-md-7 regester">
                                                <input type="text" name="address" maxlength="400" required  value="{{ old('address') }}" placeholder="EX: 125St..Van Hill " class="form-control @error('address') is-invalid @enderror" >
                                                @if ($errors->has('address'))
                                                    <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="title wow fadeInDown">
                                <h2 class="text-center"> User Information</h2>
                            </div>
                            <div class="description wow fadeInDown">

                                <div class="information wow fadeIn" data-wow-duration="2s">
                                    <div class="row">
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3 mylabel"> First Name <i class="fa fa-user"></i> </label>
                                            <div class="col-md-7 regester">
                                                <input required type="text" name="first_name" maxlength="100" value="{{ old('first_name') }}" placeholder="EX: Mohamed , Ahmed ..." class="form-control @error('first_name') is-invalid @enderror" >
                                                @if ($errors->has('first_name'))
                                                    <div class="alert alert-danger">{{ $errors->first('first_name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-conrol">
                                            <label class="control-label col-md-3 mylabel"> Last Name <i class="fa fa-user"></i> </label>
                                            <div class="col-md-7 regester">
                                                <input required type="text" name="last_name" maxlength="100"  value="{{ old('last_name') }}" placeholder="EX: Mohamed , Ahmed ... " class="form-control @error('last_name') is-invalid @enderror" >
                                                @if ($errors->has('last_name'))
                                                    <div class="alert alert-danger">{{ $errors->first('last_name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3 mylabel">Job Title <i class="fa fa-user"></i>  </label>
                                            <div class="col-md-7 regester">
                                                <input required type="text" name="job_title" maxlength="100"  value="{{ old('job_title') }}" placeholder="EX : Mohamed Sarwat Mohamed " class="form-control @error('job_title') is-invalid @enderror" >
                                                @if ($errors->has('job_title'))
                                                    <div class="alert alert-danger">{{ $errors->first('job_title') }}</div>
                                                @endif
                                            </div>
                                        </div >

                                        <div class="form-conrol">
                                            <label class="control-label col-md-3 mylabel">Mobile<i class="fa fa-mobile"></i>  </label>
                                            <div class="col-md-7 regester">
                                                <input type="tel" name="phone" maxlength="20"  value="{{ old('phone') }}" placeholder="ex: +21233456" class="form-control @error('phone') is-invalid @enderror" >
                                                @if ($errors->has('phone'))
                                                    <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                                                @endif
                                            </div>
                                        </div >

                                        <div class="form-conrol">
                                            <label class="control-label col-md-3 mylabel">Email<i class="fa fa-envelope-o" aria-hidden="true"></i> </label>
                                            <div class="col-md-7 regester">
                                                <input required type="email" name="email" maxlength="100"  value="{{ old('email') }}"  placeholder="Must containe  zz@something.com " class="form-control @error('email') is-invalid @enderror" >
                                                @if ($errors->has('email'))
                                                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3 mylabel"> Password <i class="fa fa-lock" aria-hidden="true"></i> </label>
                                            <div class="col-md-7 regester">
                                                <input required type="password" name="password"  maxlength="30"  placeholder="ex: 1233456" class="form-control @error('password') is-invalid @enderror" >
                                                @if ($errors->has('password'))
                                                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                                @endif
                                            </div>
                                        </div >
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3 mylabel">Confirm Password<i class="fa fa-lock" aria-hidden="true"></i> </label>
                                            <div class="col-md-7 regester">
                                                <input required type="password" name="password_confirmation" maxlength="30"   placeholder="Must containes the previeus password " class="form-control @error('password_confirmation') is-invalid @enderror" >
                                            </div>
                                        </div>
                                        <div class="form-conrol">
                                            <label class="control-label col-md-3 mylabel">Terms Conditions<i class="fa fa-lock" aria-hidden="true"></i> </label>
                                            <div class="col-md-3 regester">
                                                <input type="checkbox" value="1" required name="terms_conditions" class=" @error('terms_conditions') is-invalid @enderror" >
                                                <a href="{{route('employer.terms-conditions')}}" target="_blank">Read Terms and Conditions</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center fade-in ">
                                    <input type="submit" class="btn btn-success" name="submit" value="Next">
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div><!--/.col-lg-12-->
                    </div><!--/.skills_page-->
                </div><!--/.col-lg-10-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.skills-->
@stop
@section('scripts')
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

