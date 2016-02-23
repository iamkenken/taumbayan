@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    {{ Form::open(array('url' => 'login', 'class' => 'form-horizontal')) }}   
                        @if ($errors->has('invalid'))
                        <div class="alert alert-danger alert-small"> 
                            {{ $errors->first('invalid') }}
                        </div>
                        @endif
                        <div class="form-group">
                            {{ Form::label('email', 'Email Address', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-6">
                            {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group">
                             {{ Form::label('password', 'Password', array('class' => 'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::password('password', array('class' => 'form-control')) }}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    {{ Form::close() }}
                    <div class="social-login-icons">                
                    <a href="{{ url('login/gplus/') }}">{{ HTML::image('img/g-plus-icon.png') }}</a>
                    <a href="{{ url('login/facebook/') }}">{{ HTML::image('img/fb-icon.png') }}</a>
                    <a href="{{ url('login/twitter/') }}">{{ HTML::image('img/tw-icon.png') }}</a>             
                    </div>        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
