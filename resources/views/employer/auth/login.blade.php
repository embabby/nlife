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
            <h1> EMPLOYER SIGN IN</h1>
        </div>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/employer/login') }}">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"  name="email" value="{{ old('email') }}" autofocus>
                @if ($errors->has('email'))
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                @if ($errors->has('password'))
                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                @endif
                <a href="{{route('employer.reset')}}"><small id="emailHelp" class="form-text text-muted">Forgot your Password ?</small></a>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            <div class="social_form">
                <h5><a href="{{route('employer.register')}}">Don`t have Account</a></h5>
            </div>
            <a href="{{route('employer.register')}}" class="btn btn-primary sgin">Sign up</a>
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
