@extends('layouts.companies')
@section('content')
    <!--all_content-->
    <div class="all_content">
        <div class="right_col ">
            <div class="row company-info ">
                <div class="container">
                    <div class="up-title header1">
                        <img class="company-icon  wow fadeInDown" src="{{asset('companies_assets/img/company-icon.png')}}">
                        <span class=" wow fadeInDown">Company Benefits</span>
                    </div>
                </div>
            </div><!--company-info end-->
            <!--inner_content-->
            <div class="inner_content">
                <div class="left_side">
                    <div class="col-lg-12 right-content-col">
                        <div class="container-fluid">
                            <div class="benefits-title-steps title_benefits">
                                <div class="sub-benefits-title-steps">
                                    <span class=" wow fadeInDown" data-wow-duration="2s">Verify<span class="title-time  wow fadeInDown" data-wow-duration="2s">The Benefits</span>Your Company Offers By Clicking The Check Box </span>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid update-part1 benifits-part1">
                            <div class="benifit-body">

                                {!! Form::model($company,['method'=>'patch','action'=>['Employer\CompanyBenefitController@update',$company->id],'files'=>true]) !!}
                                @if ($errors->has('benefits'))
                                    <div class="alert alert-danger">{{ $errors->first('benefits') }}</div>
                                @endif
                                @if ($errors->has('benefits.*'))
                                    <div class="alert alert-danger">{{ $errors->first('benefits.*') }}</div>
                                @endif
                                 @if (Session::has('success'))
                                     <div class="alert alert-success">{{ Session::get('success') }}</div>
                                 @elseif(Session::has('danger'))
                                     <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                                 @endif
                                @foreach($benefit_categories as $benefit_category)
                                    <div class="title">
                                        <h3 class="wow fadeInDown">{{$benefit_category->name}}</h3>
                                    </div>
                                    <div class="details wow fadeIn">
                                        <div class="row">
                                            @foreach($benefit_category->benefits as $benefit)
                                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12  ty ty_1">
                                                    <h5>
                                                        <input name="benefits[]" {{in_array($benefit->id,$company_benefits)?'checked':''}} value="{{$benefit->id}}" type="checkbox" aria-label="..."> {{$benefit->name}}
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                                    <hr>
                                    <div class="next next-btn wow fadeInDown">
                                        <button type="submit" style="background-color: #3e9ddd" class="button_post">Save Changes</button>
                                    </div>
                                {!! Form::close() !!}
                            </div><!--benifit-body-->
                        </div><!--update-part1 benifits-part1-->
                    </div> <!--right-content-col end-->
                </div><!--left_side  end-->
            </div><!--inner_content end-->
        </div><!--right_col end-->
    </div><!--all content end-->
@stop
