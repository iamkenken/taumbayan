@extends('admin.layout')

@section('content')
<!-- CONTENT -->
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Your <small>Profile</small>                    
                </h1>
                <ol class="breadcrumb">
                	<li>
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home </a>
                    </li>
                	<li>
                        <a href="{{ url('admin/index') }}"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-user"></i> Profile
                    </li>
                </ol>              
            </div>
        </div>
        <!-- /.row -->

        <div class="row">            
            <div class="col-md-12">
              <ul class="nav nav-tabs text-right" role="tablist">
                <li role="presentation" class="active"><a href="#tab-pro" aria-controls="home" role="tab" data-toggle="tab">Profile</a></li>
                <li role="presentation"><a href="#tab-acc" aria-controls="profile" role="tab" data-toggle="tab">Account</a></li>               
              </ul>
            </div>             
        </div>
  
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" style="border-radius: 0; border-top: 0">                                       
                    <div class="panel-body">
                        <div class="tab-content">

                            <div id="tab-pro" class="tab-pane fade in active">
                                <div class="col-md-8">        
                                    {{ Form::open(array('url' => 'admin/profile', 'class' => 'form-horizontal')) }}
                                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                            <label class="col-md-4">First Name</label>

                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="inputfname" name="firstname" value="{{ Input::old('firstname') }}" placeholder="" required>

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
                                                <input type="text" class="form-control" id="inputmname" name="middlename" value="{{ Input::old('middlename') }}" placeholder="">

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
                                                <input type="text" class="form-control" id="inputlname" name="lastname" value="{{ Input::old('lastname') }}" placeholder="">

                                                @if ($errors->has('lastname'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('lastname') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>      

                                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                            <label class="col-md-4 ">Sex</label>
                                        
                                            <div class="col-md-8">
                                                <select name="gender" id="inputsex" class="form-control">
                                                <option value="{{ Input::old('gender') }}" selected disabled style="display: none; ">                                 
                                                @if (Input::old('gender') != "")
                                                    @if (Input::old('gender') == "M")
                                                        Male
                                                    @else
                                                        Female
                                                    @endif
                                                @endif                               
                                                </option>
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
                                                <div class="input-group date" data-provide="datepicker">
                                                    <input type="text" class="form-control dp" name="birthday" id="inputbirthday"  placeholder="">
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

                                        <div class="form-group{{ $errors->has('user_role') ? ' has-error' : '' }}">
                                            <label class="col-md-4">User Role</label>
                                        
                                            <div class="col-md-8">
                                                <select id="inputuserrole" name="user_role" class="form-control">
                                                <option value="{{ Input::old('user_role') }}" selected disabled style="display: none; ">            
                                                @if (Input::old('user_role') == "")                               
                                                <option value="">Administrator</option>
                                                <option value="">Writer</option>  
                                                <option value="">Other</option>  
                                                @endif                       
                                                </select> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" id="edit-frm-profile" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-edit"></i> Edit
                                                </button> 
                                                <button type="submit" id="save-frm-profile" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-user"></i> Save
                                                </button>     
                                            </div>
                                        </div>

                                    {{ Form::close() }}          
                                </div>
                                <div class="col-md-4">  
                                    <form action="admin/profile/update-avatar" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="lbl-emblem">Emblem</label><br/>
                                            @if(Session::has('message-upload'))
                                                <div class="alert alert-success alert-small">{{ Session::get('message-upload') }}</div>
                                            @endif
                                            <input id="file" type="file" name="file" class="file" data-show-preview="false"><br/>
                                            <div id="avatar-cnt">
                                            
                                            <img src="{{ asset('img/users/no_avatar.png') }}" alt="No Avatar" class="img-responsive avatar"/>
                                           
                                            </div>
                                            <br/>
                                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                        </div>
                                    </form>
                                </div>
                            </div>  

                            <div id="tab-acc" class="tab-pane">
                                <div class="col-md-8">        
                                    {{ Form::open(array('url' => 'admin/profile', 'class' => 'form-horizontal')) }}
                                        <div class="form-group">
                                            <label for="inputuname" class="col-sm-4 ">Username/Email</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="inputuname" value="" placeholder="" >          
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputpw" class="col-sm-4 ">Password</label>
                                            <div class="col-sm-8">
                                                <a class="btn btn-danger" id="cr-new-pw">Create New Password</a>
                                                <input type="password" class="form-control pw-grp" name="inputpw" id="inputpw" placeholder="" >                 
                                            </div>
                                        </div>
                                        <div class="form-group pw-grp">
                                            <label for="inputcpw" class="col-sm-4">Confirm Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control" id="inputcpw" placeholder="" >                 
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pw-grp" id="saveacc">Save</button>
                                    {{ Form::close() }}          
                                </div>                               
                            </div>  


                        </div>    
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

