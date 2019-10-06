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
    <meta name="keywords" content={{setting('site.site_key_words')}}>    <!-- Bootstrap -->
    <link href="{{asset('companies_assets/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('companies_assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!--wow css-->
    <link href="{{asset('companies_assets/css/animate.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="{{asset('front_assets/css/jquery.selectBoxIt.css')}}" />

    <link href="{{asset('companies_assets/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front_assets/css/select2.min.css')}}" />
    @yield('styles')
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="left_column_main">
                    <div class="navbar nav_title" style="border: 0;">
                        @if($company->logo && file_exists(public_path().'/storage/'.$company->logo))
                            <a href="" class="site_title"><img width="50px" src="{{asset('storage/'.$company->logo)}}"> <span>{{$company->name}}</span></a>
                        @else
                            <a href="" class="site_title"><img width="50px" src="{{asset('companies_assets/img/company-icon.png')}}"> <span>{{$company->name}}</span></a>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <br/>
                    <!-- sidebar menu that will stretch with it's content :) -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li class="main_build_comp">
                                    <a href="{{route('employer.dashboard')}}"><i class="fa fa-tachometer"></i> Dashboard</a>
                                </li>
                                <br>
                                <li>
                                    <a href="{{route('employer-jobs.index')}}"><i class="fa fa-envelope" aria-hidden="true"></i>
                                        Posted Jobs</a>
                                </li>
                                <li>
                                    <a href="{{route('employer-jobs.create')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        Add Job</a>
                                </li>
                                <li>
                                    <a href="{{route('employer.candidate.unlocked')}}"><i class="fa fa-unlock-alt" aria-hidden="true"></i>UnLocked Candidates</a>
                                </li>
                                <li>
                                    <a href="{{route('companiesAccount.edit')}}"><i class="fa fa-building" aria-hidden="true"></i>Company Details</a>
                                </li>
                                <li>
                                    <a href="{{route('companyBenefit.edit')}}"><i class="fa fa-smile-o" aria-hidden="true"></i>Benefits</a>
                                </li>
                                <li>
                                    <a href="{{route('companySocial.edit')}}"><i class="fa fa-share-square" aria-hidden="true"></i>Social Media</a>
                                </li>
                                <li>
                                    <a href="{{route('companies-images.index')}}"><i class="fa fa-file-image-o" aria-hidden="true"></i>Images</a>
                                </li>
                                <li>
                                    <a href="{{route('companyEmailPreference.edit')}}"><i class="fa fa-internet-explorer" aria-hidden="true"></i>Email Preference</a>
                                </li>
                                <li>
                                    <a href="{{route('companies-users.index')}}"><i class="fa fa-user"></i>Users</a>
                                </li>
                                <li>
                                    <a href="{{route('companyPlans.index')}}"><i class="fa fa-bar-chart" aria-hidden="true"></i>Manage Plan</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
            <li class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('companies_assets/images/logo_small.png')}}" class="img-responsive"></a>
                    <ul class="nav navbar-nav next">

                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="fa fa-home home"></span>
                            </button>
                        </div>

                        <!--
                        <button type="button" class="navbar-toggle collapsed"
                                data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-2"
                                aria-expanded="false">
                            <i class="fa fa-home" style=" font-size: 28px"></i>
                        </button>
                        -->
                        <div  class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="{{route('employer.dashboard')}}">Dashboard</a></li>
                                <li><a href="{{route('companyProfile.home',$company->slug)}}">Organization</a></li>
                                <li><a href="#">Jobs </a></li>
                                <li><a href="{{route('companyProfile.benefits',$company->slug)}}">Benefits </a></li>
                                <li><a href="{{route('companyProfile.images',$company->slug)}}">Photos </a></li>
                                <li class=" dropdown social navbar-right">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        @if($company->logo && file_exists(public_path().'/storage/'.$company->logo))
                                           <img width="50px" src="{{asset('storage/'.$company->logo)}}">
                                        @else
                                            <img width="50px" src="{{asset('companies_assets/img/company-icon.png')}}">
                                        @endif
                                       {{Auth::guard('employer')->user()->first_name}}
                                    </a>
                                    <ul class="dropdown-menu drlogout">
                                        <li>
                                            <a href="{{ url('/employer/logout') }}"
                                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ url('/employer/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </ul>
                </nav>
        </div>
    </div>
    <br>
    <br>
    <!-- /top navigation -->
    <!--right column where content go's-->
    @yield('content')
</div>
@yield('script')
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("wrapper").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("wrapper").style.marginLeft= "0";
    }
</script>
<!-- select box with search with in -->
<script src="{{asset('companies_assets/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('companies_assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('companies_assets/js/wow.min.js')}}"></script>
<script src="{{asset('front_assets/js/select2.min.js')}}"></script>
<script src="{{asset('front_assets/js/jquery.selectBoxIt.min.js')}}"></script>
<script>
    new WOW().init();
</script>

<script>
    $('.carousel').carousel()
</script>
<!-- Custom Theme Scripts -->
<script src="{{asset('companies_assets/js/custom.js')}}"></script>
</body>
</html>


