@extends('layouts.resources')
@section('content')
    <div class="cover">
        <img src="{{asset('resources_assets/img/blog-cover.png')}}">
    </div>
    <div class="content">
        <div class="container page-content">
            <div class="sub-header  wow fadeInDown">
                <span>Popular Topics From Our Blog</span>
            </div>
            <div class="main-content container-fluid">
                <div class="boxes">
                    @foreach($blogs as $blog)
                    <div class="box col-lg-4 col-md-4 col-sm-4 wow zoomIn">
                        <img src="{{url(asset('storage/'.$blog->image))}}" alt="{{$blog->slug}}" class="img-responsive img-thumbnail">
                        <div class="title">
                            <span>{{$blog->title}}</span>
                        </div>
                        <div class="text">
                            <p>{{substr(sanitize($blog->body),0,220)}}
                            <div class="read-btn">
                                <a href="{{route('blog.show',$blog->slug)}}">Read All</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="text-center">{{$blogs->links()}}</div>
        </div>
    </div>

@stop
