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
                            <div class="skills_content">
                                <div class="skills_title">
                                    <div class="title  wow fadeInDown"><h1 class="text-center">Education</h1></div>
                                </div>


                                {!! Form::open(['method'=>'post','action'=>'CandidateAuth\CandidateCompleteRegister@register_education_experience']) !!}
                                <div class="all_skills">
                                    <div class="all_skills_content">
                                            <div class="form-conrol">
                                                <label class="control-label col-md-3"> University Name <i class="fa fa-university"></i> </label>
                                                <div class="col-md-7">
                                                    {!! Form::text('university',null,['class'=>'form-control','placeholder'=>'EX: Cairo University..']) !!}
                                                </div>
                                            </div>
                                            <div class="form-conrol">
                                                <label class="control-label col-md-3">Faculty / Institute <i class="fa fa-university"></i> </label>
                                                <div class="col-md-7">
                                                    {!! Form::text('faculty',null,['class'=>'form-control','placeholder'=>'EX: Faculty Of Commerce ..']) !!}
                                                </div>
                                            </div>
                                            <div class="form-conrol">
                                                <label class="control-label col-md-3">Major <i class="fa fa-graduation-cap"></i>  </label>
                                                <div class="col-md-7">
                                                    {!! Form::text('major',null,['class'=>'form-control','placeholder'=>'EX: Accounting..']) !!}
                                                </div>
                                            </div>
                                            <div class="form-conrol">
                                                <label class="control-label col-md-3">Degree  <i class="fa fa-star" aria-hidden="true"></i> </label>
                                                <div class="col-md-7">
                                                    {!! Form::text('degree',null,['class'=>'form-control','placeholder'=>'EX: V.Good..']) !!}
                                                </div>
                                            </div>
                                            <div class="form-conrol">
                                                <label class="control-label col-md-3">Start Date <i class="fa fa-calendar" aria-hidden="true"></i>  </label>
                                                <div class="col-md-7">
                                                    {!! Form::date('university_start_date',null,['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div id="end" class="form-conrol">
                                                <label class="control-label col-md-3">End Date <i class="fa fa-calendar" aria-hidden="true"></i>  </label>
                                                <div class="col-md-7">
                                                    {!! Form::date('university_end_date',null,['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                    </div><!--/.all_skills_content-->
                                </div><!--/.all_skills-->
                                <div class="skills_title">
                                    <div class="title  wow fadeInDown"><h1 class="text-center">Experience</h1></div>
                                </div>
                                <div id="multiple_items">
                                    <div id="1" class="all_skills">
                                        <div class="all_skills_content">
                                            <div class="form-conrol">
                                                <label class="control-label col-md-3"> Job Title <i class="fa fa-university"></i> </label>
                                                <div class="col-md-7">
                                                    <input type="text" name="job_title[]" class="form-control" placeholder="Job Title">
                                                </div>
                                            </div>
                                            <div class="form-conrol">
                                                <label class="control-label col-md-3">Company Name<i class="fa fa-university"></i> </label>
                                                <div class="col-md-7">
                                                    <input type="text" name="company_name[]" class="form-control" placeholder="Company Name">
                                                </div>
                                            </div>
                                            <div class="form-conrol">
                                                <label class="control-label col-md-3">Company Location<i class="fa fa-university"></i> </label>
                                                <div class="col-md-7">
                                                    <input type="text" name="company_location[]" class="form-control" placeholder="Company Location">
                                                </div>
                                            </div>
                                            <div class="form-conrol">
                                                <label class="control-label col-md-3">Salary <i class="fa fa-graduation-cap"></i>  </label>
                                                <div class="col-md-7">
                                                    <input type="text" name="salary[]" class="form-control" placeholder="Ex: 2000">
                                                </div>
                                            </div>
                                            <div class="form-conrol">
                                                <label class="control-label col-md-3">Start Date <i class="fa fa-calendar" aria-hidden="true"></i>  </label>
                                                <div class="col-md-7">
                                                    <input type="date" name="start_date[]" class="form-control">
                                                </div>
                                            </div>
                                            <div id="end" class="form-conrol">
                                                <label class="control-label col-md-3">End Date <i class="fa fa-calendar" aria-hidden="true"></i>  </label>
                                                <div class="col-md-7">
                                                    <input type="date" name="end_date[]" class="form-control">
                                                </div>
                                            </div>
                                            <div id="end" class="form-conrol">
                                                <label class="control-label col-md-3">Job Description <i class="fa fa-calendar" aria-hidden="true"></i>  </label>
                                                <div class="col-md-7">
                                                    <textarea type="text" name="job_description[]" class="form-control">
                                                        </textarea>
                                                </div>
                                            </div>


                                            <div id="end" class="form-conrol">
                                                <label class="control-label col-md-3">Current <i class="fa fa-calendar" aria-hidden="true"></i>  </label>
                                                <div class='col-md-1 checkbox'>
                                                    <input type='checkbox'  name='current[]' >
                                                </div>
                                            </div>
                                        </div><!--/.all_skills_content-->
                                        <div class="remove_button"> <button id="1" class="btn_remove">Remove</button> </div>
                                    </div><!--/.all_skills-->

                                </div>
                                <div class="experence-form">
                                    <!--Start Adding New Experience -->
                                    <div class="form-control">
                                        <div class="col-md-12">
                                            <div id="add">
                                                <label class="control-label col-md-12 additional-experiece">Add New Experience <i class="fa fa-plus"></i> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Adding New  Experience -->
                                </div>
                                <div class="text-center fade-in">
                                    <button type="submit" class="btn btn-success">Next</button>
{{--                                    <a href="#" class="return">Return</a>--}}
                                </div>
                                {!! Form::close() !!}
                            </div><!--/.skills_content-->
                        </div><!--/.col-lg-12-->
                    </div><!--/.skills_page-->
                </div><!--/.col-lg-10-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.skills-->
@stop
@section('scripts')
    <script
        src="{{asset('front_assets/js/custom-work-jquery.js')}}">
    </script>
    {{-- append Experience--}}
    <script type="text/javascript">
        $(document).ready(function(){
            var i=1;
            $('#add').click(function(){
                i++;
                $('#multiple_items').append('\n' +
                    '                                <div id="'+i+'" class="all_skills">\n' +
                    '                                    <div class="all_skills_content">\n' +
                    '                                        <div class="form-conrol">\n' +
                    '                                            <label class="control-label col-md-3"> Job Title <i class="fa fa-university"></i> </label>\n' +
                    '                                            <div class="col-md-7">\n' +
                    '                                                <input type="text" name="job_title[]" class="form-control" placeholder="Job Title">\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                        <div class="form-conrol">\n' +
                    '                                            <label class="control-label col-md-3">Company Name<i class="fa fa-university"></i> </label>\n' +
                    '                                            <div class="col-md-7">\n' +
                    '                                                <input type="text" name="company_name[]" class="form-control" placeholder="Company Name">\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                        <div class="form-conrol">\n' +
                    '                                                <label class="control-label col-md-3">Company Location<i class="fa fa-university"></i> </label>\n' +
                    '                                                <div class="col-md-7">\n' +
                    '                                                    <input type="text" name="company_location[]" class="form-control" placeholder="Company Location">\n' +
                    '                                                </div>\n' +
                    '                                            </div>'+
                    '                                        <div class="form-conrol">\n' +
                    '                                            <label class="control-label col-md-3">Salary <i class="fa fa-graduation-cap"></i>  </label>\n' +
                    '                                            <div class="col-md-7">\n' +
                    '                                                <input type="text" name="salary[]" class="form-control" placeholder="Ex: 2000">\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                        <div class="form-conrol">\n' +
                    '                                            <label class="control-label col-md-3">Start Date <i class="fa fa-calendar" aria-hidden="true"></i>  </label>\n' +
                    '                                            <div class="col-md-7">\n' +
                    '                                                <input type="date" name="start_date[]" class="form-control">\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                        <div id="end" class="form-conrol">\n' +
                    '                                            <label class="control-label col-md-3">End Date <i class="fa fa-calendar" aria-hidden="true"></i>  </label>\n' +
                    '                                            <div class="col-md-7">\n' +
                    '                                                <input type="date" name="end_date[]" class="form-control">\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                        <div id="end" class="form-conrol">\n' +
                    '                                                <label class="control-label col-md-3">Job Description <i class="fa fa-calendar" aria-hidden="true"></i>  </label>\n' +
                    '                                                <div class="col-md-7">\n' +
                    '                                                    <textarea type="text" name="job_description[]" class="form-control">\n' +
                    '                                                        </textarea>\n' +
                    '                                                </div>\n' +
                    '                                            </div>'+
                    '                                         <div id="end" class="form-conrol">\n' +
                    '                                            <label class="control-label col-md-3">Current <i class="fa fa-calendar" aria-hidden="true"></i>  </label>\n' +
                    '                                                <div class=\'col-md-1\'><input type=\'checkbox\' id=\'check22\' name=\'current[]\' >\n' +
                    '                                                </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div><!--/.all_skills_content-->\n' +
                    '                                     <div> <button id="'+i+'" class="btn_remove">Remove</button> </div>'+
                    '                                </div> ');
                $('.no-records-found').remove();
            });
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#'+button_id+'').remove();
        });
    </script>

    <script>
        $("form").submit(function () {
            var this_master = $(this);
            this_master.find('input[type="checkbox"]').each( function () {
                var checkbox_this = $(this);


                if( checkbox_this.is(":checked") == true ) {
                    checkbox_this.attr('value','1');
                } else {
                    checkbox_this.prop('checked',true);
                    //DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA
                    checkbox_this.attr('value','0');
                }
            })
        })
    </script>
@stop
