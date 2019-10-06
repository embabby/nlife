@extends('layouts.front')
@section('styles')
    <style>
        .bak{ background-color: greenyellow; color: #0eb78c; font-weight:bold; }
    </style>
@stop

@section('content')

    <div class="skills" >
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

                        {!! Form::open(['method'=>'post','action'=>'CandidateAuth\CandidateCompleteRegister@post_register_job_industry']) !!}
                        <div class="col-lg-12">
                            <div class="skills_content">
                                <div class="skills_title">
                                    <div class="title  wow fadeInDown"><h1 class="text-center">Job Industry</h1></div>
                                </div>
                              @if ($errors->has('job_industries'))
                                    <div class="alert alert-danger">{{ $errors->first('job_industries') }}</div>
                              @endif
{{--for less than three industries--}}
                                 @if(Session::has('danger'))
                                     <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                                 @endif
                                <div class="all_skills">
                                    <div class="all_skills_content">
                                        @foreach($job_industries as $job_industry)
                                            <div class="col-lg-3" style="cursor: pointer"  onclick="set_industry({{$job_industry->id}})">
                                                <div id="{{$job_industry->id}}"   class="box_skills wow fadeIn " data-wow-duration="2s">
                                                    <i   class="{{$job_industry->font_icon}}" aria-hidden="true"></i>
                                                    <h3 id="job_industry_font{{$job_industry->id}}" >{{$job_industry->name}}</h3>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div><!--/.all_skills_content-->
                                </div><!--/.all_skills-->
                                <input type="hidden" id="job_industries" name="job_industries">
                                <div class="text-center fade-in">
                                    <button type="submit" class="btn btn-success">Next</button>
                                </div>
                            </div><!--/.skills_content-->
                        </div><!--/.col-lg-12-->
                        {!! Form::close() !!}

                    </div><!--/.skills_page-->
                </div><!--/.col-lg-10-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.skills-->
@stop

@section('scripts')
    <script>
        var industries=[];
        function set_industry(industry_id){
            if (industries.includes(industry_id)){
                for( var i = 0; i < industries.length; i++){
                    if ( industries[i] === industry_id) {
                        industries.splice(i, 1);

                    }
                }
                document.getElementById(industry_id).style.backgroundColor = '';
                document.getElementById('job_industry_font'+industry_id).style.color ='';

            }else {
                industries.push(industry_id);
                document.getElementById(industry_id).style.backgroundColor = '#c7c7c7';
                document.getElementById('job_industry_font'+industry_id).style.color ='white';

            }


            document.getElementById('job_industries').value=industries

        }
    </script>





@stop
