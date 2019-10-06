@extends('layouts.company_profile')
@section('content')

        <div class="Home-content container-fluid">
            <div class="left-element col-lg-8 col-md-12 col-sm-12 col-xs-12 wow slideInLeft">
                <div class="about-company">
                    <p>About Company</p>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th scope="row"><p class="about-company-detailes">INDUSTRY:</p></th>
                            <td>
                                <?php $i=0 ?>
                                {{--                                    {{count($company->job_industries)}}--}}
                                @foreach($company->job_industries as $industry)
                                    <?php $i++ ?>
                                    <span>{{$industry->name}} {{$i<count($company->job_industries)?'-':''}} </span>
                                @endforeach

                            </td>
                            <td><p class="about-company-detailes">WEBSITE:</p></td>
                            <td><a target="_blank" href="{{$company->website}}">{{$company->website?$company->website:'---------'}}</a></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="about-company-detailes">HQ:</p></th>
                            <td>{{$company->country?$company->country->name:'' }} - {{$company->city?$company->city->name:'' }}</td>
                            <td><p class="about-company-detailes">SIZE:</p></td>
                            <td>{{$company->size?$company->size->name:''}}</td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row"><p class="about-company-detailes">FOUNDED:</p></th>
                            <td>{{\Carbon\Carbon::parse($company->founded)->format('M Y')}}</td>
                            <td><p class="about-company-detailes">TYPE:</p></td>
                            <td>{{$company->type?$company->type->name:''}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="company-title">
                    <span>{{$company->name}}</span>
                    <p>{!! $company->about_company !!}</p>
                </div>

                <div class="com-photos">
                    <p>COMPANY PHOTOS</p>
                </div>
                <?php $i=0 ?>
                @foreach($company->images as $image)
                    @if($i <4)
                        <?php $i++ ?>
                        <div class="photo col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <img class="img-responsive img-thumbnail" src="{{asset('company_images/'.$image->image)}}">
                        </div>
                    @endif
                @endforeach

                <div class="all-photos">
                    <a href="#">See all</a>
                </div>

            </div> <!--left element-->
            <!--right element-->
            @include('partials.company_related_jobs')
        </div><!--Home-content end-->

@stop
