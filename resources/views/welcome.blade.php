<html>
<head>
    <title>{{setting('site.title')}}</title>
    <meta name="description" content="{{setting('site.description')}}">
    <meta name="keywords" content={{setting('site.site_key_words')}}>
    <meta charset="UTF-8">
    <!--Start css files -->
    <link rel="stylesheet" href="{{asset('front_assets/css/bootstrap.min.css')}}" >
    <link rel="stylesheet" href="{{asset('front_assets/css/font-awesome.min.css')}}" >
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="{{asset('front_assets/css/jquery.bxslider.css')}}">
    <link rel="shortcut icon" href="{{asset('front_assets/images/logo.png')}}"/>
    <link rel="stylesheet" href="{{asset('front_assets/css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front_assets/css/stylish.css')}}" >
    <!--end css Files -->
</head>
<body>
<header class="head head_index" style="background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.0)),url({{asset('front_assets/images/home/2.png')}}) !important;">

    <section class="nav">
        <div class="container-fluid">
            <div class="logo">
                <a href="{{route('home')}}"><img src="{{asset('front_assets/images/logo_smal_22.png')}}"></a>
            </div>
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
        </div>
    </section>
    <!--End Top Navbar -->
    <!--Content Of The Header -->
    <div class="col-lg-12">
        <section class="content">
            <div class="container">
                <div class="row">
                    <h1 class=" wow fadeInDown" data-wow-duration ="2s" > Take Courses & Find Your Job</h1>
                    <P class=" wow fadeInDown text-center" data-wow-duration ="2s" > 'The Best Partner For your Success'</P>
                    <!--Start Search-->
                    <div class="col-lg-12 pa_l pa_r">
                        <div class="mainsearch wow fadeInDown">
                            <div class="row">

                                <div class="col-md-12">
                                    <div  id="search_Bar_home ">
                                        <div class="container">

                                            <div class="row">
                                                @if(Auth::guard('candidate')->check())
                                                <form action="{{url('/candidate/search')}}" >
                                                @else
                                                <form action="{{url('/candidate/guestsearch')}}" >
                                                @endif

                                                <div class="col-lg-9 col-lg-offset-1 col-md-10 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-sm-offset-0 pa_l pa_r">
                                                    <div class="search-bar">
                                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                                            <input class="job" type="text" id="input1" name="input" placeholder=" &#xf0b1; Job Title , Keywords ,or Company">
                                                        </div>
                                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                            <button type="submit" class="btn btn-success  search1"><i class="fa fa-search "></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>

                                        </div>
                                    </div>
                                </div><!--./col-->

                                <div class="col-lg-12">
                                    <div class="uploading">
                                        <div class="col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-2 col-sm-6 col-sm-offset-0">
                                            <a class="cv " href="{{route('candidate.login')}}"><i class="fa fa-send"></i> Upload Your Cv</a>
                                        </div>
                                        <div class="col-lg-3 col-lg-offset-0 col-md-3 col-md-offset-1 col-sm-6 col-sm-offset-0">
                                            <a class="post" href="{{route('employer.login')}}"> <i class="glyphicon glyphicon-briefcase"></i> Post Job For Free</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!--./row-->
                        </div><!--./container-->
                    </div>
                </div>
            </div>
        </section>
    </div>
</header>
<!--End Header -->
<!--Start SideBar-->
<div id="wrapper">
    <div class="overlay"></div>
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand">
                <a href="{{route('home')}}">
                    <span><i class="fa fa-leaf"></i> New </span>  Life
                </a>
            </li>
            <li>
            <li class="dropdown">
                <a href="{{route('home')}}" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-home"></i> Home </a>
            </li>
            <li>
                <a href="{{route('contact-us')}}"><i class="fa fa-fw fa-file-o"></i> Contact Us</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-search"></i> Jobs</a>
            </li>
            <li>
                <a href="{{route('blog.index')}}"><i class="fa fa-fw fa-cog"></i>Blog</a>
            </li>
            <li>
                @if(Auth::guard('candidate')->check())
                    <a href="{{route('candidate.dashboard')}}">Hello {{Auth::guard('candidate')->user()->first_name}}</a>
                @else
                    <a href="{{route('candidate.login')}}"><i class="fa fa-fw fa-sign-in"></i>sign in</a>
                @endif
            </li>
            <li>
                @if(Auth::guard('employer')->check())
                    <a href="{{route('employer.dashboard')}}">Hello {{Auth::guard('employer')->user()->first_name}}</a>
                @else
                    <a href="{{route('employer.login')}}"><i class="fa fa-fw fa-sign-in"></i>Employer</a>
                @endif
=            </li>
        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>


    </div>
    <!-- /#page-content-wrapper -->

