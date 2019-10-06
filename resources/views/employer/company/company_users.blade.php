@extends('layouts.companies')
@section('content')

    <div class="right_col" role="main">
        <div class="row company-info">
            <div class="container">
                <div class="up-title">
                    <img class="company-icon wow fadeInDown" src="{{asset('companies_assets/img/toggle.png')}}">
                    <span>Manage Users</span>
                </div>
            </div>
        </div>


         @if (Session::has('success'))
             <div class="alert alert-success">{{ Session::get('success') }}</div>
         @elseif(Session::has('danger'))
             <div class="alert alert-danger">{{ Session::get('danger') }}</div>
         @endif
        <div class="inner_content col-lg-12">
            <div class="left_side">
                <div class="row">
                    <div class="update-content-part1">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-content-col">

                            <!--admin-->
                            <div class="admin">
                                <div class="head_admin">
                                    <p class="wow fadeInDown">Company</p>
                                </div>
                                <div class="user">
                                    <div class="name wow fadeInDown">
                                        <div class="user_1 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <lable>Primary ACCount</lable>
                                            <h5>{{$primary_account->first_name.' '.$primary_account->last_name}}</h5>
                                        </div>
                                        <div class="user_1 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <lable>Mobile NO</lable>
                                            <h5>{{$primary_account->phone}}</h5>
                                        </div>
                                    </div><!--name-->

                                    <div class="name_2  wow fadeInDown">
                                        <div class="user_1 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <lable>Job Title</lable>
                                            <h5>{{$primary_account->job_title}}</h5>
                                        </div>
                                        <div class="user_1 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <lable>Primary Email</lable>
                                            <h5>{{$primary_account->email}}</h5>
                                        </div>
                                    </div><!--name_2-->

                                </div><!--user end-->
                            </div><!--admin end-->

                            <div class="admin">
                                <div class="head_admin">
                                    <p class=" wow fadeInDown">Users</p>
                                </div>
                                @if($errors->any())
                                   @foreach ($errors->all() as $error)
                                      <div class="alert alert-danger">{{ $error }}</div>
                                  @endforeach
                                @endif
                                <div class="user  wow fadeInUp">
                                    <div class="Reviews_table table-responsive wow fadeInDown" style="overflow-x:auto;">
                                        <table class="table table-hover table-bordered table-responsive">
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Downloaded CVs</th>
                                            <th>Unlocked Accounts</th>
                                            <th>Job Posts</th>
                                            <th>Action</th>

                                            @foreach($company->employers as $employer)
                                            <tr>
                                                <td>{{$employer->first_name.' '.$employer->last_name}}</td>
                                                <td>{{$employer->email}}</td>
                                                <td>{{$employer->downloaded_cvs}}</td>
                                                <td>{{$employer->unlocked_accounts}}</td>
                                                <td>{{$employer->job_posts}}</td>
                                                <td>
                                                    <!-- pass -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pass{{$employer->id}}">
                                                        Pass
                                                    </button>
                                                    <div class="modal fade" id="pass{{$employer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                                                </div>
                                                                <div class="modal-body">

                                                                        {!! Form::model($employer,['method'=>'patch','action'=>['Employer\CompanyUsersController@changePassword',$employer->id]]) !!}

                                                                        <div class="form-group">
                                                                            <label>Old Password</label>
                                                                            <input name="old_password" type="password" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>New Password</label>
                                                                            <input name="password" type="password" class="form-control">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Confirm Password</label>
                                                                            <input name="password_confirmation" type="password" class="form-control">
                                                                        </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                    {!! Form::close() !!}
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- edit -->
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$employer->id}}">Edit</button>
                                                    <div class="modal fade" id="edit{{$employer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel2">Edit User Account</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                        {!! Form::model($employer,['method'=>'patch','action'=>['Employer\CompanyUsersController@update',$employer->id]]) !!}

                                                                        <div class="form-group col-md-6">
                                                                            <label>First Name</label>
                                                                            {!! Form::text('first_name',$employer->first_name,['class'=>'form-control','required']) !!}

                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label>Last Name</label>
                                                                            {!! Form::text('last_name',$employer->last_name,['class'=>'form-control','required']) !!}
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label>Job Title</label>
                                                                            {!! Form::text('job_title',$employer->job_title,['class'=>'form-control','required']) !!}
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label>Phone No</label>
                                                                            {!! Form::text('phone',$employer->phone,['class'=>'form-control','required']) !!}
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label>Email</label>
                                                                            {!! Form::email('email',$employer->email,['class'=>'form-control','required']) !!}
                                                                        </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label>User Password</label>
                                                                        {!! Form::password('password',null,['class'=>'form-control','required']) !!}
                                                                    </div>
                                                                </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                    {!! Form::close() !!}

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- delete -->
                                                    @if($employer->super_user !=1)
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$employer->id}}">
                                                        Delete
                                                    </button>
                                                    <div class="modal fade" id="delete{{$employer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body modal-delete">
                                                                    <h2>Are you sure you want to Delete ?</h2>
                                                                </div>


                                                                {!! Form::model($employer,['method'=>'delete','action'=>['Employer\CompanyUsersController@destroy',$employer->id]]) !!}
                                                                <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Admin Password</label>
                                                                    <input  name="admin_password" type="password" class="form-control col-md-12">
                                                                </div>
                                                                </div>
                                                                <div class="modal-footer footer-delete">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                                </div>

                                                                {!! Form::close() !!}


                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach

                                        </table>
                                    </div>
                                </div><!--user end-->
                            </div><!--admin end-->
                            <!--admin-->
                            <div class="admin">
                                <div class="head_admin">
                                    <p class=" wow fadeInDown">Add User</p>
                                </div>
                                {!! Form::open(['method'=>'post','action'=>'Employer\CompanyUsersController@store']) !!}
                                <div class="user  wow fadeInUp">
                                    <div class="name">
                                        <div class="user_1 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <lable>First Name</lable>
                                            <input name="first_name" required type="text" class="form-control">
                                            @if ($errors->has('first_name'))
                                                  <div class="alert alert-danger">{{ $errors->first('first_name') }}</div>
                                            @endif
                                        </div>
                                        <div class="user_1 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <lable>Last Name</lable>
                                            <input name="last_name" required type="text" class="form-control">
                                            @if ($errors->has('last_name'))
                                                <div class="alert alert-danger">{{ $errors->first('last_name') }}</div>
                                            @endif
                                        </div>
                                    </div><!--name-->

                                    <div class="name_2">
                                        <div class="user_1 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <lable>Job Title</lable>
                                            <input name="job_title" required type="text" class="form-control">
                                            @if ($errors->has('job_title'))
                                                <div class="alert alert-danger">{{ $errors->first('job_title') }}</div>
                                            @endif
                                        </div>
                                        <div class="user_1 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <lable>Phone No</lable>
                                            <input name="phone" required type="tel" class="form-control">
                                            @if ($errors->has('phone'))
                                                <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                                            @endif
                                        </div>
                                    </div><!--name_2-->

                                    <div class="name_2">
                                        <div class="user_1 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <lable>Email</lable>
                                            <input name="email" required type="text" class="form-control">
                                            @if ($errors->has('email'))
                                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                        <div class="user_1 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <lable>Password</lable>
                                            <input name="password" required type="password" class="form-control">
                                            @if ($errors->has('password'))
                                                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>
                                    </div><!--name_2-->
                                    <div class="save_user  wow fadeInUp">
                                        <button type="submit" class="save">Save</button>
                                    </div>
                                </div><!--user end-->
                                {!! Form::close() !!}


                            </div><!--admin end-->
                        </div>
                    </div> <!--left element-->
                    <!--right col qu & answer -->
                </div>
            </div>
        </div>
    </div>
@stop
