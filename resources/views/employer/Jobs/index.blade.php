@extends('layouts.companies')
@section('content')
    <div class="right_col" role="main">
        <div class="row company-info">
            <div class="container">
                <div class="up-title">
                    <img class="company-icon wow fadeInDown" src="{{asset('companies_assets/img/insights_2.png')}}">
                    <span class="wow fadeInDown">Posted Jobs</span>
                </div>
            </div>
        </div>
         @if (Session::has('success'))
             <div class="alert alert-success">{{ Session::get('success') }}</div>
         @elseif(Session::has('danger'))
             <div class="alert alert-danger">{{ Session::get('danger') }}</div>
         @endif
        <!--inner_content-->
        <div class="inner_content col-lg-12">
            <div class="left_side">
                <div class="content-part1">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-content-col">
                        <div class="visit col-lg-12">
                            <!--tabs-->
                            <div class="tab_back">
                                <div class="tabs">
                                    <div class="row">
                                        <!-- Nav tabs -->
                                        <!-- Tab panes -->
                                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div role="tabpanel" class="tab-pane active" id="Job_Clicks">
                                                <div class="left_content ">
                                                    <div class="clear"></div>
                                                    <!--table_tabs-->
                                                    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="table_content col-lg-12" style="overflow-x:auto;">
                                                            <table class=" table-responsive table-hover table-striped col-lg-12 col-md-12">
                                                                <th># </th>
                                                                <th>Job</th>
                                                                <th>Applied</th>
                                                                <th>Shortlisted</th>
                                                                <th>Accepted</th>
                                                                <th>Rejected</th>
                                                                <?php $counter=0 ?>
                                                                @foreach($jobs as $job)
                                                                    <?php $counter++ ?>
                                                                <tr>
                                                                    <td>{{$counter}}</td>
                                                                    <td><a href="{{route('employer-jobs.applied',$job->slug)}}">{{$job->job_title}}</a></td>
                                                                    <td>{{ $job->jobApplicants->count()}}</td>
                                                                    <td>{{ $job->jobApplicants->where('job_application_status_id',\Config::get('constants.SHORTLISTED'))->count()}}</td>
                                                                    <td>{{ $job->jobApplicants->where('job_application_status_id',\Config::get('constants.ACCEPTED'))->count()}}</td>
                                                                    <td>{{ $job->jobApplicants->where('job_application_status_id',\Config::get('constants.REJECTED'))->count()}}</td>
                                                                </tr>
                                                                    @endforeach
                                                            </table>
                                                        </div><!--table_content-->
                                                    </div><!--table_tabs end-->
                                                </div><!--left_content end-->
                                            </div><!--tab-pane end-->
                                        </div><!--tab-content end-->
                                       {{$jobs->links()}}
                                    </div><!--row end-->
                                </div><!--tabs end-->
                            </div><!--tab_back end-->
                        </div>
                    </div><!--right-content-col-->
                    <!--right col qu & answer -->
                </div>
            </div><!--left_side end-->
        </div>
    </div>
@stop
