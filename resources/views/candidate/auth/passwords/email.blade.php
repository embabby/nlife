<!DOCTYPE html >
<html>
<head>
    <!--Start Css Files -->
    <link rel="stylesheet" href="{{asset('front_assets/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('front_assets/css/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front_assets/css/jquery.selectBoxIt.css')}}" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front_assets/css/jquery.bxslider.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front_assets/css/normalize.css')}}" />
    <link rel="stylesheet" href="{{asset('front_assets/css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front_assets/css/stylish.css')}}" />
    <!--End Css Files -->
</head>
<body>
<!--log_in-->
<div class="log_in">
    <!--login_form-->
    <div class="login_form wow fadeInDown">
        <div class="form_title">
            <h1>Reset Password</h1>
        </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/candidate/password/email') }}">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">Email address</label>
                    <input required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"  name="email" value="{{ old('email') }}" autofocus>
                @if ($errors->has('email'))
                      <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @endif
                </div>
                <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
              
            </form>
    </div><!--login_form end-->
</div><!--log_in end-->
<!--Start js Files -->
<script src="{{asset('front_assets/js/jquery-1.12.0.min.js')}}"></script>
<script src="{{asset('front_assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front_assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('front_assets/js/jquery.selectBoxIt.min.js')}}"></script>
<script src="{{asset('front_assets/js/jquery.bxslider.min.js')}}"></script>
<script src="{{asset('front_assets/js/wow.min.js')}}"></script>
<script src="{{asset('front_assets/js/java.js')}}"></script>

<script>
    new WOW().init();
</script>
<!--End Js Files -->
</body>
</html>


{{--

@extends('candidate.layout.auth')
<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/candidate/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}