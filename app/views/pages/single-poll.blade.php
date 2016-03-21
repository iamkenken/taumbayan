@extends('layouts.fullpage')

@section('content')
<div class="section container ">            
	<div class="row">
		<div id="msg"></div>
		<h1>{{ $poll->title }}</h1>
		<br />
		@foreach ($choices as $c)
		<div class="col-md-3 text-center">
		<div class="diplay: block">
		<img class='upickimg' data-choiceid="{{ $c->id }}" data-pollid="{{ $poll->id }}" style='cursor: pointer;' src="{{ asset("/img/pollimg/". $c->image) }}" />
		</div>
		{{ $c->choice }}
		</div>
		@endforeach
		<div style="display: block;">
		<h2>{{ count($answers) }} Peoples already voted</h2>
		</div>
	</div>
</div>
@endsection