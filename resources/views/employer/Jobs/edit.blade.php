@extends('layouts.companies')
@section('styles')
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css'>

@stop
@section('content')
    <!--right column where content go's-->
    <div class="right_col" role="main">
        <div class="inner_content col-lg-12">
            <div class="left_side">
                <div class="row content-part1 social-page">
                    <div class="col-lg-12 right-content-col">

                    {!! Form::model($job,['method'=>'patch','class'=>'form-horizontal','action'=>['Employer\EmployerJobsController@update',$job->id]]) !!}
                    <!--social-->
                        <div class="social_links">
                            <div class="social_title add_title">
                                <p class="wow fadeInDown">Edit Job</p>
                            </div>
                            <div class="link col-lg-12 ">
                                <div class="form-group wow fadeInDown">
                                    <label class="col-sm-3 control-label">Job Title</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('job_title',null,['class'=>'form-control','required']) !!}
                                        @if ($errors->has('job_title'))
                                            <div class="alert alert-danger">{{ $errors->first('job_title') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group wow fadeInDown">
                                    <label class="col-sm-3 control-label">Country</label>
                                    <div class="col-lg-8">
                                        <select name="country_id" required class="form-control" style="width: 100%">
                                            @foreach($countries as $country)
                                                <option {{$country->id==$job->country_id?'selected':''}} value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country_id'))
                                            <div class="alert alert-danger">{{ $errors->first('country_id') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group wow fadeInDown">
                                    <label class="col-sm-3 control-label">City</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" required name="city_id"  style="width: 100%">
                                            @if($job->country)
                                                @foreach($job->country->cities as $city)
                                                    <option {{$city->id==$job->city_id?'selected':''}} value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('city_id'))
                                            <div class="alert alert-danger">{{ $errors->first('city_id') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group wow fadeInDown">
                                    <label class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('address',null,['class'=>'form-control','required']) !!}
                                        @if ($errors->has('address'))
                                            <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group wow fadeInDown">
                                    <label class="col-sm-3 control-label">job Industry</label>
                                    <div class="col-sm-8">
                                        <select class="label ui selection fluid dropdown form-control" name="job_industries[]" onchange="job_industries()" id="job-industries" multiple="multiple" style="width: 100%">
                                            @foreach($job_industries as $job_industry)
                                                <option {{in_array($job_industry->id,$job_job_industries)?'selected':''}} value="{{$job_industry->id}}">{{$job_industry->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('job_industries[]'))
                                            <div class="alert alert-danger">{{ $errors->first('job_industries[]') }}</div>
                                        @endif
                                        @if ($errors->has('job_industries'))
                                            <div class="alert alert-danger">{{ $errors->first('job_industries') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group wow fadeInDown">
                                    <label class="col-sm-3 control-label">job Tags</label>
                                    <div class="col-sm-8">
                                        <select class="label ui selection fluid dropdown form-control" name="job_industries_tags[]" multiple="multiple" style="width: 100%">
                                            @foreach($job_industries_tags as $job_industries_tag )
                                                    <option {{in_array($job_industries_tag->id,$job_job_industry_tags)?'selected':''}} value="{{$job_industries_tag->id}}">{{$job_industries_tag->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('job_industries_tags[]'))
                                            <div class="alert alert-danger">{{ $errors->first('job_industries_tags[]') }}</div>
                                        @endif
                                        @if ($errors->has('job_industries_tags'))
                                            <div class="alert alert-danger">{{ $errors->first('job_industries_tags') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group wow fadeInDown">
                                    <label class="col-sm-3 control-label">job Type</label>
                                    <div class="col-sm-8">
                                        <select  required class="label ui selection fluid dropdown form-control" name="job_types[]" multiple="multiple" style="width: 100%">
                                            @foreach($job_types as $job_type)
                                                <option {{in_array($job_type->id,$job_job_types)?'selected':''}} {{ (collect(old('job_types'))->contains($job_type->id)) ? 'selected':'' }} value="{{$job_type->id}}">{{$job_type->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('job_types[]'))
                                            <div class="alert alert-danger">{{ $errors->first('job_types[]') }}</div>
                                        @endif
                                        @if ($errors->has('job_types'))
                                            <div class="alert alert-danger">{{ $errors->first('job_types') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group wow fadeInDown">
                                    <label class="col-sm-3 control-label">Career Level</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="career_level_id" style="width: 100%">
                                            @foreach($career_levels as $career_level)
                                                <option {{$job->career_level_id==$career_level->id?'selected':''}} value="{{$career_level->id}}">{{$career_level->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('career_level_id'))
                                            <div class="alert alert-danger">{{ $errors->first('career_level_id') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group wow fadeInDown">
                                    <label class="col-sm-3 control-label">Experience</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="experience" value="{{$job->start_years_of_experience}}{{$job->end_years_of_experience?'-':'+'}}{{$job->end_years_of_experience}}" class="form-control" required placeholder="1+ Or 1-9 Or 1">
                                        @if ($errors->has('experience'))
                                            <div class="alert alert-danger">{{ $errors->first('experience') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group wow fadeInDown">
                                    <label class="col-sm-3 control-label">Vacancies</label>
                                    <div class="col-sm-8">
                                        {!! Form::number('vacancies',null,['class'=>'form-control','required']) !!}
                                        @if ($errors->has('vacancies'))
                                            <div class="alert alert-danger">{{ $errors->first('vacancies') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group wow fadeInDown">
                                    <label class="col-sm-3 control-label">Salary Range</label>
                                    <div class="col-sm-4">
                                        <label>from</label>
                                        {!! Form::number('start_salary',null,['class'=>'form-control','step'=>"0.01",'required']) !!}
                                        @if ($errors->has('start_salary'))
                                            <div class="alert alert-danger">{{ $errors->first('start_salary') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-sm-4">
                                        <label>to</label>
                                        {!! Form::number('end_salary',null,['class'=>'form-control','step'=>"0.01",'required']) !!}
                                        @if ($errors->has('end_salary'))
                                            <div class="alert alert-danger">{{ $errors->first('end_salary') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group wow fadeInDown">
                                    <label class="col-sm-3 control-label">Salary Type</label>
                                    <div class="col-sm-4">
                                        <select name="salary_type_id" class="form-control per">
                                            @foreach($salary_types as $salary_type)
                                                <option {{$salary_type->id==$job->salary_type_id?'selected':''}} value="{{$salary_type->id}}">{{$salary_type->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('salary_type_id'))
                                            <div class="alert alert-danger">{{ $errors->first('salary_type_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="currency_id" class="form-control per">
                                            @foreach($currency_types as $currency_type)
                                                <option {{$currency_type->id==$job->currency_type_id?'selected':''}} value="{{$currency_type->id}}">{{$currency_type->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('currency_id'))
                                            <div class="alert alert-danger">{{ $errors->first('currency_id') }}</div>
                                        @endif
                                        <div class="checkbox">
                                            <label>
                                                <input {{$job->hide_salary==1?'checked':''}} type="checkbox" value="1" name="hide_salary">
                                                Hide Salary
                                            </label>
                                            @if ($errors->has('hide_salary'))
                                                <div class="alert alert-danger">{{ $errors->first('hide_salary') }}</div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div><!--social_links end-->

                        <div class="col-lg-12">
                            <div class="des_social">
                                <div class="form-group wow fadeInDown">
                                    <label class="col-sm-3 control-label">Job Description</label>
                                    <div class="col-sm-8">
                                        {!! Form::textarea('job_description',null,['class'=>'form-control','id'=>'elm1','required']) !!}
                                        @if ($errors->has('job_description'))
                                            <div class="alert alert-danger">{{ $errors->first('job_description') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group wow fadeInDown">
                                    <label class="col-sm-3 control-label">Job Requirement</label>
                                    <div class="col-sm-8">
                                        {!! Form::textarea('job_requirements',null,['class'=>'form-control','id'=>'elm1','required']) !!}
                                        @if ($errors->has('job_requirements'))
                                            <div class="alert alert-danger">{{ $errors->first('job_requirements') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group wow fadeInDown" id="1">
                                    <label class="col-sm-3 control-label">Questions</label>
                                    <div class="col-sm-8">
                                        <div class="all_quest" id="questions">
                                            <?php $counter=0 ?>
                                            @foreach($job->job_questions as $question)
                                                <?php $counter++ ?>
                                                <div id="{{$counter}}" class="quest">
                                                    <input type="text" name="questions[]" class="col-md-10" value="{{$question->question}}">
                                                    <span class="col-md-2">
                                                            <i class="fa fa-trash btn_remove" id="{{$counter}}" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-primary" id="add">Add Question</button>
                                        @if ($errors->has('questions[]'))
                                            <div class="alert alert-danger">{{ $errors->first('questions[]') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="des_social">
                                <div class="form-group wow fadeInDown">
                                    <label class="col-sm-3 control-label">Advanced</label>
                                    <div class="col-sm-8">
                                        <div class="all_quest">
                                            <div class="checkbox">
                                                <label>
                                                    <input {{$job->hide_company==1?'checked':''}} type="checkbox" name="hide_company" value="1">
                                                    Keep Company confidential
                                                    @if ($errors->has('hide_company'))
                                                        <div class="alert alert-danger">{{ $errors->first('hide_company') }}</div>
                                                    @endif
                                                </label>
                                                <label>
                                                    <input {{$job->receive_emails==1?'checked':''}} type="checkbox" name="receive_emails" value="1">
                                                    Email new Candidates To
                                                    @if ($errors->has('receive_emails'))
                                                        <div class="alert alert-danger">{{ $errors->first('receive_emails') }}</div>
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="email">
                                                    <input required name="email_reference" value="{{$job->email_reference?$job->email_reference:$company->email_preference}}">
                                                    @if ($errors->has('email_reference'))
                                                        <div class="alert alert-danger">{{ $errors->first('email_reference') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group wow fadeInDown">
                            <div class="col-sm-12 post_job">
                                <button type="submit" class="btn btn-default">Save Changes</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script
        src="{{asset('front_assets/js/custom-work-jquery.js')}}">
    </script>
    <!-- Wysiwig js-->
    <script src="{{asset('companies_assets/js/tinymce/tinymce.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            if($("#elm1").length > 0){
                tinymce.init({
                    selector: "textarea#elm1",
                    theme: "modern",
                    height:300,
                    plugins: [
                        "advlist",
                        "searchreplace",
                        "save"
                    ],
                    toolbar: "insertfile | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
        });
    </script>

    <script>
        function job_industries() {
            var industries = $('#job-industries').val();
            if(industries) {
                $.ajax({
                    url: window.location.origin+'/industries/tags/'+JSON.stringify(industries),
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        // $('select[name="job_industries_tags[]"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="job_industries_tags[]"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                // $('select[name="job_industries_tags[]"]').empty();
            }
        }
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js'></script>
    <script  src="{{asset('companies_assets/js/multi-select-script.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="country_id"]').on('change', function() {
                var country_id = $(this).val();
                if(country_id) {
                    $.ajax({
                        url: window.location.origin+'/cities/ajax/'+country_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="city_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="city_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="city_id"]').empty();
                }
            });
        });
    </script>

    {{-- append Questons--}}
    <script type="text/javascript">
        $(document).ready(function(){
            var i=1;
            $('#add').click(function(){
                i++;
                $('#questions').append('  <div id="'+i+'" class="quest">\n' +
                    '<input type="text" name="questions[]" class="col-md-10" value="">\n' +
                    '<span class="col-md-2">\n' +
                    '<i class="fa fa-trash btn_remove" aria-hidden="true" id="'+i+'"></i>\n' +
                    '</span>\n' +
                    '</div>');
                $('.no-records-found').remove();
            });
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");

            $('#'+button_id+'').remove();
        });
    </script>

@stop
