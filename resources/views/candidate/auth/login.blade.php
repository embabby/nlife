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

            @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="text-align: center;list-style: none;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="form_title">
            <h1>SIGN IN</h1>
        </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/candidate/login') }}">
             {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"  name="email" value="{{ old('email') }}" autofocus>
            
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" required name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                
                <a href="{{route('candidate.reset')}}"><small id="emailHelp" class="form-text text-muted">Forgot your Password ?</small></a>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            <div class="social_form">
                <a href="{{route('candidate.register')}}" >
                    <h5>Don`t have Account</h5>
                </a>
            </div>
            <a href="{{route('candidate.register')}}" class="btn btn-primary sgin">Sign up</a>
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
