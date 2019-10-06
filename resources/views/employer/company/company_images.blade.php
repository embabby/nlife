@extends('layouts.companies')

@section('styles')
    <style>

        .file-upload-phoo{
            background-color: #ffffff;
            width:100%;
            height:auto;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .file-upload-btn {
            width: 100%;
            margin: 0;
            color: white;
            background: #286d9c;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #3498db;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .file-upload-btn:hover {
            background: #3498db;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .file-upload-btn:active {
            border: 0;
            transition: all .2s ease;
        }

        .file-upload-content {
            display: none;
            text-align: center;
        }

        .file-upload-input {
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            outline: none;
            opacity: 0;
            cursor: pointer;
        }

        .image-upload-wrap {
            margin-top: 20px;
            border: 4px dashed #3498db;
            position: relative;
        }

        .image-dropping,
        .image-upload-wrap:hover {
            background-color:#3498db;
            border: 4px dashed #ffffff;
            color: white;
        }

        .image-upload-wrap:hover .drag-text h3{
            color: white;
        }

        .image-title-wrap {
            padding: 0 15px 15px 15px;
            color: #222;
        }

        .drag-text {
            text-align: center;
        }

        .drag-text h3 {
            font-weight: 100;
            text-transform: uppercase;
            color: #bebebe;
            padding: 60px 0;
            font-size: 20px;
        }


        .file-upload-image {
            max-height: 200px;
            max-width: 200px;
            margin: auto;
            padding: 20px;
        }

        .remove-image {
            width: 200px;
            margin: 0;
            color: #fff;
            background: #cd4535;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #b02818;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .remove-image:hover {
            background: #c13b2a;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .remove-image:active {
            border: 0;
            transition: all .2s ease;
        }
    </style>
@stop
@section('content')

    <div class="right_col" role="main">
        <div class="row company-info">
            <div class="container">
                <div class="up-title">
                    <img class="company-icon wow fadeInDown" src="{{asset('companies_assets/img/company-icon.png')}}">
                    <span class="wow fadeInDown">Company Photos</span>
                </div>
            </div>
        </div>

         @if (Session::has('success'))
             <div class="alert alert-success">{{ Session::get('success') }}</div>
         @elseif(Session::has('danger'))
             <div class="alert alert-danger">{{ Session::get('danger') }}</div>
         @endif
        <!--inner_content-->
        <div class="inner_content col-lg-12">
            <div class="left_side">
                <div class="row content-part1">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-content-col">
                        <div class="container-fluid gal-container wow fadeInUp">

                            @foreach($company->images as $image)
                                    <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                                        <div class="box">
                                            <a class="close" style="color: darkred" data-toggle="modal" data-target="#delete{{$image->id}}">&times;</a>
                                    <a href="#" data-toggle="modal" data-target="#{{$image->id}}">
                                        <img src="{{url(asset('storage/'.$image->image))}}" alt="{{url(asset('storage/'.$image->image))}}"  >
                                    </a>
                                    <div class="modal fade" id="{{$image->id}}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                <div class="modal-body">
                                                    <img src="{{url(asset('storage/'.$image->image))}}" alt="{{$image->title}}" class="img-responsive"  >
                                                </div>
                                                <div class="col-md-12 description">
                                                    <h4>{{$image->title}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                            <!--  delete Modal -->
                                            <div class="modal fade" id="delete{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body modal-delete">
                                                            <h2 style="color: darkred">Are you sure you want to Delete ?</h2>
                                                        </div>
                                                        {!! Form::open(['method'=>'delete','action'=>['Employer\CompanyImagesController@destroy',$image->id]]) !!}
                                                        <div class="modal-footer footer-delete">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                            </div>
                                @endforeach

                        </div> <!--photos part1-->



                        <div class="add col-lg-12">

                            <div class=" col-lg-10 col-lg-offset-1">

                                {!! Form::model($company,['method'=>'patch','class'=>'add_text wow fadeInUp','action'=>['Employer\CompanyImagesController@update',$company->id],'files'=>'true']) !!}
                                    <!--codepen-->
                                    <div class="col-lg-4 col-lg-offset-4">
                                        <div class="file-upload-phoo">
                                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                                            <div class="image-upload-wrap">
                                                <input class="file-upload-input" name="image" type='file' onchange="readURL(this);" accept="image/*" />
                                                <div class="drag-text">
                                                    <h3>Drag and drop a file or select add Image</h3>
                                                </div>
                                            </div>
                                            <div class="file-upload-content">
                                                <img class="file-upload-image" src="#" alt="your image" />
                                                <div class="image-title-wrap">
                                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('image'))
                                          <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                                    @endif
                                    <!---codepen-->
                                    <textarea required class="form-control text_photo" name="title" placeholder="Say Something about this Photo......." rows="4"></textarea>

                                    @if ($errors->has('title'))
                                          <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                    @endif
                                    <div class="save_photos col-lg-12" >
                                        <button type="submit" class="btn btn-default">Save</button>
                                    </div>

                                {!! Form::close() !!}

                            </div>

                        </div><!--add end-->
                    </div> <!--left element-->
                    <!--right col qu & answer -->
                </div>

            </div>
        </div>
    </div>

@stop
@section('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-upload-wrap').hide();

                    $('.file-upload-image').attr('src', e.target.result);
                    $('.file-upload-content').show();

                    $('.image-title').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);

            } else {
                removeUpload();
            }
        }

        function removeUpload() {
            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
        }
        $('.image-upload-wrap').bind('dragover', function () {
            $('.image-upload-wrap').addClass('image-dropping');
        });
        $('.image-upload-wrap').bind('dragleave', function () {
            $('.image-upload-wrap').removeClass('image-dropping');
        });

    </script>
@stop
