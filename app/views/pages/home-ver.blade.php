@extends('layouts.default-ver')

@section('content')
	<div id="fullpage">	
		<?php $x = 0 ?>
		<div class="section" id="section0" >
		@foreach($polls as $poll)
		@if($poll->type != 'upick')
		    <div class="slide" id="slide{{ $x }}" data-anchor="slide{{ $x }}">			
				<div class="container">		
						<div class="msg{{ $x }}"></div>	
						@if(Session::has('message'))
		                    <div class='alert alert-success alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>{{ Session::get('message') }}</div>
		                @endif	
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<h3>Trending <span class="genericon genericon-expand"></span> | <span class="cat-count">4579 POLLS</span></h3>					
							</div>		
							<div class="col-xs-6 col-sm-6 col-md-6">		
								<h3>{{ PollHelper::getTypeName($poll->type) }}</h3>
								<ul class="social-share">					
									<li><div class="fb-share-button" data-href="http://taumbayan.com/" data-layout="button"></div></li>
									<li><a href="https://twitter.com/share" class="twitter-share-button"></a></li>
									<li><div class="g-plus" data-action="share" data-annotation="none"></div></li>
								</ul>
							</div>
						</div>	
						<div class="row mg-top-10 mg-btm-10 h255">				
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="poll-question">
									<p>{{ $poll->question }}</p>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								@include('includes.poll-type-result')
							</div>
						</div>	
						<div class="row mg-top-10">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="poll-question-buttons">
									<a class="btn submit-poll-btn-home" href="{{ url('/submit-poll') }}" title="Submit Poll"><b>SUBMIT POLL</b></a>
									<a class="btn source-btn" href="#" title="Source"><b>SOURCE</b></a>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">					
								<div class="results-btn pull-right">
									<a class="view-poll-result"><span class="genericon genericon-summary"></span> Result</a>
									<a class="close-poll-result"><span class="genericon genericon-close"></span> Hide</a>
								</div>
							</div>	
						</div>	
						<div class="row mg-top-80">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<p class="text-muted pull-left poll-ans-count-2" >
								@if(count($poll->pollanswers) > 0)
								{{ count($poll->pollanswers) }} People already voted.
								@else
								Be the first one to vote.
								@endif
								</p>				
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="fb-comments-cnt">									
									<div class="fb-comments" data-href="http://localhost:8000" data-numposts="5" data-width="100%" style="position: relative"></div>														
								</div>
							</div>
							<!--div class="col-xs-12 col-sm-4 col-md-4">
								<input type="text" class="form-control" placeholder="Search" />
								<br/>
								<a class="btn btn-info" disabled>(Optional space for links, etc.)</a>
							</div-->
						</div>	
				</div>	
		@endif

		@if($poll->type == 'upick')
			<div class="slide" id="slide{{ $x }}" data-anchor="slide{{ $x }}">		
				<div class="container">
					<div class="msg{{ $x }}"></div>	
					@if(Session::has('message'))
	                    <div class='alert alert-success alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>{{ Session::get('message') }}</div>
	                @endif			
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<h5 class="poll-title"> {{ $poll->title }}<span class="sp-divider">|</span>
								<span class="poll-subtitle">{{ $poll->question }}</span> </h5>
							</div>		
							<div class="col-xs-12 col-sm-6 col-md-6">
								<ul class="social-share">														
									<li><div class="fb-share-button" data-href="http://taumbayan.com/" data-layout="button"></div></li>
									<li><a href="https://twitter.com/share" class="twitter-share-button"></a></li>
									<li><div class="g-plus" data-action="share" data-annotation="none"></div></li>
								</ul>
							</div>
						</div>
						<div class="row mg-top-10 mg-btm-10 h255">		
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="poll-result-upick">	
									<div class="centered" style="display:table-cell; vertical-align:middle">
										<ul class="upick-r">
										
											<div class="col-xs-6 col-sm-3 col-md-4">									
												<li value="1" data-content=""><img src="" class="img-responsive" /></li>									
											</div>
										
										</ul>
									</div>
								</div>
							</div>
							<div class="poll-answer h-upick">
								<div class="centered" style="display:table-cell; vertical-align:middle">
									<?php $choices = PollHelper::getUpickChoices($poll->id); ?>
									@foreach($choices as $c)
										<div class="col-xs-6 col-sm-3 col-md-3 col-md-1-offset col-md-3-cs">
											<p class="text-center">{{ ucwords($c->choice) }}</p>
											<div class="thumbnail">
												<a class="pointer"><img src="{{ asset('img/pollimg/'.$c->image) }}" class="img-responsive upickimg" data-msg="msg{{ $x }}" data-choiceid="{{ $c->id }}" data-pollid="{{ $poll->id }}" /></a>
												<div class="caption">
													<h3>{{ PollHelper::votePercetage($poll->id, $c->id).'%' }}</h3>							        
												</div>
											</div>
									    </div>
									@endforeach
								</div>
							</div>
						</div>	
						<div class="row mg-top-10">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="poll-question-buttons">
									<a class="btn submit-poll-btn-home" href="{{ url('/submit-poll') }}" title="Submit Poll"><b>SUBMIT POLL</b></a>
									<a class="btn source-btn" href="#" title="Source"><b>SOURCE</b></a>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">					
								<div class="results-btn pull-right">
									<!-- <a class="view-poll-result"><span class="genericon genericon-summary"></span> Result</a>-->
									<!-- <a class="close-poll-result"><span class="genericon genericon-close"></span> Hide</a> -->
								</div>
							</div>	
						</div>	
						<div class="row mg-top-80">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<p class="text-muted pull-left poll-ans-count-2" >
								@if(count($poll->pollanswers) > 0)
								{{ count($poll->pollanswers) }} People already voted.
								@else
								Be the first one to vote.
								@endif
								</p>				
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="fb-comments-cnt">									
									<div class="fb-comments" data-href="http://localhost:8000" data-numposts="5" data-width="100%" style="position: relative"></div>														
								</div>
							</div>
						</div>	
				</div>	
			</div>
		@endif
		<?php $x++; ?>
		@endforeach
			</div>	
	</div>
@stop