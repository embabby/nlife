<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{setting('site.title')}}</title>
    <meta name="description" content="{{setting('site.description')}}">
    <meta name="keywords" content={{setting('site.site_key_words')}}>
    <!-- Bootstrap -->
    <link href="{{asset('resources_assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('resources_assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('resources_assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('resources_assets/css/animate.min.css')}}" />
    <!-- Custom Theme Style -->
    <link href="{{asset('resources_assets/css/style.css')}}" rel="stylesheet">
@yield('styles')
</head>
<body>
<!-- header -->
<div id="header">
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
</div> <!--header end-->




@yield('content')

<!-- index Theme Scripts -->
<script src="{{asset('resources_assets/js/jquery-1.12.0.min.js')}}"></script>
<script src="{{asset('resources_assets/js/index.js')}}"></script>
<script src="{{asset('resources_assets/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('resources_assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('resources_assets/js/wow.min.js')}}"></script>
@yield('script')
<script>
    new WOW().init();
</script>
</body>
</html>
