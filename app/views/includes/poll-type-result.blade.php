@if($poll->type == 'thumbs')
<?php
$up = PollHelper::getThumbChoices($poll->id, 'up');
$down = PollHelper::getThumbChoices($poll->id, 'down');
?>
	<div class="poll-answer">
    <div class="th-cnt">    
      <div class="th-cnt-rw">
        <div class="th-cnt-rw-cl">
          <a class="thumbs" value="1" data-choiceid="{{ $up }}" data-msg="msg{{ $x }}" data-pollid="{{ $poll->id }}"><i class="fa fa-thumbs-up fa-thumbs-up-cs"></i></a>            
        </div>          
        <div class="th-cnt-rw-cl">
          <a class="thumbs " value="0" data-choice="{{ $down }}" data-msg="msg{{ $x }}" data-pollid="{{ $poll->id }}"><i class="fa fa-thumbs-down fa-flip-horizontal fa-thumbs-down-cs"></i></a>
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
          <h1>{{ PollHelper::votePercetage($poll->id, $up).'%' }}</h1>
        </div>          
        <div class="th-cnt-rw-cl">
          <h1>{{ PollHelper::votePercetage($poll->id, $down).'%' }}</h1>
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
    <?php $shocked = PollHelper::getMoodChoices($poll->id, 'shocked') ?>	
    @if($shocked != '')															
			<li><a value=1 data-choiceid="{{ $shocked }}"  data-msg="msg{{ $x }}" data-pollid="{{ $poll->id }}"><img src="{{ asset('img/moods/mood1.png') }}" data-toggle="tooltip" title="Shocked!" alt="Shocked!"/></a></li>
    @endif
    <?php $angry = PollHelper::getMoodChoices($poll->id, 'angry') ?>  
    @if($angry != '')  
			<li value="2"><a value=2 data-choiceid="{{ $angry }}" data-msg="msg{{ $x }}" data-pollid="{{ $poll->id }}"><img src="{{ asset('img/moods/mood2.png') }}" data-toggle="tooltip" title="Angry" alt="Angry"/></a></li>
    @endif
    <?php $fine = PollHelper::getMoodChoices($poll->id, 'fine') ?>  
    @if($fine != '')  
			<li value="3"><a value=3 data-choiceid="{{ $fine }}" data-msg="msg{{ $x }}" data-pollid="{{ $poll->id }}"><img src="{{ asset('img/moods/mood3.png') }}" data-toggle="tooltip" title="Fine" alt="Fine"/></a></li>
    @endif
    <?php $happy = PollHelper::getMoodChoices($poll->id, 'happy') ?>  
    @if($happy != '')
			<li value="4"><a value=4 data-choiceid="{{ $happy }}" data-msg="msg{{ $x }}" data-pollid="{{ $poll->id }}"><img src="{{ asset('img/moods/mood4.png') }}" data-toggle="tooltip" title="Happy" alt="Happy"/></a></li>
    @endif
    <?php $sad = PollHelper::getMoodChoices($poll->id, 'sad') ?>  
    @if($sad != '')
			<li value="5"><a value=5 data-choiceid="{{ $sad }}" data-msg="msg{{ $x }}" data-pollid="{{ $poll->id }}"><img src="{{ asset('img/moods/mood5.png') }}" data-toggle="tooltip" title="Sad" alt="Sad"/></a></li>
    @endif
    <?php $dontcare = PollHelper::getMoodChoices($poll->id, 'dontcare') ?>  
    @if($dontcare != '')
			<li value="6"><a value=6 data-choiceid="{{ $dontcare }}" data-msg="msg{{ $x }}" data-pollid="{{ $poll->id }}"><img src="{{ asset('img/moods/mood6.png') }}" data-toggle="tooltip" title="Don't Care" aly="Don't Care"/></a></li>
    @endif
    <?php $nothing = PollHelper::getMoodChoices($poll->id, 'nothing') ?>  
    @if($nothing != '')
			<li value="7"><a value=7 data-choiceid="{{ $nothing }}" data-msg="msg{{ $x }}" data-pollid="{{ $poll->id }}"><img src="{{ asset('img/moods/mood7.png' ) }}" data-toggle="tooltip" title="Nothing" alt="Nothing"/></a></li>
    @endif
		</ul>
		</div>
	</div>
