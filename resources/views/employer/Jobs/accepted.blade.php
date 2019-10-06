@extends('layouts.companies')
@section('content')
    <!--right column where content go's-->
    <div class="right_col" role="main">
        <div class="row company-info">
            <div class="container">
                <div class="up-title">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <h2 class="wow fadeInDown">{{$job->job_title}} <br><p>{{\Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</p></h2>
                    <span class="badge">Status</span>
                    <a class="btn btn-primary" style="float: right" href="{{route('employer-jobs.edit',$job->id)}}">Edit Job</a>
                </div>
            </div>
        </div>
        <!---table---->
        <div class="table_candidate">
            <div class="candidate_link">
                <div class="col-lg-12">
                    <div class="left">
                        <div class="col-lg-2">
                            <div class="inbox" style="background-color: #C0C1C3">
                                <a href="{{route('employer-jobs.applied',$job->slug)}}">
                                    {{ $job->jobApplicants->count()}}
                                    <br>
                                    Applied
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="shortlist" style="background-color: #C0C1C3">
                                <a href="{{route('employer-jobs.shortlisted',$job->slug)}}">
                                    {{ $job->jobApplicants->where('job_application_status_id',\Config::get('constants.SHORTLISTED'))->count()}}
                                    <br>
                                    Shortlisted
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="accepeted">
                                <a href="{{route('employer-jobs.accepted',$job->slug)}}">
                                    {{ $job->jobApplicants->where('job_application_status_id',\Config::get('constants.ACCEPTED'))->count()}}
                                    <br>
                                    Accepted
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="hired" style="background-color: #C0C1C3">
                                <a href="{{route('employer-jobs.rejected',$job->slug)}}">
                                    {{ $job->jobApplicants->where('job_application_status_id',\Config::get('constants.REJECTED'))->count()}}
                                    <br>
                                    Rejected
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-lg-offset-2">
                            <div class="right_sort">
                                <ul class="sort">
                                    <li class="dropdown">
                                        <a href="{{route('jobs.show',$job->slug)}}" role="button" aria-haspopup="true" aria-expanded="false">View Job</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="inner_content col-lg-12">
                <div class="left_side">
                    <div class="row">
                        <div class="update-content-part1">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-content-col">

                                <div class="admin">
                                    <div class="user  wow fadeInUp">
                                        <div class="Reviews_table table-responsive wow fadeInDown" style="overflow-x:auto;">
                                            <table class="table table-hover table-bordered table-responsive">
                                                <th>Candidate</th>
                                                <th>Experience</th>
                                                <th>Education</th>
                                                <th>Age</th>
                                                <th>Apply Date</th>

                                                @foreach($job->jobApplicants->where('job_application_status_id',\Config::get('constants.ACCEPTED')) as $applicant)
                                                    @if($applicant->candidate)
                                                        <tr>
                                                            <td>                                                            
                                                                <a href="{{route('employer.candidate.show',[$applicant->candidate->slug,$job->slug])}}">
                                                                @if($applicant->candidate->avatar && Storage::exists($applicant->candidate->avatar))
                                                                    <img src="{{url(asset('storage/'.$applicant->candidate->avatar))}}" class="img-responsive">
                                                                @else
                                                                    <img src="{{url(asset('storage/'.gender_image($applicant->candidate->gender_id)))}}"  class="img-responsive" alt="">
                                                                @endif
                                                                {{$applicant->candidate->first_name}}
                                                                {{$applicant->candidate->last_name}}
                                                                @if($applicant->opened_contact==0)
                                                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                                                @else
                                                                    <i class="fa fa-unlock" aria-hidden="true"></i>
                                                                @endif
                                                                @if($applicant->downloaded_cv==0)
                                                                @else
                                                                    <i style="color: green" class="fa fa-download" aria-hidden="true"></i>
                                                                @endif
                                                                </a>
                                                            </td>
                                                            <td>{{$applicant->candidate->years_of_experience->name}}</td>
                                                            <td>{{$applicant->candidate->university}}-{{$applicant->candidate->faculty}}-{{$applicant->candidate->degree}}</td>
                                                            <td>{{\Carbon\Carbon::parse($applicant->candidate->birth_date)->age .'Y'}}</td>
                                                            <td>{{\Carbon\Carbon::parse($applicant->created_at)->diffForHumans()}}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </table>
                                        </div>

                                    </div><!--user end-->
                                </div><!--admin end-->
                            </div>
                        </div> <!--left element-->
                        <!--right col qu & answer -->
                    </div>
                </div>
            </div>
        </div><!--table_candidate-->
    </div>

@stop
