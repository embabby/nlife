@extends('layouts.company_profile')
@section('content')
        <div class="Home-content container-fluid">
            <div class="left-element col-lg-8 col-md-12 col-sm-12 col-xs-12 wow slideInLeft">
                <div class="container-fluid tabing">

                    <div class="tab-content">
                        <div id="ben" class="tab-pane fade in active">
                            <h3>Benefits Summary</h3>
                            @foreach($company->benefits_categories as $benefit_category)
                            <div class="heading">
                                <h5>{{$benefit_category->name}}</h5>
                            </div>
                            <div class="content">
                                <ul>
                                    @foreach($company->benefits->where('benefit_category_id',$benefit_category->id) as $benefit)
                                    <li>{{$benefit->name}}</li>
                                        @endforeach
                                </ul>
                                <div class="fix"></div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div> <!--left element-->

           @include('partials.company_related_jobs')
        </div><!--Home-content end-->
@stop
