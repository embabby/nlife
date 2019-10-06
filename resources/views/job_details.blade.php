@extends('layouts.front')
<style>
    .app-body ul{
        list-style: none;
        color: #555;
    } 
  


.app-body .time {
    padding-left: 4px;
    color: #aaa;
    text-align: right;
    display: table-cell;
    min-width: 34px;
    font-size: 80%;
    font-weight: 100;
}

.app-body .status-name {
    font-size: 100%;
    text-transform: capitalize;
    display: table-cell;
    /*position: relative;*/
    /*top: 1px;*/
    color: #555;
}

</style>
@section('content')
     @if (Session::has('success'))
         <div class="alert alert-success">{{ Session::get('success') }}</div>
     @elseif(Session::has('danger'))
         <div class="alert alert-danger">{{ Session::get('danger') }}</div>
     @endif
    <div class="job-offer">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="offer-content">
                    <div class="head wow fadeInDown">
                            @if($job->company->cover_image && Storage::exists($job->company->cover_image))
                                <img style="width: 100%" src="{{url(asset('storage/'.$job->company->cover_image))}}" alt="" class="img-responsive img-thumbnail">
                            @else
                            <img src="{{url(asset('storage/companies/default_cover_image.png'))}}" alt="">
                        @endif
                        <div class="container">
                        </div>
                    </div>
                    <div class="logo wow fadeInUp">

                        @if($job->company->logo && Storage::exists($job->company->logo))
                            <img style="width: 100%" src="{{url(asset('storage/'.$job->company->logo))}}" alt="" class="img-responsive img-thumbnail">
                        @else
                            <img src="{{url(asset('storage/companies/default-logo.png'))}}" alt="">
                        @endif

                    </div>
                    <div class="col-md-12">
                        <div class="main-conditions wow fadeInUp">
                            <div class="col-md-4">
                                <ul class="time">
                                    <li>{{$job->job_title}}</li>
                                    <li>
                                        @if($job->hide_company==1)
                                        {{'Confidential'}}
                                        @else
                                        {{$job->company?$job->company->name:''}}
                                        @endif
                                    </li>
                                    <li>{{$job->vacancies}} Vacancies</li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <ul>
                                    <li>
                                        <?php  $counter=0?>
                                        @foreach($job->job_types as $job_type)
                                            <?php $counter++ ?>
                                            {{$job_type->name }}{{$counter < count($job->job_types)?'-':''}}
                                        @endforeach
                                    </li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> {{\Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</li>
                                    <li><i class="fa fa-line-chart" aria-hidden="true"></i> {{$job->career_level?$job->career_level->name:''}}</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul>
                                    <li> <i class="fa fa-map-marker" aria-hidden="true"></i>{{$job->city?$job->city->name:''}}</li>
                                    <li><i class="fa fa-cogs" aria-hidden="true"></i>{{$job->start_years_of_experience}}{{$job->end_years_of_experience?'-'.$job->end_years_of_experience:'+'}}Exp</li>
                                    <li><i class="fa fa-money-bill" aria-hidden="true"></i>
                                        @if($job->hide_salary==1)
                                        {{"Negotiable"}}
                                        @else
                                           {{$job->start_salary .' - '. $job->end_salary }} {{$job->currency->symbol}}
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="job-description wow fadeInUp">
                        {!! $job->job_description !!}
                        </div>
                        <div class="job-description wow fadeInUp">
                            {!! $job->job_requirements !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-xs-12">
                <div class="right-side wow fadeInRight">
                    @if(!Auth::guard('candidate')->check())
                        <a href="{{route('candidate.login')}}" class="applay btn btn-success">Apply Now</a>
                    @else
                        @if(in_array($job->id,Auth::guard('candidate')->user()->job_applications->pluck('id')->toArray()))
                            <button type="button" class="applay btn btn-danger">
                                Already Applied
                            </button>
                        @else
                            <button type="button" class="applay btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                Apply Now
                            </button>
                        @endif
                    @endif
                    {!! Form::open(['method'=>'post','action'=>'Candidate\CandidateSavedJobsController@store']) !!}
                    <input type="hidden" name="job_id" style="display: none" value="{{$job->id}}">
                    @if(!Auth::guard('candidate')->check())
                        <button style="border: none;color: red"><i class="fa fa-heart-o"></i> Save Job</button>
                    @else
                        @if(in_array($job->id,Auth::guard('candidate')->user()->saved_jobs->pluck('id')->toArray()))
                            <button style="border: none;color: red"><i class="fa fa-heart"></i>Un Save Job</button>
                        @else
                            <button style="border: none;color: red"><i class="fa fa-heart-o"></i> Save Job</button>
                        @endif
                    @endif
                    {!! Form::close() !!}


                    @if( Auth::guard('candidate')->check() && in_array($job->id,Auth::guard('candidate')->user()->job_applications->pluck('id')->toArray()))
                    <div class="app-body">
                        <ul class="app-status">
                            <li class="state applied">
                                <span class="status-name">
                                    applied                   
                                </span>
                                <span class="time">                
                                <!-- {!! str_replace(str_split('[]\\/:*?"<>|'), ' ', Auth::guard('candidate')->user()->activity->where('job_id',$job->id)->where('job_application_status_id',1)->pluck('created_at')) !!} -->
                                {!! str_replace(str_split('[]\\/:*?"<>|'), ' ', $user_applied_before->created_at) !!}

                                </span>
                            </li>

                            @if($user_applied_before->job_application_status_id != '1')
                            <li class="state applied">
                                <span class="status-name">
                                   {{ $user_applied_before->job_application_status_id == 2 ? 'Shortlisted' : 'Rejected' }} 
                                </span>
                                <span class="time">                                                
                                {!! str_replace(str_split('[]\\/:*?"<>|'), ' ', $user_applied_before->updated_at) !!}
                                </span>
                            </li>
                            @endif
                            
                        </ul>
                    </div>
                    @endif

                    <h3>RELATED JOB OFFERS</h3>
                        @foreach($similar_jobs as $similar_job)
                    <div class="related">
                        <p><span><a href="{{route('jobs.show',$similar_job->slug)}}">{{$similar_job->job_title}}</a></span></p>
                        @if($similar_job->company)
                        <p>{{$similar_job->company->name}}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             {!! Form::open(['method'=>'post','action'=>'Candidate\JobApplicationController@store']) !!}
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Answer The Following Questions Would Increase Your Accepting Chances</h5>
                 </div>
                 <div class="modal-body">
                     <input type="hidden" name="job_id" style="display: none" value="{{$job->id}}">
                     @foreach($job->job_questions as $question)
                     <div class="form-group">
                         {!! Form::label('',$question->question) !!}
                         {!! Form::textarea('answers['.$question->id.']',null,['class'=>'form-control','required','rows'=>3]) !!}
                     </div>
                     @endforeach
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
