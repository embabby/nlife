@extends('layouts.companies')
@section('content')
    <div class="right_col" role="main">
        <div class="row company-info">
            <div class="container">
                <div class="up-title " >
                    <img class="company-icon wow fadeInDown" src="{{asset('companies_assets/img/toggle.png')}}">
                    <span class="wow fadeInDown">Manage Plan</span>
                </div>
            </div>
        </div>


        <!--inner_content-->
        <div class="inner_content col-lg-12">

            @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="text-align: center;list-style: none;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <div class="left_side">
                <div class="row">
                    <div class="update-content-part1">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-content-col">

                            <div class="manage-plan-part1">

                                <div class="sign">
                                    <div class="manage-plan-title">
                                        @if($company->plan_id==0)
                                        <span class="wow fadeInDown">{{$trail->name}}</span>
                                        @else
                                        <span class="wow fadeInDown">{{$company->plan?$company->plan->name:''}}</span>
                                            @endif


                                    </div>
                                    @if($company->plan)
                                    <img class="manage-paln-one wow fadeInDown" src="{{asset('companies_assets/img/Untitled-1_big.png')}}">
                                    @else
                                        <img class="manage-paln-one wow fadeInDown" src="{{asset('companies_assets/img/Untitled-1_big.png')}}">
                                    @endif
                                </div>


                                <div class="all">
                                    @if($company->plan)
                                    <div class="center-title ">
                                        <?php
                                        $start = \Carbon\Carbon::parse($company->plan_start_date)->addDays($company->plan_expiry_days);
                                        $now=\Carbon\Carbon::now();
                                        $diff = $start->diffInDays($now);
                                        ?>
                                        <p class="wow fadeInDown"> Your Package </p>
                                        <div class="Package wow fadeInDown">
                                            <div class="col-lg-4">
                                                <span class="num-job-post"><span class="num">{{$company->plan?$company->plan->job_posts:''}}</span>Job Post</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="num-candidates"><span class="num">{{$company->plan?$company->plan->profiles:''}}</span>Open Profile</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="num-candidates"><span class="num">{{$company->plan?$company->plan->cvs:''}}</span>Download CV</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="center-title2">
                                        <p class="wow fadeInDown">Remaining In Package  Expires In :{{$diff}} Days</p>
                                        <div class="Package wow fadeInDown">
                                            <div class="col-lg-4">
                                                <span class="num-job-post"><span class="num">{{$company->plan_job_posts}}</span>Job Post</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="num-candidates"><span class="num">{{$company->plan_profiles}}</span>Profile</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="num-candidates"><span class="num">{{$company->plan_cvs}}</span>CV</span>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        <div class="center-title ">
                                            <?php
                                            $start = \Carbon\Carbon::parse($company->plan_end_date);
                                            $now=\Carbon\Carbon::now()->toDateString();
                                            $diff = $start->diffInDays($now);
                                            ?>
                                            <p class="wow fadeInDown"> Trail Account </p>
                                            <div class="Package wow fadeInDown">
                                                <div class="col-lg-4">
                                                    <span class="num-job-post"><span class="num">{{$trail->job_posts}}</span>Job Post</span>
                                                </div>
                                                <div class="col-lg-4">
                                                    <span class="num-candidates"><span class="num">{{$trail->profiles}}</span>Open Profile</span>
                                                </div>
                                                <div class="col-lg-4">
                                                    <span class="num-candidates"><span class="num">{{$trail->cvs}}</span>Download CV</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="center-title2">
                                            <p class="wow fadeInDown">Remaining In Trail Account :{{$remaining}} Days</p>
                                            <div class="Package wow fadeInDown">
                                                <div class="col-lg-4">
                                                    <span class="num-job-post"><span class="num">{{$company->plan_job_posts}}</span>Job Post</span>
                                                </div>
                                                <div class="col-lg-4">
                                                    <span class="num-candidates"><span class="num">{{$company->plan_profiles}}</span>Profile</span>
                                                </div>
                                                <div class="col-lg-4">
                                                    <span class="num-candidates"><span class="num">{{$company->plan_cvs}}</span>CV</span>
                                                </div>
                                            </div>
                                        </div>

                                    @endif
                                    <div class="center-title2">
                                        <p class="wow fadeInDown">Total Activity</p>
                                        <div class="Package wow fadeInDown">
                                            <div class="col-lg-4">
                                                <span class="num-job-post"><span class="num">{{$company->posted_jobs}}</span>Posted Jobs</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="num-candidates"><span class="num">{{$company->unlocked_accounts}}</span>Opened Profiles</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="num-candidates"><span class="num">{{$company->downloaded_cvs}}</span>Downloaded cvs</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

{{--                                <div class="container-fluid">--}}
{{--                                    <div class="manage-plan-btn wow fadeInDown">--}}
{{--                                        <button>Make Change</button>--}}
{{--                                        <button class="btn-upgrad">Upgrad</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>


                            <div class="manage-plan-part2">
                                <div class="right-content-col bulid">
                                    <div class="manage-plan-title2 wow fadeInDown">
                                        <span>Our Packages</span>
                                    </div>
                                    <div class="container-fluid manage-plan-content2">

                                        @foreach($plans as $plan)
                                        <div class="col-lg-4 col-md-4 col-sm-4 wow zoomIn" data-wow-duration="3s">
                                            <div class="package2">
                                                <img src="{{asset('companies_assets/img/two.png')}}" class="img-responsive">
                                                <div class="package-btn">
                                                    <a href="#" ><button id="{{$plan->id}}" onclick="openModal(this.id)" >{{$plan->name}}</button></a>
                                                </div>

                                                <div class="bronze">
                                                    <ul>
                                                        <li>Job Posts : {{$plan->job_posts}} <i class="fa fa-check" aria-hidden="true"></i></li>
                                                        <li>Candidate Contacts :{{ $plan->profiles }} <i class="fa fa-check" aria-hidden="true"></i></li>
                                                        <li>Candidate CVs : {{$plan->cvs}} <i class="fa fa-check" aria-hidden="true"></i></li>
                                                        <li>Expires In : {{$plan->expiry_days}}/ Days <i class="fa fa-check" aria-hidden="true"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                            @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!--left element-->
                    <!--right col qu & answer -->
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             {!! Form::open(['route'=>'companyPlans.request', 'files' => true]) !!}

             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" style="text-align: center;" id="exampleModalLabel">Plan Request</h5>
                 </div>
                 <div class="modal-body">
                     <input type="hidden" name="employer_id" style="display: none" value="{{Auth::guard('employer')->user()->id}}">
                     <input type="hidden" name="company_id" style="display: none" value="{{Auth::guard('employer')->user()->company_id}}">

                     <div class="form-group">
                        <label>Email</label>
                         <input type="text" required class="form-control" name="email" value="{{Auth::guard('employer')->user()->email}}">
                     </div>

                     <div class="form-group">
                        <label>Phone</label>
                         <input type="number" required class="form-control" name="phone">
                     </div>

                     <div class="form-group">
                         <select name="plan_id" required class="form-control" style="width: 100%">
                            @foreach($plans as $plan)
                            <option value="{{$plan->id}}">{{$plan->name}}</option>                            

                                @endforeach
                        </select>
                    </div>

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Submit</button>
                 </div>
             </div>
             {!! Form::close() !!}
         </div>
     </div>



@stop
     <script>
        function openModal(id) {
            // var planId = id;
            // $(".modal-body #planId").val( id);
            $(".modal-body select").val(id);
            $('#exampleModal').modal('show')
        }
     </script>
