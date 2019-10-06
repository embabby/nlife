@extends('layouts.front')


@section('content')
    <!--contact_us-->
    <div class="contact_us">
        <!--Start Top Navbar -->


        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="contact_content">
                        <div class="col-lg-6 foo ">
                            <div class="left_contact">
                                <div class="contacts">
                                    <div class="title">
                                        <h3>request a call back</h3>
                                        <p>Send Us Your Inquiry and one Of Our Team Will Call You Back</p>
                                    </div>
                                    <div class="all_details">
                                        <div class="col-lg-12">
                                            <div class="details">
                                                <div class="col-lg-1">
                                                    <div class="left_side">
                                                        <i class="fa fa-building-o" aria-hidden="true"></i>
                                                    </div>
                                                </div>

                                                <div class="col-lg-8">
                                                    <div class="right_side">
                                                        <p>Address :</p>
                                                        <p>{{setting('site.address')}}</p>
                                                    </div>
                                                </div>
                                            </div><!-- /.details -->

                                            <div class="details">
                                                <div class="col-lg-1">
                                                    <div class="left_side">
                                                        <i class="fa fa-phone" aria-hidden="true"></i>

                                                    </div>
                                                </div>

                                                <div class="col-lg-8">
                                                    <div class="right_side">
                                                        <p>Phone :</p>
                                                        <p>{{setting('site.mobile')}}</p>
                                                    </div>
                                                </div>
                                            </div><!-- /.details -->

                                            <div class="details">
                                                <div class="col-lg-1">
                                                    <div class="left_side">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                                    </div>
                                                </div>

                                                <div class="col-lg-8">
                                                    <div class="right_side">
                                                        <p>E-mail :</p>
                                                        <p>{{setting('site.email')}}</p>
                                                    </div>
                                                </div>
                                            </div><!-- /.details -->
                                        </div>
                                    </div><!-- /.all_details -->
                                </div><!-- /.contacts -->
                                <div class="over"></div>
                            </div><!-- /.left_contact -->
                        </div><!-- /.col-lg-8 -->

                        <div class="col-lg-6 foo">
                             @if (Session::has('success'))
                                 <div class="alert alert-success">{{ Session::get('success') }}</div>
                             @elseif(Session::has('danger'))
                                 <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                             @endif
                            <div class="right_contact">
                                <div class="title">
                                    <h1>contact us</h1>
                                </div>
                                    {!! Form::open(['method'=>'post','class'=>'contact_form','action'=>'ContactController@store']) !!}
                                        <div class="form-group">
                                            {!! Form::label('','User Name') !!}
                                            {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Your Name','maxlength'=>'100']) !!}
                                            @if ($errors->has('name'))
                                                  <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                    <div class="form-group">
                                        {!! Form::label('','Email Address') !!}
                                        {!! Form::email('email',null,['class'=>'form-control','required','placeholder'=>'Your E-mail','maxlength'=>'100']) !!}
                                        @if ($errors->has('email'))
                                              <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('','Message') !!}
                                        {!! Form::textarea('message',null,['class'=>'form-control','required','rows'=>5,'placeholder'=>'Your Text','maxlength'=>'100']) !!}
                                        @if ($errors->has('message'))
                                              <div class="alert alert-danger">{{ $errors->first('message') }}</div>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                    {!! Form::close() !!}
                            </div>
                        </div>
                    </div><!-- /.contact_content -->
                </div><!-- /.col-lg-10 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!--/.contact_us-->
@stop
