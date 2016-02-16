@extends('layouts.default')

@section('content')
<!-- Fixed Prev-Next Nav -->
<a class="prev_page" href="#" title="View Previous Page"></a>			
<a class="next_page" href="#" title="View Next Page"></a>		
		
<!-- Begin page content -->
<div class="container ">			
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6">
		<div class="poll-question-section">
			<h1>Trending <span class="genericon genericon-expand"></span> | <span class="cat-count">4579 POLLS</span> </h1>
			<p class="poll-question pull-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
			<p class="text-muted pull-left poll-ans-count" >Polls Answered: 325 </p>	
		</div>
			
	</div>			
	<div class="col-xs-12 col-sm-6 col-md-6">					
		<div class="poll-content-section">												
			<div class="poll-answer">						
				<h1>Ranking <button class="share-this m-share" title="Share this Poll">SHARE THIS</button></h1>		
			</div>
			<br/>	
			<div class="comments-section">
			<div class="comment-header">4 COMMENTS ON LOREM IPSUM</div><hr class="cmt"><hr class="cmt" style="margin-top:-15px">
			</div>				
		</div>
	</div>
</div>	
</div>
@stop