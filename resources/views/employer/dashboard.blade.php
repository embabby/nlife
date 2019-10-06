@extends('layouts.companies')

@section('content')
{{--    <ul class="nav navbar-nav navbar-right">--}}
{{--        <!-- Authentication Links -->--}}
{{--        @if (Auth::guard('employer')->check())--}}
{{--            <li class="dropdown">--}}
{{--                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
{{--                    Hello {{Auth::guard('employer')->user()->name}}<span class="caret"></span>--}}
{{--                </a>--}}

{{--                <ul class="dropdown-menu" role="menu">--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('/employer/logout') }}"--}}
{{--                           onclick="event.preventDefault();--}}
{{--                                                 document.getElementById('logout-form').submit();">--}}
{{--                            Logout--}}
{{--                        </a>--}}

{{--                        <form id="logout-form" action="{{ url('/employer/logout') }}" method="POST" style="display: none;">--}}
{{--                            {{ csrf_field() }}--}}
{{--                        </form>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--        @else--}}
{{--            <li><a href="{{ url('/employer/login') }}">Login</a></li>--}}
{{--            <li><a href="{{ url('/employer/register') }}">Register</a></li>--}}
{{--        @endif--}}
{{--    </ul>--}}

{{--    <div class="container">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-8 col-md-offset-2">--}}
{{--            <div class="panel panel-default">--}}
{{--                <div class="panel-heading">Dashboard</div>--}}

{{--                <div class="panel-body">--}}
{{--                    You are logged in as Employer!--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="right_col" role="main">
    <div class="row company-info">
        <div class="container">
            <div class="up-title">
                <img class="company-icon wow fadeInDown" src="{{asset('companies_assets/images/dashboard_2.png')}}">
                <span class="wow fadeInDown">Dashboard</span>
            </div>

        </div>
    </div>
    <!--inner_content-->
    <div class="inner_content col-lg-12">
        <div class="left_side">
            <div class="content-part1">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-content-col">
                    <div class="menu_tab col-lg-12 col-md-12">
                        <div class="tab-content col-lg-12">
                            <div role="tabpanel" class="tab-pane  active"
                                 id="HR_Monitor">
                                <!--square-->
                                <div class="square col-lg-12 col-md-12">
                                    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="square_1">
                                            <h1>DOWNLOAD</h1>
                                            <p>{{$downloaded_cvs}}</p>
                                            <div class="clear"></div>
                                            <h3>CV</h3>
                                            <h5>{{$downloaded_cvs_today}} CV Download Today  </h5>
                                        </div>
                                    </div>
                                    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="square_2">
                                            <h1>OPEN CONTACT</h1>
                                            <p>{{$opened_contacts}}</p>
                                            <div class="clear"></div>
                                            <h3>Contacts</h3>
                                            <h5>{{$opened_contacts_today}} Open Contact Today </h5>
                                        </div>
                                    </div>
                                    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="square_3">
                                            <h1>PROFILE VIEWS</h1>
                                            <p>10</p>
                                            <div class="clear"></div>
                                            <h3>Profle</h3>
                                            <h5> 3 Profile Views Today</h5>
                                        </div>
                                    </div>
                                    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="square_4">
                                            <h1>Posted Jobs</h1>
                                            <p>{{count($company->jobs)}}</p>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="square_5">
                                            <h1>Applied Candidates</h1>
                                            <p>{{count($company->candidates)}}</p>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="square_6">
                                            <h1>Job Clicks</h1>
                                            <p>{{$clicks}}</p>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div><!--square end-->
                                <!--carousel-->
                            </div><!--tab-pane end-->
                        </div><!--tab-content-->
                    </div><!--menu_tab end-->
                    <!--circle-->
                    <div class="content_circle col-lg-12 col-md-12 ">
                        <div class="circles col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="circle col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <a href="{{route('employer.candidate.unlocked')}}"><img src="{{asset('companies_assets/images/unlock.png')}}"
                                                 class="img-responsive" width="59" height="59">
                                    Unlocked Candidates</a>
                            </div><!--circle end-->
                            <div class="circle col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <a href="{{route('employer-jobs.index')}}"><img src= "{{asset('companies_assets/images/posted.png')}}"
                                                 class="img-responsive" width="59" height="59">
                                    Posted Jobs</a>
                            </div><!--circle end-->
                            <div class="circle col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <a href="{{route('employer-jobs.create')}}"><img src="{{asset('companies_assets/images/advertising.png')}}"
                                                 class="img-responsive" width="59" height="59">
                                    Add New Job </a>
                            </div><!--circle end-->
                        </div><!--circles end-->
                    </div><!--circle end-->
                    <!--content_bottom-->
                    <div class="content_bottom col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="all_blocks">
                            <!--article_text-->
                            <div class="article_text col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h4>How to attract great Candidate ?</h4>
                                <p class="lead col-lg-7 col-xs-12">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>
                                <img src="{{asset('companies_assets/images/articlel_photo_2.png')}}" class="img-responsive">
                            </div><!--article_text end-->
                        </div><!--content_bottom end-->

                    </div><!--all_blocks-->
                </div><!--right-content-col-->
            </div>
        </div><!--left_side end-->
    </div>
</div>


@stop
