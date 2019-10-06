@extends('layouts.companies')
@section('content')
    <!--right column where content go's-->
    <div class="right_col" role="main">
        <!---table---->
        <div class="table_candidate">
            <div class="inner_content col-lg-12">
                <div class="left_side">
                    <div class="row">
                        <div class="update-content-part1">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-content-col">
                                <div class="admin">
                                    <div class="user  wow fadeInUp">
                                        <div class="Reviews_table table-responsive wow fadeInDown" style="overflow-x:auto;">
                                            <table class="table table-hover table-bordered table-responsive">
                                                <th>#</th>
                                                <th>Candidate</th>
                                                <th>Experience</th>
                                                <th>Education</th>
                                                <th>Age</th>
                                                <th>Apply Date</th>
                                                <?php $counter=1 ?>
                                                @foreach($unlocked_candidates as $unlocked_candidate)
                                                    @if($unlocked_candidate->candidate)
                                                        <tr>
                                                            <td>{{$counter++}}</td>
                                                            <td>
                                                               {{-- <a href="{{route('employer.candidate.show',$unlocked_candidate->candidate->slug)}}">
                                                                --}}
                                                                    <a href="#">
                                                                    @if($unlocked_candidate->candidate->avatar && Storage::exists($unlocked_candidate->candidate->avatar))
                                                                        <img src="{{url(asset('storage/'.$unlocked_candidate->candidate->avatar))}}" class="img-responsive">
                                                                    @else
                                                                        <img src="{{url(asset('storage/'.gender_image($unlocked_candidate->candidate->gender_id)))}}"  class="img-responsive" alt="">
                                                                    @endif
                                                                    {{$unlocked_candidate->candidate->first_name}}
                                                                    {{$unlocked_candidate->candidate->last_name}}
                                                                    @if($unlocked_candidate->opened_contact==0)
                                                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                                                    @else
                                                                        <i class="fa fa-unlock" aria-hidden="true"></i>
                                                                    @endif
                                                                    @if($unlocked_candidate->downloaded_cv==0)
                                                                    @else
                                                                        <i style="color: green" class="fa fa-download" aria-hidden="true"></i>
                                                                    @endif
                                                                </a>
                                                            </td>
                                                            <td>{{$unlocked_candidate->candidate->years_of_experience->name}}</td>
                                                            <td>{{$unlocked_candidate->candidate->university}}-{{$unlocked_candidate->candidate->faculty}}-{{$unlocked_candidate->candidate->degree}}</td>
                                                            <td>{{\Carbon\Carbon::parse($unlocked_candidate->candidate->birth_date)->age .'Y'}}</td>
                                                            <td>{{\Carbon\Carbon::parse($unlocked_candidate->created_at)->diffForHumans()}}</td>
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
