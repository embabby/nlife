@extends('layouts.front')

@section('content')
    <div class="skills">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="skills_page">
                        <div class="col-lg-12">

                            {!! Form::open(['method'=>'post','action'=>'CandidateAuth\RegisterController@register']) !!}
                            @csrf
                                            <div class="title wow fadeInDown">
                                                <h1 class="text-center">Welcome to Jobs@ <span>NewLifeHR</span></h1>
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
                                                            <label class="control-label col-md-3 mylabel">User Name <i class="fa fa-user"></i>  </label>
                                                            <div class="col-md-7 regester">
                                                                <input required type="text" name="user_name" maxlength="100"  value="{{ old('user_name') }}" placeholder="EX : Mohamed Sarwat Mohamed " class="form-control @error('user_name') is-invalid @enderror" >
                                                                @if ($errors->has('user_name'))
                                                                    <div class="alert alert-danger">{{ $errors->first('user_name') }}</div>
                                                                @endif
                                                            </div>
                                                        </div >

                                                        <div class="form-conrol">
                                                            <label class="control-label col-md-3 mylabel">Mobile<i class="fa fa-mobile"></i>  </label>
                                                            <div class="col-md-7 regester">
                                                                <input required type="tel" name="phone1" maxlength="20"  value="{{ old('phone1') }}" placeholder="ex: 1233456" class="form-control @error('phone1') is-invalid @enderror" >
                                                                @if ($errors->has('phone1'))
                                                                    <div class="alert alert-danger">{{ $errors->first('phone1') }}</div>
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
                                                                <input type="password" name="password_confirmation" maxlength="30"  required placeholder="Must containes the previeus password " class="form-control @error('password_confirmation') is-invalid @enderror" >
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


@endsection
