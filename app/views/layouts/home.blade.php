<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body class="drawer drawer--right">

@include('includes.modal')

@include('includes.drawer')



@include('includes.headerfixed')

<div id="fullpage">
@yield('content')
</div>

@include('includes.footer')


</body>
</html>