</div>	
<div class="poll-result">
	<div class="mm-cnt">
		<div class="mm-cnt-rw-cl">	
		<ul class="h-mood-r text-center">		 
      <?php $shocked = PollHelper::getMoodChoices($poll->id, 'shocked') ?>  
      @if($shocked != '')                             
        <li data-content="{{ PollHelper::votePercetage($poll->id, $shocked).'%' }}" class="m1-r"><img src="{{ asset('img/moods/mood1.png') }}" data-toggle="tooltip" title="Shocked!" alt="Shocked!"/></li>
      @endif
      <?php $angry = PollHelper::getMoodChoices($poll->id, 'angry') ?>  
      @if($angry != '')  
        <li data-content="{{ PollHelper::votePercetage($poll->id, $angry).'%' }}" class="m2-r"><img src="{{ asset('img/moods/mood2.png') }}" data-toggle="tooltip" title="Angry" alt="Angry"/></li>
      @endif
      <?php $fine = PollHelper::getMoodChoices($poll->id, 'fine') ?>  
      @if($fine != '')  
        <li value="3" data-content="{{ PollHelper::votePercetage($poll->id, $fine).'%' }}" class="m3-r"><img src="{{ asset('img/moods/mood3.png') }}" data-toggle="tooltip" title="Fine" alt="Fine"/></li>
      @endif
      <?php $happy = PollHelper::getMoodChoices($poll->id, 'happy') ?>  
      @if($happy != '')
        <li value="4" data-content="{{ PollHelper::votePercetage($poll->id, $happy).'%' }}" class="m4-r"><img src="{{ asset('img/moods/mood4.png') }}" data-toggle="tooltip" title="Happy" alt="Happy"/></li>
      @endif
      <?php $sad = PollHelper::getMoodChoices($poll->id, 'sad') ?>  
      @if($sad != '')
        <li value="5" data-content="{{ PollHelper::votePercetage($poll->id, $sad).'%' }}" class="m5-r"><img src="{{ asset('img/moods/mood5.png') }}" data-toggle="tooltip" title="Sad" alt="Sad"/></li>
      @endif
      <?php $dontcare = PollHelper::getMoodChoices($poll->id, 'dontcare') ?>  
      @if($dontcare != '')
        <li value="6" data-content="{{ PollHelper::votePercetage($poll->id, $dontcare).'%' }}" class="m6-r"><img src="{{ asset('img/moods/mood6.png') }}" data-toggle="tooltip" title="Don't Care" aly="Don't Care"/></li>
      @endif
      <?php $nothing = PollHelper::getMoodChoices($poll->id, 'nothing') ?>  
      @if($nothing != '')
        <li value="7" data-content="{{ PollHelper::votePercetage($poll->id, $nothing).'%' }}" class="m7-r"><img src="{{ asset('img/moods/mood7.png') }}" data-toggle="tooltip" title="Nothing" alt="Nothing"/></li>
      @endif
		</ul>
		</div>
	</div>
</div>	
@endif

@if($poll->type == 'rating')
<div class="poll-answer">
  <div class="rt-cnt">
    <?php $mcchoices = PollHelper::getRateChoices($poll->id); ?>
    <div class="rt-cnt-rw-cl">
      <input type="text" class="rating-loading rating-set{{ $x }} rating-rate" value="" data-size="xl" title="" data-choiceid="{{ $mcchoices->id }}" data-msg="msg{{ $x }}" data-pollid="{{ $poll->id }}">
      <script> 
      var baseUrl = "http://localhost:8000";
      $('.rating-set{{ $x }}').rating({ stars: {{ PollHelper::getPollRate($poll->id) }} })
      .on("rating.change", function(event, value, caption) {
          var msg = $('.'+$(this).data('msg'));
          msg.html("");
          var pollid = $(this).data('pollid');
          var choiceid = $(this).data('choiceid');
          var userStatus = checkUser(baseUrl);
          if(userStatus == 'notallowed'){
            $("#modLogin").modal(); 
          }else if(userStatus == 'notverified'){
          msg.html("<div class='alert alert-success alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Your email address is not yet verified. Please check your email. <a href='resend-verification'>Resend?</a></div>");
          }else{
          msg.html("<div class='alert alert-info alert-dismissible fade in'>Please Confirm your vote <button class='btn btn-default yesbtn'>Yes</button> <button class='btn btn-default nobtn'>No</button></div>");
          $('.yesbtn').click(function(){ 
            msg.html(""); 
            $.ajax({
              url: baseUrl+'/poll/vote/rate',
              data: {'pollid': pollid, 'choiceid': choiceid, 'rate': value },
              dataType: 'JSON',
              type: 'POST',
              success: function(e){
                if(e['status'] == 'success'){
                msg.html("<div class='alert alert-success alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Thank you for participating the poll.</div>");
                }else if(e['status'] == 'exist'){
                msg.html("<div class='alert alert-warning alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>You have already participated.</div>");
                }else{
                msg.html("<div class='alert alert-danger alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Failed. Please try again.</div>");
                }
              }
            });
          });
          $('.nobtn').click(function(){ msg.html(""); });
          }
      }); 
      </script>   
    </div>
  </div>
