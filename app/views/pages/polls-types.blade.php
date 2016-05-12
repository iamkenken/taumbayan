@extends('layouts.default')

@section('content')
<div class="section container pt-mg">            
	<div class="row  text-center">
		<h1 class="h1-pt" >Types of Polls</h1>
		<p>Filter polls based on your choice.</p>
	    <div class="col-xs-12 col-sm-12 col-md-12">	                 
            <a href="{{ url('/poll-types/thumbs') }}" class="submit-poll-btn btn">Thumbs</a>
            <a href="{{ url('/poll-types/multiplechoice') }}" class="submit-poll-btn btn">Multiple Choice</a>
            <a href="{{ url('/poll-types/mood') }}" class="submit-poll-btn btn">Mood Meter</a>
            <a href="{{ url('/poll-types/ranking') }}" class="submit-poll-btn btn">Ranking</a>
            <a href="{{ url('/poll-types/rating') }}" class="submit-poll-btn btn">Rating</a>
            <a href="{{ url('/poll-types/upick') }}" class="submit-poll-btn btn">uPick</a>       	      
	    </div>
	</div>
 
</div>
@endsection