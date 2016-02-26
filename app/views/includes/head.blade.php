<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta name="_token" content="{{ csrf_token() }}"/>
<title>Taumbayan</title>

<!-- Fonts -->
<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

<!-- Styles -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

 <link href="css/normalize.css" rel="stylesheet">
<!-- Custom styles for this template -->
{{HTML::style('css/style.css')}}
<!-- Genericons -->
{{HTML::style('css/genericons.css')}}
<!-- Drawer -->
{{HTML::style('css/drawer.min.css')}}
<!-- Datepicker -->
{{HTML::style('css/datepicker.css')}}
<!-- File Input -->
{{HTML::style('css/fileinput.css')}}

<!-- Horizontal Scroll -->
{{HTML::style('css/jquery.fullPage.css')}}

<!-- Star Rating -->
{{HTML::style('css/star-rating.css')}}

<!-- Star Rating -->
{{HTML::style('css/checkbox.css')}}

{{HTML::style('css/custom.css')}}

{{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

<!-- Favicon -->
<link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon" />



<!-- JavaScripts -->
{{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js') }}
{{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') }}

<!-- Horizontal Scroll -->
{{ HTML::script('js/jquery.fullPage.js') }}

<!-- Drawer -->
{{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js') }}
{{ HTML::script('js/drawer.min.js') }}

<!-- Datepicker -->
{{ HTML::script('js/bootstrap-datepicker.js') }}
<!-- Validator -->
{{ HTML::script('js/validator.js') }}

<!-- 3d Carousel -->
{{ HTML::script('js/carrousel.js') }}

<!-- Masonry -->
{{ HTML::script('js/masonry.pkgd.min.js') }}

<!-- File Input -->
{{ HTML::script('js/fileinput.js') }}

<!-- Star Rating -->
{{ HTML::script('js/star-rating.js') }}

<!-- Ranking/Sorting -->
{{ HTML::script('js/sortable.js') }}

<!-- Custom -->	
{{ HTML::script('js/custom.js') }}

{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}