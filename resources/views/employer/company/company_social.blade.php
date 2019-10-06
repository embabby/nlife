@extends('layouts.companies')
@section('content')
    <!--right column where content go's-->
    <div class="right_col" role="main">
        <div class="row company-info">
            <div class="container">
                <div class="up-title">
                    <img class="company-icon wow fadeInDown" src="{{asset('companies_assets/img/company-icon.png')}}">
                    <span class="wow fadeInDown">Social Media</span>
                </div>
                 @if (Session::has('success'))
                     <div class="alert alert-success">{{ Session::get('success') }}</div>
                 @elseif(Session::has('danger'))
                     <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                 @endif
                <div class="sub_title col-lg-12">
                    <small class="some-text wow fadeInDown">Social Media Badges Would Liked In Your Profile Page </small>
                </div>
            </div>
        </div>


        <div class="inner_content col-lg-12">
            <div class="left_side">
                <div class="row content-part1 social-page">
                    <div class="col-lg-12 right-content-col">

                        <!--social-->
                        <div class="social_links">
                            <div class="social_title">
                                <p class="wow fadeInDown">Link your Social Media</p>
                            </div>

                            <div class="link col-lg-12 ">
                                {!! Form::model($company,['method'=>'patch','action'=>['Employer\CompanySocialController@update',$company->id]]) !!}

                                <div class="form-group wow fadeInDown">
                                        <label class="col-sm-3 control-label">Website</label>
                                        <div class="col-sm-7">
                                            {!! Form::text('website',null,['class'=>'form-control']) !!}
                                            @if ($errors->has('website'))
                                                  <div class="alert alert-danger">{{ $errors->first('website') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group wow fadeInDown">
                                        <label class="col-sm-3 control-label">Linked In </label>
                                        <div class="col-sm-7">
                                            {!! Form::text('linked_in',null,['class'=>'form-control']) !!}
                                            @if ($errors->has('linked_in'))
                                                <div class="alert alert-danger">{{ $errors->first('linked_in') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group wow fadeInDown">
                                        <label class="col-sm-3 control-label">Twitter</label>
                                        <div class="col-sm-7">
                                            {!! Form::text('twitter',null,['class'=>'form-control']) !!}
                                            @if ($errors->has('twitter'))
                                                <div class="alert alert-danger">{{ $errors->first('twitter') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group wow fadeInDown">
                                        <label class="col-sm-3 control-label">Facebook</label>
                                        <div class="col-sm-7">
                                            {!! Form::text('facebook',null,['class'=>'form-control']) !!}
                                            @if ($errors->has('facebook'))
                                                <div class="alert alert-danger">{{ $errors->first('facebook') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group wow fadeInDown">
                                        <div class="col-sm-8 post">
                                            <button type="submit" class="btn btn-default">Save Changes</button>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                            </div>
                        </div><!--social_links end-->




                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
