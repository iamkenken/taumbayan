@extends('layouts.fullpage')

@section('content')
	<div class="section" id="section0">
	<?php $x = 1; ?>
	@foreach($polls as $p)
		<!-- Presidentiables -->
		<div class="slide" id="slide{{ $x }}">
			<div class="container ">	
				<div class="msg{{ $x }}"></div>	
				@if(Session::has('message'))
                    <div class='alert alert-success alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>{{ Session::get('message') }}</div>
                @endif
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-md-10">
						<h5 class="poll-title">{{ $p->title }} <span class="sp-divider">|</span>
						<span class="poll-subtitle"> {{ $p->question }}</span> </h5>
					</div>		
					<div class="col-xs-12 col-sm-2 col-md-2">
						<button class="share-this-2 m-share" title="Share this Poll">SHARE THIS</button>
					</div>
				</div>	
				<div class="row mg-btm-30 mg-top-30">
					<div class="col-md-6 row ">
						<div class="poll-result-upick">	
							<div class="row centered" style="display:table-cell; vertical-align:middle">
								<ul class="upick-r">
								@foreach($p->pollchoices as $c)	
									<div class="col-xs-6 col-sm-3 col-md-4">									
										<li value="1" data-content="{{ PollHelper::votePercetage($p->id, $c->id).'%' }}"><img src="{{ asset('img/pollimg/'. $c->image) }}" class="img-responsive" /></li>									
									</div>
								@endforeach
								</ul>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 row ">
						<div class="fb-comments-cnt">									
							<div class="fb-comments" data-href="http://localhost:8000" data-numposts="5" data-width="100%"></div>														
						</div>
					</div>
					<div class="poll-answer h-upick">
						<div class="row centered" style="display:table-cell; vertical-align:middle">
						@foreach($p->pollchoices as $c)	
							@if(count($p->pollchoices)==5)
							<div class="col-xs-6 col-sm-3 col-md-3 col-md-1-offset col-md-3-cs">
								<p class="text-center">{{ ucwords($c->choice) }}</p>
								<div class="thumbnail">
									<a class="pointer"><img src="{{ asset('img/pollimg/'. $c->image) }}" class="img-responsive upickimg" data-msg="msg{{ $x }}" data-choiceid="{{ $c->id }}" data-pollid="{{ $p->id }}" /></a>
									<div class="caption">
										<h3>{{ PollHelper::votePercetage($p->id, $c->id).'%' }}</h3>							        
									</div>
								</div>
						    </div>
						    @elseif(count($p->pollchoices)==6)
							<div class="col-xs-2 col-sm-2 col-md-2 col-md-2-cs">
								<p class="text-center">{{ ucwords($c->choice) }}</p>
								<div class="thumbnail">
									<a class="pointer"><img src="{{ asset('img/pollimg/'. $c->image) }}" class="img-responsive upickimg" data-msg="msg{{ $x }}" data-choiceid="{{ $c->id }}" data-pollid="{{ $p->id }}" /></a>
									<div class="caption">
										<h3>{{ PollHelper::votePercetage($p->id, $c->id).'%' }}</h3>							        
									</div>
								</div>
						    </div>
						    @else

						    @endif
						@endforeach
						</div>
					</div>
				</div>	
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<p class="text-muted pull-left poll-ans-count-2" >
						@if(count($p->pollanswers) > 0)
						{{ count($p->pollanswers) }} People already voted.
						@else
						Be the first one to vote.
						@endif
						</p>				
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="comments-section">									
							<a class="view_comments-2"><span class="genericon genericon-chat"></span> COMMENTS</a>
							<a class="hide_comments-2"><span class="genericon genericon-close"></span> HIDE</a>		
						</div>
					</div>	
				</div>	
			</div>	
		</div>
	<?php $x++; ?>
	@endforeach	
		<!-- Vice-Presidentiables -->
		<!-- <div class="slide" id="slide2">
			<div class="container ">			
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-md-10">
						<h5 class="poll-title">Nasurvey ka na ba? Here's your chance. Vote Now! <span class="sp-divider">|</span>
						<span class="poll-subtitle"> Sino ang Bise Presidente mo?</span> </h5>
					</div>		
					<div class="col-xs-12 col-sm-2 col-md-2">
						<button class="share-this-2 m-share" title="Share this Poll">SHARE THIS</button>
					</div>	
				</div>	
				<div class="row1">
					<div class="col-md-6">
						<div class="fb-comments-cnt mg-btm-10 mg-top-10">									
							<div class="fb-comments" data-href="http://localhost:6" data-numposts="5" data-width="100%"></div>														
						</div>
					</div>
					<div class="col-md-6">
						<div class="fb-comments-cnt mg-btm-10 mg-top-10">									
							<div class="fb-comments" data-href="http://localhost:6" data-numposts="5" data-width="100%"></div>														
						</div>
					</div>
					<div class="poll-answer h-upick mg-btm-30 mg-top-30">	
						<div class="row centered h-upick">
							<div class="col-xs-2 col-sm-2 col-md-2 col-md-2-cs">
								<p class="text-center">Cayetano</p>
								<div class="thumbnail">
									<a class="pointer"><img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="img-responsive"/></a>
									<div class="caption">
										<h3>0%</h3>							        
									</div>
								</div>
						 	</div>
							<div class="col-xs-2 col-sm-2 col-md-2 col-md-2-cs">
						    	<p class="text-center">Robredo</p>
								<div class="thumbnail">
									<a class="pointer"><img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="img-responsive"/></a>
									<div class="caption">
										<h3>0%</h3>							        
									</div>
								</div>
							</div>
						  <div class="col-xs-2 col-sm-2 col-md-2 col-md-2-cs">
						    	<p class="text-center">Trillanes</p>
								<div class="thumbnail">
									<a class="pointer"><img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="img-responsive"/></a>
									<div class="caption">
										<h3>0%</h3>							        
									</div>
								</div>
						  </div>
						  <div class="col-xs-2 col-sm-2 col-md-2 col-md-2-cs">
						    	<p class="text-center">Honasan</p>
								<div class="thumbnail">
									<a class="pointer"><img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="img-responsive"/></a>
									<div class="caption">
										<h3>0%</h3>							        
									</div>
								</div>
						  </div>
						  <div class="col-xs-2 col-sm-2 col-md-2 col-md-2-cs">
						    	<p class="text-center">Marcos</p>
								<div class="thumbnail">
									<a class="pointer"><img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="img-responsive"/></a>
									<div class="caption">
										<h3>0%</h3>							        
									</div>
								</div>
						  </div>
						  <div class="col-xs-2 col-sm-2 col-md-2 col-md-2-cs">
						    	<p class="text-center">Escudero</p>
								<div class="thumbnail">
									<a class="pointer"><img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="img-responsive"/></a>
									<div class="caption">
										<h3>0%</h3>							        
									</div>
								</div>
						  </div>
						</div>
					</div>
				</div>	
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<p class="text-muted pull-left poll-ans-count-2" >X People already voted.</p>				
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="comments-section">									
							<a class="view_comments-2"><span class="genericon genericon-chat"></span> COMMENTS</a>
							<a class="hide_comments-2"><span class="genericon genericon-close"></span> HIDE</a>		
						</div>
					</div>	
				</div>	
			</div>	
		</div> -->



	</div>

@stop