@extends('layouts.default')

@section('content')
<div class="section container">            
<div class="row">

    <div class="poll-tabs">
    <div class="col-md-12 text-center">
    <ul class="poll-buttons nav nav-pills" id="myTab">
        <li><a data-toggle="tab" href="#sectionA" class="">Thumbs</a></li>
        <li><a data-toggle="tab" href="#sectionB" class="">Multiple Choice</a></li>
        <li><a data-toggle="tab" href="#sectionC" class="">Mood Meter</a></li>
        <li><a data-toggle="tab" href="#sectionD" class="">Ranking</a></li>
        <li><a data-toggle="tab" href="#sectionE" class="">Rating</a></li>
        <li><a data-toggle="tab" href="#sectionF" class="">uPick</a></li>
    </ul>
    </div>
    <div class="col-md-6 col-md-offset-3">
    <div class="tab-content poll-content">
        <div id="sectionA" class="tab-pane fade in active">
           	<form action="#" id="th_form">
           	<div class="th-error"></div>
				<div class="form-group">	
					<select id="th_cat" class="selectpicker form-control" multiple data-done-button="true" data-max-options="3">
				    @foreach($categories as $cat)
				    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
				    @endforeach
				 	</select>
				 	<div class="help-block with-errors"></div>
				</div>				
				<div class="form-group">				
				  <input type="text" class="form-control" id="th_title" placeholder="Enter Title">
				</div>										
				<div class="form-group">
				  <textarea class="form-control" rows="5" id="th_question" placeholder="Enter Poll Question"></textarea>
				</div>
				<div class="text-right">
					<input type="hidden" id="th_type" name="type" value="thumbs">
					<a class="submit-poll-content-btn btn pointer">Preview Poll</a> <a id="submitth" class="submit-poll-content-btn btn pointer">Submit Poll</a>	
				</div>
			</form>	
        </div>

        <div id="sectionB" class="tab-pane fade">
            <form id="mc_form" action="#">
            <div class="mc-error"></div>
			<div class="form-group">	
				<select id="mchoicecat" class="selectpicker form-control" multiple data-done-button="true" data-max-options="3" >
			    @foreach($categories as $cat)
			    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
			    @endforeach
			 	</select>
			</div>				
			<div class="form-group">				
			  <input type="text" class="form-control" id="mc_title" placeholder="Enter Title">
			  <div class="help-block with-errors"></div>
			</div>	
			<div class="form-group">
			  <textarea class="form-control" rows="5" maxlength="200" id="mc_question" placeholder="Enter Poll Question"></textarea>
			</div>
			<div class="form-group">	
				<select id="numchoice" class="form-control">
				<option value=''></option>
				@for($x = 2; $x <= 10; $x++)
			    <option value="{{ $x }}">{{ $x }}</option>
			    @endfor
			 	</select>
			</div>	
			<div class="choices">
				
			</div>
			<div class="text-right" style="clear:both;">
				<input type="hidden" id="mc_type" name="type" value="multiplechoice">
				<a class="submit-poll-content-btn btn pointer">Preview Poll</a> <a class="submit-poll-content-btn btn pointer" id="submitmc">Submit Poll</a>	
			</div>
			</form>	
        </div>

         <div id="sectionC" class="tab-pane fade">
            <form action="#" id="moodform">
             <div class="mm-error"></div>
			<div class="form-group">	
				<select id="mm_cat" class="selectpicker form-control" multiple data-done-button="true" data-max-options="3">
			    @foreach($categories as $cat)
			    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
			    @endforeach
			 	</select>
			</div>				
			<div class="form-group">				
			  <input type="text" class="form-control" id="mm_title" placeholder="Enter Title">
			</div>										
			<div class="form-group">
			  <textarea class="form-control" rows="5" id="mm_question" placeholder="Enter Poll Question"></textarea>
			</div>
			<div class="text-left">
				<div class="text-gray">Select Moods</div>
				<div class="row">
					<div class="col-md-12 text-center" style="height: 55px;">															
						<a href="#"><img data-mood="shocked" src="{{ asset("img/moods/mood1.png") }}" class="mood" data-toggle="tooltip" title="Shocked!"/></a>
						<a href="#"><img  data-mood="angry"src="{{ asset("img/moods/mood2.png") }}" class="mood" data-toggle="tooltip" title="Angry"/></a>
						<a href="#"><img data-mood="fine" src="{{ asset("img/moods/mood3.png") }}" class="mood" data-toggle="tooltip" title="Fine"/></a>
						<a href="#"><img data-mood="happy" src="{{ asset("img/moods/mood4.png") }}" class="mood" data-toggle="tooltip" title="Happy"/></a>
						<a href="#"><img data-mood="sad" src="{{ asset("img/moods/mood5.png") }}" class="mood" data-toggle="tooltip" title="Sad"/></a>
						<a href="#"><img data-mood="dontcare" src="{{ asset("img/moods/mood6.png") }}" class="mood" data-toggle="tooltip" title="Do not Care"/></a>
						<a href="#"><img data-mood="nothing" src="{{ asset("img/moods/mood7.png") }}" class="mood" data-toggle="tooltip" title="Nothing"/></a>
					</div>
				</div>
			</div>												
			<div class="text-right">
				<input type="hidden" id="mm_type" name="type" value="mood">
				<a class="submit-poll-content-btn btn pointer">Preview Poll</a> <a id="submitmood" class="submit-poll-content-btn btn pointer">Submit Poll</a>	
			</div>
			</form>	
		</div>

		<div id="sectionD" class="tab-pane fade">
            <form action="#">
			<div class="form-group">	
				<select id="rankcat" class="selectpicker form-control" multiple data-done-button="true" data-max-options="3">
			    @foreach($categories as $cat)
			    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
			    @endforeach
			 	</select>
			</div>	
			<div class="form-group">	
				<select class="form-control" id="rnk_chc">
					<option value="" selected disabled style="display: none">Choices</option>
					<option value="">1</option>
					<option value="">2</option>							
				</select>
			</div>	
			<div class="form-group">				
			  <input type="text" class="form-control" id="rnk_title" placeholder="Enter Title">
			</div>										
			<div class="form-group">
			  <textarea class="form-control" rows="5" id="rnk_question" placeholder="Enter Poll Question"></textarea>
			</div>
			<div class="text-right">											
				<a class="submit-poll-content-btn btn pointer">Preview Poll</a> <a class="submit-poll-content-btn btn pointer">Submit Poll</a>	
			</div>		
			</form>	
		</div>

		<div id="sectionE" class="tab-pane fade">
            <form action="#">
				<div class="form-group">	
					<select id="ratingcat" class="selectpicker form-control" multiple data-done-button="true" data-max-options="3">
				    @foreach($categories as $cat)
				    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
				    @endforeach
				 	</select>
				</div>	
				<div class="text-left">
					<p>Enter Picture to Rate</p>
				</div>																					
				
					<div class="col-md-6 text-center">		
						<a href=""><img src="{{ asset("img/upload.png") }}" class="img-responsive"/></a>
					</div>
					<div class="col-md-6 text-center">		
						<a href=""><img src="{{ asset("img/upload.png") }}" class="img-responsive"/></a>
					</div>
				
				<div class="text-right">											
					<a class="submit-poll-content-btn btn pointer">Preview Poll</a> <a class="submit-poll-content-btn btn pointer">Submit Poll</a>
				</div>
			</form>
		</div>

		<div id="sectionF" class="tab-pane fade">
            <form action="#">
				<div class="form-group">	
					<select id="upickcat" class="selectpicker form-control" multiple data-done-button="true" data-max-options="3">
				    @foreach($categories as $cat)
				    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
				    @endforeach
				 	</select>
				</div>	
				<div class="text-left">
					<p>Enter Picture to Rate</p>
				</div>																					
				
					<div class="col-md-6 text-center">		
						<a href=""><img src="{{ asset("img/upload.png") }}" class="img-responsive"/></a>
					</div>
					<div class="col-md-6 text-center">		
						<a href=""><img src="{{ asset("img/upload.png") }}" class="img-responsive"/></a>
					</div>
				
				<div class="text-right">											
					<a class="submit-poll-content-btn btn pointer">Preview Poll</a> <a class="submit-poll-content-btn btn pointer">Submit Poll</a>	
				</div>
			</form>	
	    </div>	
	    </div>
		</div>
		</div>
    </div>
</div>
</div>
@endsection