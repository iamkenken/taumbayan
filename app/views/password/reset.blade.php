@extends('layouts.auth')

@section('content')					
<div class="container">
	<div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">Forgot password</div>
            <div class="panel-body">
                <form action="{{ action('RemindersController@postReset') }}" method="POST" class="form-horizontal">
                 <input type="hidden" name="token" value="{{ $token }}">
                    @if(Session::has('error'))
                    <div class="alert alert-danger alert-small"> 
                        {{ Session::get('error') }}
                    </div>
                    @endif
                    <div class="form-group">
                        {{ Form::label('email', 'Email Address', array('class' => 'col-md-4 control-label')) }}
                        <div class="col-md-6">
                        {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}

                        </div>
                    </div>

                    <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">


                            </div>
                        </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password_confirmation">

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button class="btn btn-primary" type="submit">
							Reset Password
							</button>
                        </div>
                    </div>
                </form>   
            </div>
        </div>
    </div>
</div>
@stop