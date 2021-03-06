@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    {{ Form::open(array('url' => '/register', 'class' => 'form-horizontal')) }}
                        @if ($errors->first('g-recaptcha-response'))
                            <div class="alert alert-danger alert-small">Please confirm that you are not a robot.</div>
                        @endif

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="firstname" value="{{ Input::old('firstname') }}" placeholder="First Name *">

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lastname" value="{{ Input::old('lastname') }}" placeholder="Last Name *">

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ Input::old('email').''.Session::get('socialemail') }}" placeholder="Email *">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="Password *">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password *" >

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Gender</label>
                        
                            <div class="col-md-6">
                                <select id="gender" name="gender" class="sel-cs">
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
                                <option value="" selected disabled style="display: none; ">Sex *</option>
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
                            <label class="col-md-4 control-label">Birthday</label>
                        
                            <div class="col-md-6">
                                <div class="input-group date" data-provide="datepicker" style="z-index:1151 !important;">
                                    <input type="text" class="form-control dp" name="birthday" id="bod"  placeholder="Birthday *">
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
                            <div class="col-md-12 text-center">
                            <center>
                                {{ Form::captcha() }} 
                            </center>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>     
                            </div>
                        </div>

                    {{ Form::close() }}

                    <div class="social-login-icons">                
                    <a href="{{ url('login/gplus/') }}">{{ HTML::image('img/g-plus-icon.png') }}</a>
                    <a href="{{ url('login/facebook/') }}">{{ HTML::image('img/fb-icon.png') }}</a>
                    <!-- <a href="{{ url('login/twitter/') }}">{{ HTML::image('img/tw-icon.png') }}</a>   -->             
                    </div>   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
