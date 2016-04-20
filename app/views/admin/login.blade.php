<!doctype html>
<html>
	<head>	
    <title>Admin Login</title>
	<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' >	
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	{{HTML::style('css/sb-admin.css')}}
    {{HTML::style('css/hover.css')}}

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon" />

	<!-- JAVASCRIPTS -->
	{{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js') }}
	{{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') }}
	</head>
	<body class="login-page">	
    	<div class="container">
    		<div class="login-box">
                <div class="login-form row">
                    <div class="col-sm-12 centered login-header">
                        <a class="" href="{{ url('/') }}">
                        {{ HTML::image('img/TLogo.png', 'Taumbayan Logo', array( 'width' => 32 )) }}
                        <h4 class="cms-login-header-logo">Taumbayan</h4>            
                        </a>
                                             
                    </div>   
                    @if ($errors->has('invalid'))
                    <div class="col-sm-12">
                    <div class="alert alert-danger alert-small"> 
                        {{ $errors->first('invalid') }}
                    </div>
                    </div>  
                    @endif                         
                    <div class="col-sm-12">
                        <div class="login-body panel panel-default">                               
                            {{ Form::open(array('url' => 'admin', 'class' => 'form-horizontal')) }}                              
                                <div class="form-group">                                       
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" name="username" class="form-control" placeholder="Username" value="{{ Input::old('username+-8/ ') }}" />
                                    </div>
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">                                       
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                        <input type="password" name="password" class="form-control" placeholder="Password" value="" />
                                    </div> 
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif                                  
                                </div>
                                <button type="submit" class="btn btn-default hvr-icon-forward" style="border-radius: 0; display: block; margin: 0 auto;">
                                 Login
                                </button>
                            {{ Form::close() }}
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
	</body>
</html>





	


