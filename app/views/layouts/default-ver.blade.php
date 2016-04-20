<!doctype html>
<html>
	<head>
	    @include('includes.head')
	</head>
	<body class="drawer drawer--right">

	@include('includes.modal')

	@include('includes.drawer')

	@include('includes.header')

	@yield('content')

	@include('includes.footer')

	</body>
</html>