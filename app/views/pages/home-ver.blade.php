@extends('layouts.default-ver')

@section('content')
	<div id="fullpage">	
		<?php $x = 0 ?>
		@foreach($polls as $poll)
		<div class="section" id="section{{ $x }}" >
		    <div class="slide" id="slide1" data-anchor="slide1">		
				<div class="container">			
						<div class="row mg-top-80">
							<div class="col-xs-12 col-sm-6 col-md-8">
								<h3>Trending <span class="genericon genericon-expand"></span> | <span class="cat-count">4579 POLLS</span></h3>					
							</div>		
							<div class="col-xs-12 col-sm-6 col-md-4">				
								<ul class="social-share">														
									<li><div class="fb-share-button" data-href="http://taumbayan.com/" data-layout="button"></div></li>
									<li><a href="https://twitter.com/share" class="twitter-share-button"></a></li>
									<li><div class="g-plus" data-action="share" data-annotation="none"></div></li>
								</ul>
							</div>
						</div>	
						<div class="row mg-btm-10">				
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="poll-question">
									<p>{{ $poll->question }}</p>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								@include('includes.poll-type-result')
							</div>
						</div>	
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="poll-question-buttons">
									<a class="btn submit-poll-btn-home" href="{{ url('/submit-poll?a=1') }}" title="Submit Poll"><b>SUBMIT POLL</b></a>
									<a class="btn source-btn" href="#" title="Source"><b>SOURCE</b></a>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">					
								<div class="results-btn pull-right">
									<a class="view-poll-result"><span class="genericon genericon-summary"></span> RESULTS</a>
									<a class="close-poll-result"><span class="genericon genericon-close"></span> HIDE</a>
								</div>
							</div>	
						</div>	
						<div class="row mg-top-30">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<p class="text-muted pull-left poll-ans-count-2" >X People already voted.</p>				
							</div>
						</div>
						<div class="row mg-btm-30 mg-top-30">
							<div class="col-xs-12 col-sm-8 col-md-8">
								<div class="fb-comments-cnt" style="position: relative">									
									<div class="fb-comments" data-href="http://localhost:8000" data-numposts="5" data-width="100%" style="position: relative"></div>														
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4">
								<input type="text" class="form-control" placeholder="Search" />
								<br/>
								<a class="btn btn-info" disabled>(Optional space for links, etc.)</a>
							</div>
						</div>	

						
				</div>	
			</div>
			<?php $x++; ?>
			@endforeach
		
	</div>
@stop