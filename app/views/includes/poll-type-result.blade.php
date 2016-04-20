@if($poll->type == 'thumbs')
	<div class="poll-answer">
    <div class="th-cnt">    
      <div class="th-cnt-rw">
        <div class="th-cnt-rw-cl">
          <a class="thumbs" value="1" ><i class="fa fa-thumbs-up fa-thumbs-up-cs"></i></a>            
        </div>          
        <div class="th-cnt-rw-cl">
          <a class="thumbs " value="0"><i class="fa fa-thumbs-down fa-flip-horizontal fa-thumbs-down-cs"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="poll-result">
    <div class="th-cnt" >   
      <div class="th-cnt-rw">
        <div class="th-cnt-rw-cl">
          <a class="thumbs" value="1"><i class="fa fa-thumbs-up fa-thumbs-up-cs-res"></i></a>           
        </div>          
        <div class="th-cnt-rw-cl">
          <a class="thumbs " value="0"><i class="fa fa-thumbs-down fa-flip-horizontal fa-thumbs-down-cs-res"></i></a>
        </div>
      </div>
      <div class="th-cnt-rw">
        <div class="th-cnt-rw-cl">
          <h1>0%</h1>
        </div>          
        <div class="th-cnt-rw-cl">
          <h1>0%</h1>
        </div>
      </div>
    </div>  
  </div>
@endif

@if($poll->type == 'mood')
<div class="poll-answer">
	<div class="mm-cnt">
		<div class="mm-cnt-rw-cl">	
		<p><h4><b>How do you feel?</b></h4></p>
		<ul class="h-mood text-center">																				
			<li value="1"><a value=1><img src="img/moods/mood1.png" data-toggle="tooltip" title="Shocked!"/></a></li>
			<li value="2"><a value=2><img src="img/moods/mood2.png" data-toggle="tooltip" title="Angry"/></a></li>
			<li value="3"><a value=3><img src="img/moods/mood3.png" data-toggle="tooltip" title="Fine"/></a></li>
			<li value="4"><a value=4><img src="img/moods/mood4.png" data-toggle="tooltip" title="Happy"/></a></li>
			<li value="5"><a value=5><img src="img/moods/mood5.png" data-toggle="tooltip" title="Sad"/></a></li>
			<li value="6"><a value=6><img src="img/moods/mood6.png" data-toggle="tooltip" title="Don't Care"/></a></li>
			<li value="7"><a value=7><img src="img/moods/mood7.png" data-toggle="tooltip" title="Nothing"/></a></li>
		</ul>
		</div>
	</div>
</div>	
<div class="poll-result">
	<div class="mm-cnt">
		<div class="mm-cnt-rw-cl">	
		<ul class="h-mood-r text-center">																				
			<li value="1" data-content="70%" class="m1-r"><img src="img/moods/mood1.png" data-toggle="tooltip" title="Shocked!"/></li>
			<li value="2" data-content="10%" class="m2-r"><img src="img/moods/mood2.png" data-toggle="tooltip" title="Angry"/></li>
			<li value="3" data-content="5%" class="m3-r"><img src="img/moods/mood3.png" data-toggle="tooltip" title="Fine"/></li>
			<li value="4" data-content="20%" class="m4-r"><img src="img/moods/mood4.png" data-toggle="tooltip" title="Happy"/></li>
			<li value="5" data-content="30%" class="m5-r"><img src="img/moods/mood5.png" data-toggle="tooltip" title="Sad"/></li>
			<li value="6" data-content="40%" class="m6-r"><img src="img/moods/mood6.png" data-toggle="tooltip" title="Don't Care"/></li>
			<li value="7" data-content="60%" class="m7-r"><img src="img/moods/mood7.png" data-toggle="tooltip" title="Nothing"/></li>
		</ul>
		</div>
	</div>
</div>	
@endif

@if($poll->type == 'rating')
@endif

@if($poll->type == 'multiplechoice')
@endif

@if($poll->type == 'upick')
<div class="poll-answer h-upick">	
<div class="row scrollbar style-1 centered h-upick">
  <div class="col-xs-6 col-sm-3 col-md-3">
    <div class="thumbnail">
      <a class="pointer"><img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="img-responsive"/></a>
      <div class="caption">
        <h1>0%</h1>							        
      </div>
    </div>
  </div>
  <div class="col-xs-6 col-sm-3 col-md-3">
    <div class="thumbnail">
      <a class="pointer"><img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="img-responsive"/></a>
      <div class="caption">
        <h1>0%</h1>							        
      </div>
    </div>
  </div>
  <div class="col-xs-6 col-sm-3 col-md-3">
    <div class="thumbnail">
      <a class="pointer"><img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="img-responsive"/></a>
      <div class="caption">
        <h1>0%</h1>							        
      </div>
    </div>
  </div>
  <div class="col-xs-6 col-sm-3 col-md-3">
    <div class="thumbnail">
      <a class="pointer"><img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="img-responsive"/></a>
      <div class="caption">
        <h1>0%</h1>							        
      </div>
    </div>
  </div>
</div>
</div>
<div class="poll-result">
<div class="row scrollbar style-1 centered h-upick">
  <div class="col-xs-6 col-sm-3 col-md-3">
    <div class="thumbnail">
      <img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="img-responsive"/>
      <div class="caption">
        <h1>20%</h1>							        
      </div>
    </div>
  </div>
  <div class="col-xs-6 col-sm-3 col-md-3">
    <div class="thumbnail">
      <img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="img-responsive"/>
      <div class="caption">
        <h1>30%</h1>							        
      </div>
    </div>
  </div>
  <div class="col-xs-6 col-sm-3 col-md-3">
    <div class="thumbnail">
      <img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="img-responsive"/>
      <div class="caption">
        <h1>40%</h1>							        
      </div>
    </div>
  </div>
  <div class="col-xs-6 col-sm-3 col-md-3">
    <div class="thumbnail">
      <img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="img-responsive"/>
      <div class="caption">
        <h1>10%</h1>							        
      </div>
    </div>
  </div>
</div>		


</div>
@endif

@if($poll->type == 'rank')
@endif