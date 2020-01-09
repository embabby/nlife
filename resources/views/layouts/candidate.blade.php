<!DOCTYPE html >
<html>
<head>
    <title>{{setting('site.title')}}</title>
    <meta name="description" content="{{setting('site.description')}}">
    <meta name="keywords" content={{setting('site.site_key_words')}}>    <!--Start Css Files -->
    <link rel="stylesheet" href="{{asset('front_assets/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('front_assets/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front_assets/css/normalize.css')}}" />
    <link rel="stylesheet" href="{{asset('front_assets/js/jquery.bxslider.min.js')}}">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front_assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front_assets/css/stylish.css')}}" />
    <!--End Css Files -->
</head>
@yield('styles')
<body>
<!--Start Top Navbar -->
<nav class="navbar navbar-default wow fadeInDown">
    <div class="container-fluid menu">
        <!-- Brand and toggle get grouped for better mobile display -->

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="true">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('front_assets/images/logo_small.png')}}" class="img-responsive"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav menu">
                <li><a href="{{route('candidate.dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('candidate.jobs.all_jobs')}}">Jobs</a></li>
                <li><a href="{{route('candidate.profile')}}">Profile</a></li>
                <li><a href="{{route('account.edit')}}">Settings & Update</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown pic" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        @if($candidate->avatar)
                            <img src="{{url(asset('avatars/'.$candidate->avatar))}}" class="img-responsive">
                        @else
                            <img src="{{url(asset('avatars/'.$candidate->gender->name.'.png'))}}"  class="img-responsive" alt="">
                        @endif
                    </a>
                    <ul class="dropdown-menu notify-drop">
                                             <!-- end notify title -->
                        <!-- notify content -->
                        <div class="drop-content">
                            <li class="name">{{$candidate->first_name}}</li>
                            <li class="log">
                                <a href="{{ url('/canidate/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ url('/candidate/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--End Top Navbar -->

<!-- for display messages -->
@if(Session::has('danger'))
<p class="alert alert-danger">{{ Session::get('danger') }}</p>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="text-align: center;list-style: none;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- end display messages -->

@yield('content')


<!--Start Footer -->
<!--Start Footer -->
<div class="footer wow fadeInUp">
    <!--Start Part1 -->
    <div class="part1">
        <div class="col-md-12">
            <div class="row">
                <div class="container">
                    <div class="col-md-4 col-sm-4">
                        <div class="call">
                            <img src="{{asset('front_assets/images/icones/phone-contact%20(1).png')}}">
                            <h3>Call Us Today</h3>
                            <p>{{setting('site.mobile')}}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="call">
                            <img src="{{asset('front_assets/images/icones/main-location%20(1).png')}}">
                            <h3>Address </h3>
                            <p> {{setting('site.address')}}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="call">
                            <img src="{{asset('front_assets/images/icones/main-location%20(2).png')}}">
                            <h4>Contact Us</h4>
                            <p>{{setting('site.email')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Part1 -->

    <div class="part2">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="about">
                        <img src="{{asset('front_assets/images/logo3.png')}}" >
                        {!! setting('site.about_us') !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="services">
                        <h3>Our Services</h3>
                        <ul>
                            <li><img src="{{asset('front_assets/images/icones/next.png')}}">Discover Latest jobs </li>
                            <li><img src="{{asset('front_assets/images/icones/next.png')}}">Latest Courses </li>
                            <li><img src="{{asset('front_assets/images/icones/next.png')}}">Upgrade Your Career</li>
                            <li><img src="{{asset('front_assets/images/icones/next.png')}}">Estimate Your Profile</li>
                            <li><img src="{{asset('front_assets/images/icones/next.png')}}">Get Help With Your Own Cv</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-us">
                        <h3>Contact Info</h3>
                        <ul>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i>  {{setting('site.address')}} </li>
                            <li><i class="fa fa-mobile" aria-hidden="true"></i>{{setting('site.mobile')}}</li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i> {{setting('site.email')}}</li>
                            <li><i class="fa fa-clock-o" aria-hidden="true"></i> {{setting('site.working_days')}}</li>
                            <li><i class="fa fa-clock-o" aria-hidden="true"></i>{{setting('site.holdays')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="container">
            <div class="social">
                <a href=" {{setting('site.facebook')}}"><i class="fa fa-facebook"></i></a>
                <a href=" {{setting('site.twitter')}}"><i class="fa fa-twitter"></i></a>
                <a href=" {{setting('site.Instagram')}}"><i class="fa fa-instagram"></i></a>
            </div>
            <p class="text-center copyrights">&copy; <span> All Copy Rights 2017 </span> Reserved For New LifeHR</p>
        </div>
    </div>
</div>
<!--End footer -->

<!--End footer -->
@yield('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Sales'],
            ['2013',  200],
            ['2014',  1170],
            ['2015',  660],
            ['2016',  1030]
        ]);

        var options = {
            isStacked: true,
            height: 300,
            legend: {position: 'top', maxLines: 1},
            vAxis: {minValue: 1}
        };
        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
<script src="{{asset('front_assets/js/jquery-1.12.0.min.js')}}"></script>
<script src="{{asset('front_assets/js/jquery.bxslider.min.js')}}"></script>
<script src="{{asset('front_assets/js/tags.js')}}"></script>
<script src="{{asset('front_assets/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('front_assets/js/select2.min.js')}}"></script>
<script src="{{asset('front_assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front_assets/js/wow.min.js')}}"></script>
<script>
    new WOW().init();
</script>
<script src="{{asset('front_assets/js/java.js')}}"></script>

<!-- upload cv section -->
<script>
document.getElementById("upload_cv").onchange = function() {
    document.getElementById("upload_cv_form").submit();
};
</script>
<!-- end cv section -->

<!--  message timeout -->
<script>
$("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 4000 ); // 5 secs

});
</script>
<!-- end timeout -->

<!--End Js Files -->
</body>
</html>