</div>
<div class="poll-result">
  <div class="rt-cnt clearfix">
  @if(Auth::check())
    <div class="rt-cnt-rw">
      <div class="rt-cnt-rw-cl">                    
        <input type="text" class="rating rating-loading rating-answer{{ $x }}" value="{{ PollHelper::getUserRate($poll->id) }}" data-size="xl" title="Your Answer">
        <script>
        $('.rating-answer{{ $x }}').rating({ stars: {{ PollHelper::getPollRate($poll->id) }}, disabled: true });
        </script>
        <p>Your Answer</p>
      </div>
    </div>
    @endif
    <div class="rt-cnt-rw">
      <div class="rt-cnt-rw-cl">                    
        <input type="text" class="rating rating-loading rating-world{{ $x }}" value="{{ PollHelper::getTotalRating($poll->id) }}" data-size="xl" title="The World">
        <script>
        $('.rating-world{{ $x }}').rating({ stars: {{ PollHelper::getPollRate($poll->id) }}, disabled: true });
        </script>
        <p>The World</p>
      </div>
    </div>
  </div>
</div>
@endif

@if($poll->type == 'multiplechoice')
<div class="poll-answer">
  <div class="scrollbar style-1">
  <?php 
  $mcchoices = PollHelper::getMcChoices($poll->id); 
  $incre = 1;
  ?>
    @foreach($mcchoices as $c)
    <input type="checkbox" id="c{{ $c->id }}" class="css-checkbox lrg">
      <label for="c{{ $c->id }}" name="checkbox{{ $c->id }}_lbl" class="css-label lrg chk{{ $incre }} chk" data-id="{{ $c->id }}">{{ $c->choice }}</label>
    </input>
    <?php $incre++; ?>
    @endforeach
    <a class="btn btn-success submit-choice-btn" data-msg="msg{{ $x }}" data-pollid="{{ $poll->id }}">Submit Choice/s</a>
  </div>
</div>
<div class="poll-result">
  <div class="scrollbar style-1">
@foreach($mcchoices as $c)
    <div class="mc-cnt clearfix">
      <input type="checkbox" id="checkbox1-r" class="css-checkbox lrg" checked disabled>
        <label for="checkbox1-r" name="checkbox1-r_lbl" class="css-label lrg a-chk">                  
          <div class="progress">
            <div class="progress-bar progress-bar-info active" role="progressbar" aria-valuenow="90"
            aria-valuemin="0" aria-valuemax="100" style="width:90%">
              {{ $c->choice }}
            </div>
            <span class="percentage">90%</span>
          </div>
        </label>
      </input>
    </div>
@endforeach
  </div>
</div>
@endif


@if($poll->type == 'ranking')
<div class="poll-answer">
  <ul id="h_ranking" class="h_ranking list-group scrollbar style-1 text-center">
  <?php $choices = PollHelper::getChoices($poll->id); ?>
  @foreach($choices as $c)
    <li class="list-group-item"><p>{{ ucwords($c->choice) }}</p></li>
  @endforeach
    <br/>
    <br/>
    <a class="btn btn-success submit-rank-btn">Submit Ranking</a>
  </ul>
</div>
<div class="poll-result">
  <ul class="h_ranking-r list-group scrollbar style-1 text-center">
    <li class="list-group-item"><p>1</p></li>
    <li class="list-group-item"><p>2</p></li>
    <li class="list-group-item"><p>3</p></li>
    <li class="list-group-item"><p>4</p></li>
    <li class="list-group-item"><p>5</p></li>
    <li class="list-group-item"><p>6</p></li>
    <li class="list-group-item"><p>7</p></li>
    <li class="list-group-item"><p>8</p></li>
  </ul>
</div>
@endif