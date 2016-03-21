@extends('layouts.auth')

@section('content')					
<div class="container">
	<div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">Forgot password</div>
            <div class="panel-body">
                <form action="{{ action('RemindersController@postRemind') }}" method="POST" class="form-horizontal">
                    @if(Session::has('error'))
                    <div class="alert alert-danger alert-small"> 
                        {{ Session::get('error') }}
                    </div>
                    @endif
                    
                    @if(Session::has('status'))
                    <div class="alert alert-success alert-small"> 
                        {{ Session::get('status') }}
                    </div>
                    @endif
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {{ Form::label('email', 'Email Address', array('class' => 'col-md-4 control-label')) }}
                        <div class="col-md-6">
                        {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button class="btn btn-primary" type="submit">
							Send Reminder
							</button>
                        </div>
                    </div>
                </form>   
            </div>
        </div>
    </div>
</div>
@stop