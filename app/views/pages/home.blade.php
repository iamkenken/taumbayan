@extends('layouts.home')

@section('content')
<div id="fullpage">
<div class="section" id="section0">
    <div class="slide" id="slide1" data-anchor="slide1">	
		<div class="container ">			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="poll-question-section">
						<h1>Trending <span class="genericon genericon-expand"></span> | <span class="cat-count">4579 POLLS</span> </h1>		
					</div>			
				</div>	
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="poll-question-section">
						<h1>Thumbs Up or Down<button class="share-this m-share" title="Share this Poll">SHARE THIS</button></h1>		
					</div>			
				</div>	
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<p class="poll-question">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
				</div>	
				<div class="col-xs-12 col-sm-12 col-md-6">																
					<div class="poll-answer">
						<div class="th-cnt">		
							<div class="th-cnt-rw">
								<div class="th-cnt-rw-cl">
									<a class="thumbs fa-thumbs-up-cs" value="1"><i class="fa fa-thumbs-up"></i></figure></a>						
								</div>					
								<div class="th-cnt-rw-cl">
									<a class="thumbs fa-thumbs-down-cs" value="0"><i class="fa fa-thumbs-down fa-flip-horizontal"></i></a>
								</div>
							</div>
							<div class="th-cnt-rw">
								<div class="th-cnt-rw-cl">
									0%
								</div>					
								<div class="th-cnt-rw-cl">
									0%
								</div>
							</div>
						</div>
					</div>		
				</div>	
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="poll-question-buttons">
						<button><b>SUBMIT POLL</b></button>
						<button><b>SOURCE</b></button>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="comments-section">
						<div class="comment-header">COMMENTS ON LOREM IPSUM</div><hr class="cmt"><hr class="cmt" style="margin-top:-15px">
					</div>
				</div>	
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<p class="text-muted pull-left poll-ans-count" >Polls Answered: 325 </p>
				</div>
			</div>
		</div>	
	</div>
    <div class="slide" id="slide2">
		<div class="container ">			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="poll-question-section">
						<h1>Trending <span class="genericon genericon-expand"></span> | <span class="cat-count">4579 POLLS</span> </h1>		
					</div>			
				</div>	
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="poll-question-section">
						<h1>Rating<button class="share-this m-share" title="Share this Poll">SHARE THIS</button></h1>		
					</div>			
				</div>	
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="img-rating"/>
				</div>	
				<div class="col-xs-12 col-sm-12 col-md-6">																
					<div class="poll-answer">
						<input type="text" class="rating rating-loading" value="3" data-size="xl" title="">			
					</div>		
				</div>	
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="poll-question-buttons">
						<button><b>SUBMIT POLL</b></button>
						<button><b>SOURCE</b></button>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="comments-section">
						<div class="comment-header">COMMENTS ON LOREM IPSUM</div><hr class="cmt"><hr class="cmt" style="margin-top:-15px">
					</div>
				</div>	
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<p class="text-muted pull-left poll-ans-count" >Polls Answered: 325 </p>
				</div>
			</div>
		</div>	
	</div>
	<div class="slide" id="slide3">
		<div class="container ">			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="poll-question-section">
						<h1>Trending <span class="genericon genericon-expand"></span> | <span class="cat-count">4579 POLLS</span> </h1>		
					</div>			
				</div>	
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="poll-question-section">
						<h1>Multiple Choice<button class="share-this m-share" title="Share this Poll">SHARE THIS</button></h1>	
					</div>			
				</div>	
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<p class="poll-question">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
				</div>	
				<div class="col-xs-12 col-sm-12 col-md-6">																
					<div class="poll-answer">
						  	<div class="checkbox abc-checkbox abc-checkbox-info abc-checkbox-circle">
		                        <input id="checkbox1" class="styled" type="checkbox" >
		                        <label for="checkbox1">
		                           Lorem
		                        </label>
		                    </div>
		                    <div class="checkbox abc-checkbox abc-checkbox-info abc-checkbox-circle">
		                        <input id="checkbox2" class="styled" type="checkbox" >
		                        <label for="checkbox2">
		                           Lorem
		                        </label>
		                    </div>
		                    <div class="checkbox abc-checkbox abc-checkbox-info abc-checkbox-circle">
		                        <input id="checkbox3" class="styled" type="checkbox" checked >
		                        <label for="checkbox3">
		                           Lorem
		                        </label>
		                    </div>
		                    <div class="checkbox abc-checkbox abc-checkbox-info abc-checkbox-circle">
		                        <input id="checkbox4" class="styled" type="checkbox">
		                        <label for="checkbox4">
		                           Lorem
		                        </label>
		                    </div>
		                    <div class="checkbox abc-checkbox abc-checkbox-info abc-checkbox-circle">
		                        <input id="checkbox5" class="styled" type="checkbox">
		                        <label for="checkbox5">
		                           Lorem
		                        </label>
		                    </div>
						</div>		
				</div>	
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="poll-question-buttons">
						<button><b>SUBMIT POLL</b></button>
						<button><b>SOURCE</b></button>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="comments-section">
						<div class="comment-header">COMMENTS ON LOREM IPSUM</div><hr class="cmt"><hr class="cmt" style="margin-top:-15px">
					</div>
				</div>	
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<p class="text-muted pull-left poll-ans-count" >Polls Answered: 325 </p>
				</div>
			</div>
		</div>	
	</div>
	<div class="slide" id="slide4">
		<div class="container ">			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="poll-question-section">
						<h1>Trending <span class="genericon genericon-expand"></span> | <span class="cat-count">4579 POLLS</span> </h1>		
					</div>			
				</div>	
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="poll-question-section">
						<h1>Mood Meter<button class="share-this m-share" title="Share this Poll">SHARE THIS</button></h1>	
					</div>			
				</div>	
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<p class="poll-question">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
				</div>	
				<div class="col-xs-12 col-sm-12 col-md-6">																
					<div class="poll-answer">								
						<p><h4><b>How do you feel?</b></h4></p>
						<ul id="h-mood" class="text-center">																				
							<li value="1"><a href="#"><img src="img/moods/mood1.png" data-toggle="tooltip" title="Shocked!"/></a></li>
							<li value="2"><a href="#"><img src="img/moods/mood2.png" data-toggle="tooltip" title="Angry"/></a></li>
							<li value="3"><a href="#"><img src="img/moods/mood3.png" data-toggle="tooltip" title="Fine"/></a></li>
							<li value="4"><a href="#"><img src="img/moods/mood4.png" data-toggle="tooltip" title="Happy"/></a></li>
							<li value="5"><a href="#"><img src="img/moods/mood5.png" data-toggle="tooltip" title="Sad"/></a></li>
							<li value="6"><a href="#"><img src="img/moods/mood6.png" data-toggle="tooltip" title="Don't Care"/></a></li>
							<li value="7"><a href="#"><img src="img/moods/mood7.png" data-toggle="tooltip" title="Nothing"/></a></li>
						</ul>
					</div>		
				</div>	
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="poll-question-buttons">
						<button><b>SUBMIT POLL</b></button>
						<button><b>SOURCE</b></button>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="comments-section">
						<div class="comment-header">COMMENTS ON LOREM IPSUM</div><hr class="cmt"><hr class="cmt" style="margin-top:-15px">
					</div>
				</div>	
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<p class="text-muted pull-left poll-ans-count" >Polls Answered: 325 </p>
				</div>
			</div>
		</div>	
	</div>
	<div class="slide" id="slide5">
		<div class="container ">			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="poll-question-section">
						<h1>Trending <span class="genericon genericon-expand"></span> | <span class="cat-count">4579 POLLS</span> </h1>						
					</div>			
				</div>	
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="poll-question-section">
						<h1>Ranking<button class="share-this m-share" title="Share this Poll">SHARE THIS</button></h1>		
					</div>			
				</div>	
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<p class="poll-question">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
				</div>	
				<div class="col-xs-12 col-sm-12 col-md-6">																
						<div class="poll-answer">
							<ul id="h_ranking" class="col-xs-12 col-sm-12 col-md-12 list-group">
							  <li class="col-xs-6 col-sm-6 col-md-6 list-group-item"><p>Drag me</p></li>
							  <li class="col-xs-6 col-sm-6 col-md-6 list-group-item"><p>2</p></li>
							  <li class="col-xs-6 col-sm-6 col-md-6 list-group-item"><p>3</p></li>
							  <li class="col-xs-6 col-sm-6 col-md-6 list-group-item"><p>4</p></li>
							  <li class="col-xs-6 col-sm-6 col-md-6 list-group-item"><p>5</p></li>
							</ul>
						</div>		
					
				</div>	
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="poll-question-buttons">
						<button><b>SUBMIT POLL</b></button>
						<button><b>SOURCE</b></button>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="comments-section">
						<div class="comment-header">COMMENTS ON LOREM IPSUM</div><hr class="cmt"><hr class="cmt" style="margin-top:-15px">
					</div>
				</div>	
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<p class="text-muted pull-left poll-ans-count" >Polls Answered: 325 </p>
				</div>
			</div>
		</div>	
	</div>
	<div class="slide" id="slide6">
		<div class="container ">			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="poll-question-section">
						<h1 class="pull-left">Politics | uPick <span class="genericon genericon-expand"></span> |<span class="cat-count"> 4579 POLLS</span> </h1>
						<h1 class="pull-right"><button class="share-this m-share" title="Share this Poll">SHARE THIS</button></h1>
					</div>			
				</div>		
			</div>	
			<div class="row">
				<div class="up-cnt">		
					<div class="up-cnt-rw">						
						<div class="up-cnt-rw-cl"><a href="#"><img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="up-img"/></a></div>
						<div class="up-cnt-rw-cl"><a href="#"><img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="up-img"/></a></div>
						<div class="up-cnt-rw-cl"><a href="#"><img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="up-img"/></a></div>
						<div class="up-cnt-rw-cl"><a href="#"><img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="up-img"/></a></div>									
					</div>
					<div class="up-cnt-rw">						
						<div class="up-cnt-rw-cl"><h1>0%</h1></div>
						<div class="up-cnt-rw-cl"><h1>0%</h1></div>
						<div class="up-cnt-rw-cl"><h1>0%</h1></div>
						<div class="up-cnt-rw-cl"><h1>0%</h1></div>										
					</div>
				</div>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="poll-question-buttons">
						<button><b>SUBMIT POLL</b></button>
						<button><b>SOURCE</b></button>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="comments-section">
						<div class="comment-header">COMMENTS ON LOREM IPSUM</div><hr class="cmt"><hr class="cmt" style="margin-top:-15px">
					</div>
				</div>	
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<p class="text-muted pull-left poll-ans-count" >Polls Answered: 325 </p>
				</div>
			</div>
		</div>	
	</div>
</div>
</div>
@stop