<!doctype html>
<html lang="en">
<head>
    @include('admin.head')
</head>

<body>

<div id="wrapper">
	
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">
        	<!--{{ HTML::image('img/TLogo.png', 'Taumbayan Logo', array( 'width' => 24 )) }}-->
        	<h3>Taumbayan</h3> <small>CMS</small>
        </a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">              
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ $profile->firstname }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <div class="" style="padding: 5px">
                    @if ($profile->photo)           
                      {{ HTML::image($profile->photo, 'Avatar', array('class' => 'img-responsive avatar') ) }}
                    @else
                      <img src="{{ asset('img/users/no_avatar.png') }}"  class="img-responsive avatar"/>
                    @endif
                </div>
                <li>
                    <a href="{{ url('admin/profile') }}"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>                
                <li>
                    <a href="{{ url('admin/logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    @include('admin.sidemenu')
</nav>

	@yield('content')

</div>

</body>
</html>