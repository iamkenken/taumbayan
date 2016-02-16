<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body class="drawer drawer--right">


@include('includes.drawer')

<div id="wrap">

@include('includes.header')


@yield('content')

</div>

@include('includes.footer')

</body>
</html>