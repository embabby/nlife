@extends('layouts.company_profile')
@section('content')
    <div class="Home-content container-fluid">
        <div class="left-element col-lg-8 col-md-12 col-sm-12 col-xs-12 wow slideInLeft">
            <div class="container-fluid gal-container">
                @foreach($company_images as $image)
                    @if(Storage::exists($image->image))
                <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#5">
                            <img src="{{url(asset('storage/'.$image->image))}}" alt="{{$image->title}}">
                        </a>
                        <div class="modal fade" id="5" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="{{url(asset('storage/'.$image->image))}}" alt="{{$image->title}}">
                                    </div>
                                    <div class="col-md-12 description">
                                        <h4>{{$image->title}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endif
                @endforeach
            </div>
            <div class="container-fluid">
                <div class="next">
                    <div class="pre right">
                        {{$company_images->links()}}
                    </div>
                </div>
            </div>
        </div> <!--left element-->

    @include('partials.company_related_jobs')
    </div><!--Home-content end-->
@stop
