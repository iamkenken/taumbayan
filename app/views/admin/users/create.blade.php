@extends('admin.layout')

@section('content')
<!-- CONTENT -->
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Create <small>User</small>
                    <a href="{{ url('admin/users/view') }}" class="pull-right"><small><span class="glyphicon glyphicon-list-alt" title="View All Users"></span></small></a>
                </h1>
                <ol class="breadcrumb">
                	<li>
                        <a href="{{ url('admin/index') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-group"></i> Users
                    </li>
                    <li class="active">
                        Create
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
	        <div class="col-md-8">
                <div class="panel panel-default">                                       
                    <div class="panel-body">
                        {{ Form::open(array('url' => 'admin/users/create', 'class' => 'form-horizontal')) }}
                            @if(Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @endif

                            @if(Session::has('errormsg'))
                            <div class="alert alert-danger">{{ Session::get('errormsg') }}</div>
                            @endif

                            <div class="form-group{{ $errors->has('user_role') ? ' has-error' : '' }}">
                                <label class="col-md-4">User Role</label>
                            
                                <div class="col-md-8">
                                    <select id="user_role" name="user_role" class="form-control">           
                                    @if (Input::old('user_role') == "taumbayan" || Input::old('user_role') == "")          
                                    <option value="taumbayan">Taumbayan</option>                       
                                    <option value="admin">Administrator</option>
                                    @endif       

                                    @if (Input::old('user_role') == "admin")                        
                                    <option value="admin">Administrator</option>       
                                    <option value="taumbayan">Taumbayan</option>  
                                    @endif                  
                                    </select> 
                                </div>
                            </div>

                            <div id="username" class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label class="col-md-4">Username</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="username" value="{{ Input::old('username') }}" placeholder="">

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <label class="col-md-4">First Name</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="firstname" value="{{ Input::old('firstname') }}" placeholder="">

                                    @if ($errors->has('firstname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('middlename') ? ' has-error' : '' }}">
                                <label class="col-md-4">Middle Name</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="middlename" value="{{ Input::old('middlename') }}" placeholder="">

                                    @if ($errors->has('middlename'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('middlename') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <label class="col-md-4">Last Name</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="lastname" value="{{ Input::old('lastname') }}" placeholder="">

                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 ">E-Mail Address</label>
                                
                                <div class="col-md-8">
                                    <input type="email" class="form-control" name="email" value="{{ Input::old('email').''.Session::get('socialemail') }}" placeholder="">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 ">Password</label>

                                <div class="col-md-8">
                                    <input type="password" class="form-control" name="password" placeholder="">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 ">Confirm Password</label>

                                <div class="col-md-8">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="" >

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label class="col-md-4 ">Gender</label>
                            
                                <div class="col-md-8">
                                    <select id="gender" name="gender" class="form-control">                              
                                    @if (Input::old('gender') != "")
                                    <option value="{{ Input::old('gender') }}">   
                                        @if (Input::old('gender') == "M")
                                            Male
                                        @else
                                            Female
                                        @endif                             
                                    </option>
                                    @endif  
                                     @if (Input::old('gender') == "F")
                                    <option value="M">Male</option>
                                    @endif
                                     @if (Input::old('gender') == "M")
                                    <option value="F">Female</option>  
                                    @endif    
                                    @if (Input::old('gender') == "")                                
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>  
                                    @endif                       
                                    </select>  
                            
                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                                <label class="col-md-4 ">Birthday</label>
                            
                                <div class="col-md-8">
                                    <div class="input-group date" data-provide="datepicker" style="z-index:1151 !important;">
                                        <input type="text" class="form-control dp" name="birthday" id="dob"  placeholder="">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                        </div>
                                        @if ($errors->has('birthday'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('birthday') }}</strong>
                                        </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Create
                                    </button>     
                                </div>
                            </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">                                       
                    <div class="panel-body">
                        <form action="/admin/users/create/update-avatar" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="lbl-emblem">Emblem</label>                      
                                <input id="file" type="file" name="file" class="file"><br/>                            
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
  		</div>
        <!-- /.row -->        

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

@endsection

