@extends('layouts.resources')
@section('content')

    <div class="cover">
        <img src="{{url(asset('storage/'.$blog->cover_image))}}" alt="{{$blog->slug}}">
    </div>
    <div class="content">
        <div class="container page-content">
            <div class="sub-header  wow fadeInDown">
                <span>{{$blog->title}}</span>
            </div>
            <div class="main-content container-fluid">
                <div class="boxes">
                    {!! $blog->body !!}

                </div>
            </div>
        </div>
    </div>

@stop