</div>
<!--End SideBar  -->
<!-- Start Companyies Hiriing Now -->
<div id="company">
    <div class="info">
        <h2  class="text-center  wow fadeInDown" data-wow-duration ="2s"><i class="fa fa-bullhorn" style="font-size:36px"></i> Companies <span>Hiring</span> Now</h2>
        <p class="text-center  wow fadeInDown" data-wow-duration ="2s">Now You Could Join  the best staff and the best  international companies just click Apply Your data <br> will be transferred to your destination immediately   </p>
    </div>
    <div class='row'>
        <div class='col-lg-12'>
            <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                <!-- Carousel Slides / Quotes -->
                <div class="carousel-inner col-lg-12  wow fadeInDown">
                    <!-- Quote 1 -->
                    <?php $counter=0 ?>
                    @foreach($hot_jobs as $hot_job)
                        <?php $counter++ ?>
                        @if($hot_job->job)
                            @if($hot_job->job->company)
                    <div class="item {{$counter==1?'active':''}}">
                        <blockquote>
                            <div class="row">
                                <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12 text-center">
                                    <img class="img-responsive img-thumbnail" src="{{URL::asset('storage/'.$hot_job->image)}}" alt="{{URL::asset('storage/'.$hot_job->image)}}">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="info">
                                        <h3>{{$hot_job->job->company->name}}</h3>
                                        <h4>{{$hot_job->job->job_title}}</h4>
                                        {!! $hot_job->description !!}
                                        <a href="{{route('jobs.show',$hot_job->job->slug)}}" class="btn btn-success pull-left">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                        </blockquote>
                    </div>
                            @endif
                        @endif
                    @endforeach

                </div>
{{--                <!-- Bottom Carousel Indicators -->--}}
{{--                <div class="news2 col-lg-12">--}}
{{--                    <ol class="carousel-indicators">--}}
{{--                        @for($i=1;$i<=count($hot_jobs); $i++)--}}
{{--                        <li data-target="#quote-carousel" data-slide-to="{{$i}}" class="{{$i==1?'active':''}}"></li>--}}
{{--                        @endfor--}}
{{--                    </ol>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
<div class="dashboard">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="content col-lg-12 col-md-12 col-sm-12 col-xs-12 wow fadeInLeft">
                <h2><span>Hire</span> the right people <span>Find</span> them here.</h2>
                <h5>Advertise your jobs and promote your employer brand to the candidates you want.</h5>
                <ul>
                    <li>Post Open positions across web, mobile and email</li>

                    <li>Tell your company story to the candidates researching you</li>

                    <li>Flexible packages based on your budget</li>

                </ul>
                <a href="{{route('employer.register')}}"> <button>Get Free Employer Account</button> </a>
            </div>

        </div>
        <div class="col-md-6 col-sm-12">

            <div class="dash wow fadeInRight">

                <img class="img-responsive" src="{{asset('front_assets/images/brands/dashboard.PNG')}}" alt="dashboard">
            </div>
        </div>
    </div>
</div>
<section id="about1" class="about">
    <div class="row">
        <div class="col-md-6">
            <div class="team wow fadeInLeft">
                <img src="{{asset('front_assets/images/team/team.png')}}" >
                <div  class="slides">
                    <div class="slide1" onclick="about_history_experience('about')">

                        <h5> <i class="fa fa-check-circle-o" aria-hidden="true"></i> About Us </h5>
                        <span>company overview</span>
                    </div>
                    <div class="slide2" onclick="about_history_experience('history')">
                        <h5>   <i class="fa fa-check-circle-o" aria-hidden="true"></i>Our history </h5>
                        <span>Recruitment And Clients</span>
                    </div>
                    <div class="slide3" onclick="about_history_experience('experience')">

                        <h5>   <i class="fa fa-check-circle-o" aria-hidden="true"></i> Our Experience </h5>
                        <span>Gained Over The Years</span>
                    </div>

                </div>
            </div>


        </div>
        <div class="col-md-6">
            <div class="information wow fadeInRight">
                <div id="about">
                    <h3>ABOUT US</h3>
                    {!! setting('site.about_us') !!}
                </div>
                <div id="experience" style="display: none">
                    <h3>Experience</h3>
                    {!! setting('site.experience') !!}
                </div>
                <div id="history" style="display: none">
                    <h3>History</h3>
                    {!! setting('site.our_histroy') !!}
                </div>

                <ul class="lists">
                    <li> <i class="fa fa-user"></i>
                        <div class="number">
                            <span>+{{setting('site.candidates')}}</span>
                            <h5>CANDIDATE</h5>
                        </div>
                    </li>
                    <li><i class="fa fa-area-chart" aria-hidden="true"></i>
                        <div class="number">
                            <span>+{{setting('site.companies')}}</span>
                            <h5>COMPANY</h5>
                        </div>
                    </li>
                    <li><i class="fa fa-bullhorn" aria-hidden="true"></i>
                        <div class="number">
                            <span>+{{setting('site.recruitments')}}</span>
                            <h5>RECRUITMENT</h5>
                        </div>
                    </li>
                </ul>

            </div>

        </div>

    </div>
</section>
<section class="brands">
    <div class="description_info">
        <h2 class="text-center  wow fadeInDown">Trusted by Teams everywhere</h2>
        <p class="text-center  wow fadeInDown">From Companies with off-the-charts growth to local
            businesses and non-profits<br> teams love NewLifeHR.</p>
    </div>
    <div class="container  wow fadeInUp">
        <ul class="bxslider">
            @foreach($partners as $partner)
            <li><img src="{{url(asset('storage/'.$partner->icons))}}" alt="{{$partner->title}}"/></li>
            @endforeach
        </ul>
    </div>
</section>
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



<script src="{{asset('front_assets/js/jquery-1.12.0.min.js')}}"></script>
<script src="{{asset('front_assets/js/jquery.bxslider.min.js')}}"></script>
<script src="{{asset('front_assets/js/wow.min.js')}}"></script>
<script src="{{asset('front_assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front_assets/js/select2.min.js')}}"></script>
<script src="{{asset('front_assets/js/wow.min.js')}}"></script>
<script src="{{asset('front_assets/js/java.js')}}"></script>

<script>
    function about_history_experience(id) {

        if (id=='about'){
            document.getElementById("about").style.display = "block";
            document.getElementById("experience").style.display = "none";
            document.getElementById("history").style.display = "none";

        }
        if(id=='history'){
            document.getElementById("about").style.display = "none";
            document.getElementById("experience").style.display = "none";
            document.getElementById("history").style.display = "block";
        }
        if(id=='experience'){
            document.getElementById("about").style.display = "none";
            document.getElementById("experience").style.display = "block";
            document.getElementById("history").style.display = "none";
        }

    }
</script>

@yield('script')

</body>
</html>
