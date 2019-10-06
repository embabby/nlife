@extends('layouts.front')
@section('content')

    <div class="skills">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="skills_page">
                        <div class="col-lg-12">
                            <div class="skills_icons">
                                <ul>
                                    <li><a href="#" class="num6 wow fadeInDown" ><img src="{{asset('front_assets/images/think.png')}}"></a></li>
                                    <li><a href="#" class="num9 wow fadeInDown"><img src="{{asset('front_assets/images/exper2.png')}}"></a> </li>
                                    <li><a href="#" class="num7 wow fadeInDown"><img src="{{asset('front_assets/images/3.png')}}"></a> </li>
                                    <li><a href="#" class="num8 wow fadeInDown"> <img src="{{asset('front_assets/images/5.png')}}"></a> </li>
                                </ul>
                            </div><!--/.skills_icons-->
                        </div>

                        <div class="col-lg-12">
                            {!! Form::open(['method'=>'post','action'=>'CandidateAuth\CandidateCompleteRegister@post_register_career_interests']) !!}
                            <div class="skills_content">
                                <div class="skills_title">
                                    <div class="title  wow fadeInDown"><h1 class="text-center">Career</h1>
                                        <p> Tell Us About Your Current Job , Yor Experience  And attributes That will be used To Calculate Your personal Salary </p>
                                    </div>
                                </div>
                                <div class="all_career">
                                    <div class="col-lg-12">
                                        <div class="title">
                                            <div class="green"></div>
                                            <h1>Current Career Level</h1>
                                        </div>
                                        @if ($errors->has('career_level_id'))
                                            <div class="alert alert-danger">{{ $errors->first('career_level_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="career_content">
                                            @foreach($career_levels as $career_level )
                                                <div class="col-lg-3">
                                                    <div onclick="set_career({{$career_level->id}})" id="career_level{{$career_level->id}}" class="career_level box_skills wow fadeIn " data-wow-duration="2s">
                                                        <i class="user {{$career_level->font_icon}}"></i>
                                                        <h3 class="career_level_font" id="career_level_font{{$career_level->id}}">{{$career_level->name}}</h3>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <input type="hidden" name="career_level_id" id="career_level_id">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="title">
                                            <div class="green"></div>
                                            <h1>Job Types</h1>
                                            @if ($errors->has('job_types'))
                                                <div class="alert alert-danger">{{ $errors->first('job_types') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="top_content">
                                        @foreach($job_types as $job_type)
                                            <div  onclick="set_job_type({{$job_type->id}})" class="col-lg-3">
                                                <div id="job_type_id{{$job_type->id}}" class=" type wow fadeIn" data-wow-duration="2s">
                                                    <h3 id="job_type_id_font{{$job_type->id}}">{{$job_type->name}}</h3>
                                                </div>
                                            </div>
                                        @endforeach
                                        <input type="hidden" name="job_types" id="job_types">
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="title">
                                            <div class="green"></div>
                                            <h1>Job Title</h1>
                                        </div>
                                        <div class="Job_title">
                                            <input  name="job_title" required type="text" placeholder="Ex: sales Representative..">
                                        </div>
                                        @if ($errors->has('job_title'))
                                              <div class="alert alert-danger">{{ $errors->first('job_title') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="title">
                                            <div class="green"></div>
                                            <h1>Job Industry Tags</h1>
                                        </div>
                                        <div class="Keywords">
                                            <select required name="job_industry_tags[]" id="myselect" class="form-control" multiple="multiple">
                                                @foreach(Auth::guard('candidate')->user()->candidate_job_industries as $candidate_job_industry )
                                                    @foreach(industry_tags($candidate_job_industry->id) as $tag)
                                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('job_industry_tags'))
                                              <div class="alert alert-danger">{{ $errors->first('job_industry_tags') }}</div>
                                        @endif
                                        @if ($errors->has('job_industry_tags.*'))
                                            <div class="alert alert-danger">{{ $errors->first('job_industry_tags.*') }}</div>
                                        @endif

                                    </div>
                                </div><!--/.all_career-->
                            </div>
                            <div class="text-center fade-in">
                                <button type="submit" class="btn btn-success">Next</button>
                                <a  class="return">Return</a>
                            </div>
                                {!! Form::close() !!}
                        </div><!--/.col-12-->
                    </div><!--/.all_skills-->
                </div><!--/.col-lg-12-->
            </div><!--/.skills_page-->
        </div><!--/.col-lg-10-->
    </div><!--/.row-->
@stop
@section('scripts')
    <script>
        function set_career(career_id){
            document.getElementById('career_level_id').value=career_id;
            $('.career_level').css("background-color", "");
            $('.career_level_font').css("color", "");
            document.getElementById('career_level'+career_id).style.backgroundColor = '#c7c7c7';
            document.getElementById('career_level_font'+career_id).style.color = 'white';

        }
    </script>
    <script>
        var job_types=[];
        function set_job_type(job_type_id){
            if (job_types.includes(job_type_id)){
                for( var i = 0; i < job_types.length; i++){
                    if ( job_types[i] === job_type_id) {
                        job_types.splice(i, 1);
                    }
                }
                document.getElementById('job_type_id'+job_type_id).style.backgroundColor = '';
                document.getElementById('job_type_id_font'+job_type_id).style.color ='';

            }else {
                job_types.push(job_type_id);
                document.getElementById('job_type_id'+job_type_id).style.backgroundColor = '#c7c7c7';
                document.getElementById('job_type_id_font'+job_type_id).style.color ='white';

            }

            document.getElementById('job_types').value=job_types
        }
    </script>

@stop
