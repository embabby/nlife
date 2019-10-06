<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{setting('site.title')}}</title>
    <meta name="description" content="{{setting('site.description')}}">
    <meta name="keywords" content={{setting('site.site_key_words')}}>
    <!--chart link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <!-- Bootstrap -->
    <link href="{{asset('company_profile_assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('company_profile_assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('company_profile_assets/css/animate.min.css')}}" />
    <link href="{{asset('company_profile_assets/css/style.css')}}" rel="stylesheet">
    @yield('styles')
</head>

<body>
<nav class="navbar navbar-default wow fadeInDown">
    <div class="container-fluid ">
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
            <ul class="links1">

                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('jobs.index')}}">Jobs</a></li>
                <li><a href="{{route('blog.index')}}">Blog</a></li>
                <li><a href="{{route('contact-us')}}">Contact us</a></li>

                <div class="all_search">
                    <div class="search">

                        @if(Auth::guard('employer')->check())
                            <a href="{{route('employer.dashboard')}}">Hello {{Auth::guard('employer')->user()->first_name}}</a>
                        @else
                            <a href="{{route('employer.login')}}">employer</a>
                        @endif

                    </div>
                    <div class="search">
                        @if(Auth::guard('candidate')->check())
                            <a href="{{route('candidate.dashboard')}}">Hello {{Auth::guard('candidate')->user()->first_name}}</a>
                        @else
                            <a href="{{route('candidate.login')}}">sign in</a>
                        @endif
                    </div>
                </div>

            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="main-page container">
    <div class="company-cover">
        @if($company->cover_image && Storage::exists($company->logo))
            <img class="cover-pic img-responsive wow fadeIn" src="{{url(asset('storage/'.$company->cover_image))}}" alt="{{$company->name}}">
        @else
            <img class="cover-pic img-responsive wow fadeIn" src="{{url(asset('storage/companies/default_cover_image.png'))}}">
        @endif
        @if($company->logo && Storage::exists($company->logo))
            <img src="{{url(asset('storage/'.$company->logo))}}" alt="{{$company->name}}"  class="profile-img wow slideInLeft">
        @else
            <img src="{{url(asset('storage/companies/default-logo.png'))}}" class="profile-img wow slideInLeft">
        @endif
        <div class="sub-item">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <div class="logo2">
                    <p>{{$company->name}}</p>
                </div>
            </div>
            <div class="collapse navbar-collapse wow fadeInDown " id="myNavbar">
                <ul class="nav navbar-nav col-lg-7 col-md-7 col-sm-6">
                    <li class="active main-menu"><a href="{{route('companyProfile.home',$company->slug)}}">Company</a></li>
                    <li class="main-menu"><a href="{{route('companyProfile.jobs',$company->slug)}}">Jobs</a></li>
                    <li class="main-menu"><a href="{{route('companyProfile.benefits',$company->slug)}}">Benefits</a></li>
                    <li class="main-menu"><a href="{{route('companyProfile.images',$company->slug)}}">Photos</a></li>
                </ul>
            </div>
            <div class="Up-content">
                <ul class="logo wow fadeInUp">
                    <li>{{$company->name}}</li>
                    @if($company->plan_id!=0)
                        <li><img src="{{asset('company_profile_assets/images/small_check.png')}}"></li>
                    @endif
                </ul>
            </div>
        </div>
    @yield('content')
    </div>
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

</div>
@yield('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('company_profile_assets/js/jquery-3.1.1.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('company_profile_assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('company_profile_assets/js/wow.min.js')}}"></script>
<script>
    new WOW().init();
</script>
<script>
    function appearance(){
        document.getElementById("mycomment").style.display="block";
    };
</script>
</body>
</html>
