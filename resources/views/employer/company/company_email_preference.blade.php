@extends('layouts.companies')
@section('content')
    <div class="all_content">
        <div class="right_col" role="main">
            <div class="row company-info">
                <div class="container">
                    <div class="up-title col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <img class="company-icon wow fadeInDown" src="{{asset('companies_assets/img/toggle.png')}}">
                        <span class="wow fadeInDown" >Email Preference</span>
                    </div>
                </div>
            </div>

            <!--inner_content-->
            <div class="inner_content col-lg-12">
                <div class="left_side">
                    <div class="update-content-part1">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-content-col">

                            <div class="email-pre-title-steps ">
                                <span class="wow fadeInDown" data-wow-duration="1s">Account Preference</span>
                            </div>

                             @if (Session::has('success'))
                                 <div class="alert alert-success">{{ Session::get('success') }}</div>
                             @elseif(Session::has('danger'))
                                 <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                             @endif
                                {!! Form::model($company,['method'=>'patch','class'=>'form_box','action'=>['Employer\CompanyEmailPreferenceController@update',$company->id]]) !!}

                                <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="email-pre-form  wow fadeInDown" data-wow-duration="2s">
                                        <label for="usr">Preference Email Address</label>
                                        <input type="email" name="email_preference" class="form-control" id="usr" value="{{$company->email_preference}}">
                                   @if ($errors->has('email_preference'))
                                         <div class="alert alert-danger">{{ $errors->first('email_preference') }}</div>
                                   @endif
                                    </div>
                                </div>


                                <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="email-pre-form wow fadeInDown" data-wow-duration="2s">
                                        <label for="usr">Receive Emails</label>
                                        <input {{$company->receive_emails==1?'checked':''}} name="receive_emails" value="1" type="checkbox" class="form-control" >
                                        @if ($errors->has('receive_emails'))
                                              <div class="alert alert-danger">{{ $errors->first('receive_emails') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="save-delete-email-pre p1 col-lg-12 wow fadeInDown" data-wow-duration="2s">
                                    <button type="submit" class="btn-save">Save Changes</button>
                                </div>

                            {!! Form::close() !!}
                        </div><!--right-content-col end-->
                    </div> <!--update-content-part1-->


                    <!--right col qu & answer -->

                </div><!--left_side  end-->
            </div><!--inner_content end-->

        </div><!--right_col-->
    </div><!--all_content-->
@stop
