@extends('layouts.default')

@section('content')
<div class="section container">            
<div class="row">
    <div class="col-md-12 text-center">
        <div class="submit-poll-buttons container">
            <?php
                if(isset($_GET['a'])){
                    if($_GET['a']==1){
            ?>
                        <a href="?a=1" class="submit-poll-btn btn btn-lg active">Thumbs</a>
                        <a href="?a=2" class="submit-poll-btn btn">Multiple Choice</a>
                        <a href="?a=3" class="submit-poll-btn btn">Mood Meter</a>
                        <a href="?a=4" class="submit-poll-btn btn">Ranking</a>
                        <a href="?a=5" class="submit-poll-btn btn">Rating</a>
                        <a href="?a=6" class="submit-poll-btn btn">uPick</a>                        
            <?php
                    }else if($_GET['a']==2){
            ?>
                        <a href="?a=1" class="submit-poll-btn btn">Thumbs</a>
                        <a href="?a=2" class="submit-poll-btn btn active">Multiple Choice</a>
                        <a href="?a=3" class="submit-poll-btn btn">Mood Meter</a>
                        <a href="?a=4" class="submit-poll-btn btn">Ranking</a>
                        <a href="?a=5" class="submit-poll-btn btn">Rating</a>
                        <a href="?a=6" class="submit-poll-btn btn">uPick</a>
            <?php
                    }else if($_GET['a']==3){
            ?>
                        <a href="?a=1" class="submit-poll-btn btn">Thumbs</a>
                        <a href="?a=2" class="submit-poll-btn btn">Multiple Choice</a>
                        <a href="?a=3" class="submit-poll-btn btn active">Mood Meter</a>
                        <a href="?a=4" class="submit-poll-btn btn">Ranking</a>
                        <a href="?a=5" class="submit-poll-btn btn">Rating</a>
                        <a href="?a=6" class="submit-poll-btn btn">uPick</a>
            <?php   
                        
                    }else if($_GET['a']==4){
            ?>
                        <a href="?a=1" class="submit-poll-btn btn">Thumbs</a>
                        <a href="?a=2" class="submit-poll-btn btn">Multiple Choice</a>
                        <a href="?a=3" class="submit-poll-btn btn">Mood Meter</a>
                        <a href="?a=4" class="submit-poll-btn btn active">Ranking</a>
                        <a href="?a=5" class="submit-poll-btn btn">Rating</a>
                        <a href="?a=6" class="submit-poll-btn btn">uPick</a>
            <?php               
                    }else if($_GET['a']==5){
            ?>
                        <a href="?a=1" class="submit-poll-btn btn">Thumbs</a>
                        <a href="?a=2" class="submit-poll-btn btn">Multiple Choice</a>
                        <a href="?a=3" class="submit-poll-btn btn">Mood Meter</a>
                        <a href="?a=4" class="submit-poll-btn btn">Ranking</a>
                        <a href="?a=5" class="submit-poll-btn btn active">Rating</a>
                        <a href="?a=6" class="submit-poll-btn btn">uPick</a>
            <?php               
                    }else if($_GET['a']==6){
            ?>
                        <a href="?a=1" class="submit-poll-btn btn">Thumbs</a>
                        <a href="?a=2" class="submit-poll-btn btn">Multiple Choice</a>
                        <a href="?a=3" class="submit-poll-btn btn">Mood Meter</a>
                        <a href="?a=4" class="submit-poll-btn btn">Ranking</a>
                        <a href="?a=5" class="submit-poll-btn btn">Rating</a>
                        <a href="?a=6" class="submit-poll-btn btn active">uPick</a>
            <?php               
                    }else{
                        
            
                    }
                }else{
                    
                }
            ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3 text-center">
        <div class="submit-poll-content">
			<?php
							if(isset($_GET['a'])){
								if($_GET['a']==1){ //===== Thumbs
									echo '	<form action="#">
												<div class="form-group">	
													<select class="form-control" id="th_cat">
														<option value="" selected disabled style="display: none">Select Category</option>
														<option value="">1</option>
														<option value="">2</option>							
													</select>
												</div>				
												<div class="form-group">				
												  <input type="text" class="form-control" id="th_title" placeholder="Enter Title">
												</div>										
												<div class="form-group">
												  <textarea class="form-control" rows="5" id="th_question" placeholder="Enter Poll Question"></textarea>
												</div>
												<div class="text-right">
													<a class="submit-poll-content-btn btn pointer">Preview Poll</a> <a class="submit-poll-content-btn btn pointer">Submit Poll</a>	
												</div>
											</form>	
										';							
								}
								if($_GET['a']==2){ // ======= Multiple Choice
									echo '	<form action="#">
												<div class="form-group">	
													<select class="form-control" id="mc_cat">
														<option value="" selected disabled style="display: none">Select Category</option>
														<option value="">1</option>
														<option value="">2</option>							
													</select>
												</div>				
												<div class="form-group">				
												  <input type="text" class="form-control" id="mc_title" placeholder="Enter Title">
												</div>	
												<div class="form-group">
												  <textarea class="form-control" rows="5" id="mc_question" placeholder="Enter Poll Question"></textarea>
												</div>
												<div class="form-group text-left">
													<input type="text" class="form-control" name="choice1" placeholder="Type Choice Here" style="margin-top: 5px;">';
																									
													if(isset($_GET['ch'])){														
														$ch = $_GET['ch'];														
														for($cnt=2;$cnt<=$ch;$cnt++){
															if($cnt<=10){
																echo '
																		<input type="text" class="form-control" name="choice' . ($cnt+2) . '" placeholder="Type Choice Here" style="margin-top: 5px;">
																	';
															}
														}
													}
									echo '
													<div style="margin-top:5px;">';
													if(isset($_GET['ch'])){
														$ch = $cnt;
														$re = $cnt - 2;
														if($ch<12){
															echo '<a href="submit-poll?a=2&ch=' . $cnt . '" class="text-gray">Add More Choices + </a>';
															echo '<a href="submit-poll?a=2&ch=' . $re . '" class="text-gray pull-right"> Remove 1 </a>';
														}else{
															echo '<a href="submit-poll?a=2&ch=' . $re . '" class="text-gray pull-right" > Remove 1 </a>';
														}
													}else{
														echo '<a href="submit-poll?a=2&ch=2" class="text-gray" style="margin-left: 5px;">Add More Choices + </a>';
													}
									echo '
													</div>
												</div>
												<div class="text-right" style="clear:both;">
													<a class="submit-poll-content-btn btn pointer">Preview Poll</a> <a class="submit-poll-content-btn btn pointer">Submit Poll</a>	
												</div>
											</form>	
										';
									
								}
								if($_GET['a']==3){ //===== Mood Meter
									echo '	<form action="#">
												<div class="form-group">	
													<select class="form-control" id="mm_cat">
														<option value="" selected disabled style="display: none">Select Category</option>
														<option value="">1</option>
														<option value="">2</option>							
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
															<a href=""><img src="img/moods/mood1.png" class="mood" data-toggle="tooltip" title="Shocked!"/></a>
															<a href=""><img src="img/moods/mood2.png" class="mood" data-toggle="tooltip" title="Angry"/></a>
															<a href=""><img src="img/moods/mood3.png" class="mood" data-toggle="tooltip" title="Fine"/></a>
															<a href=""><img src="img/moods/mood4.png" class="mood" data-toggle="tooltip" title="Happy"/></a>
															<a href=""><img src="img/moods/mood5.png" class="mood" data-toggle="tooltip" title="Sad"/></a>
															<a href=""><img src="img/moods/mood6.png" class="mood" data-toggle="tooltip" title="Do not Care"/></a>
															<a href=""><img src="img/moods/mood7.png" class="mood" data-toggle="tooltip" title="Nothing"/></a>
														</div>
													</div>
												</div>												
												<div class="text-right">
													<a class="submit-poll-content-btn btn pointer">Preview Poll</a> <a class="submit-poll-content-btn btn pointer">Submit Poll</a>	
												</div>
											</form>	
										';
								}
								if($_GET['a']==4){ // ======= Ranking
									echo '	<form action="#">
												<div class="form-group">	
													<select class="form-control" id="rnk_cat">
														<option value="" selected disabled style="display: none">Select Category</option>
														<option value="">1</option>
														<option value="">2</option>							
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
										';
									
								}
								if($_GET['a']==5){ // == Rating
									echo '	<form action="#">
												<div class="form-group">	
													<select class="form-control" id="rte_cat">
														<option value="" selected disabled style="display: none">Select Category</option>
														<option value="">1</option>
														<option value="">2</option>							
													</select>
												</div>	
												<div class="text-left">
													<p>Enter Picture to Rate</p>
												</div>
												<div class="row mgt-10">
													<div class="col-md-12 text-center">		
														<a href=""><img src="img/upload.png" /></a>
													</div>
												</div>
												<div class="text-right">											
													<a class="submit-poll-content-btn btn pointer">Preview Poll</a> <a class="submit-poll-content-btn btn pointer">Submit Poll</a>	
												</div>
											</form>	
										';
								
								}
								if($_GET['a']==6){ //===== uPick
									echo '	<form action="#">
												<div class="form-group">	
													<select class="form-control" id="up_cat">
														<option value="" selected disabled style="display: none">Select Category</option>
														<option value="">1</option>
														<option value="">2</option>							
													</select>
												</div>	
												<div class="text-left">
													<p>Enter Picture to Rate</p>
												</div>																					
												
													<div class="col-md-6 text-center">		
														<a href=""><img src="img/upload.png" class="img-responsive"/></a>
													</div>
													<div class="col-md-6 text-center">		
														<a href=""><img src="img/upload.png" class="img-responsive"/></a>
													</div>
												
												<div class="text-right">											
													<a class="submit-poll-content-btn btn pointer">Preview Poll</a> <a class="submit-poll-content-btn btn pointer">Submit Poll</a>	
												</div>
											</form>	
										';					
								}
								
							}
						?>				
					
		
		</div>  
    </div>
</div>  
</div>
@endsection