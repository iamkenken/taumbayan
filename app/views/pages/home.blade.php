@extends('layouts.fullpage')

@section('content')
	<div class="section" id="section0">
	    <div class="slide" id="slide1" data-anchor="slide1">	
			<div class="container">			
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<h1>Trending <span class="genericon genericon-expand"></span> | <span class="cat-count">4579 POLLS</span></h1>	
					</div>	
					<div class="col-xs-6 col-sm-6 col-md-6">					
						<h1>Thumbs Up or Down <button class="share-this m-share" title="Share this Poll">SHARE THIS</button></h1>
					</div>	
				</div>	
				<div class="row mg-btm-10 mg-top-10">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="poll-question">
							<p>Nararapat bang humarap si VP Binay sa Senado at harapin ang mga kasong ipinaratang sa kanya? </p>
						</div>
					</div>	
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="fb-comments-cnt">									
							<div class="fb-comments" data-href="http://localhost:8000" data-numposts="5" data-width="100%"></div>														
						</div>
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
						<div class="comments-section pull-left">						
							<a class="view_comments"><span class="genericon genericon-chat"></span> COMMENTS</a>
							<a class="hide_comments"><span class="genericon genericon-close"></span> HIDE</a>		
						</div>
						<div class="results-btn pull-right">
							<a class="view-poll-result"><span class="genericon genericon-summary"></span> RESULTS</a>
							<a class="close-poll-result"><span class="genericon genericon-close"></span> HIDE</a>
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
					<div class="col-xs-6 col-sm-6 col-md-6">
						<h1>Trending <span class="genericon genericon-expand"></span> | <span class="cat-count">4579 POLLS</span> </h1>		
					</div>	
					<div class="col-xs-6 col-sm-6 col-md-6">
						<h1>Rating <button class="share-this m-share" title="Share this Poll">SHARE THIS</button></h1>	
					</div>	
				</div>	
				<div class="row mg-btm-10 mg-top-10">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="poll-question rt-pq">							
							<img src="{{ asset('img/categories/cat-entertainment.jpg') }}" class="img-responsive"/>
						</div>
					</div>	
					<div class="col-xs-12 col-sm-6 col-md-6">	
						<div class="fb-comments-cnt">									
							<div class="fb-comments" data-href="http://localhost:2" data-numposts="5" data-width="100%"></div>														
						</div>								
						<div class="poll-answer rt-cnt">
							<div class="rt-cnt-rw-cl">
								<input type="text" class="rating rating-loading" value="3" data-size="xl" title="">		
							</div>
						</div>
						<div class="poll-result">
							<div class="rt-cnt clearfix">
								<div class="rt-cnt-rw">
									<div class="rt-cnt-rw-cl">										
										<input type="text" class="rating rating-loading rating-answer" value="" data-size="xl" title="Your Answer">
										<p>Your Answer</p>
									</div>
								</div>
								<div class="rt-cnt-rw">
									<div class="rt-cnt-rw-cl">										
										<input type="text" class="rating rating-loading rating-world" value="" data-size="xl" title="The World">
										<p>The World</p>
									</div>
								</div>
							</div>
						</div>							
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
						<div class="comments-section pull-left">						
							<a class="view_comments"><span class="genericon genericon-chat"></span> COMMENTS</a>
							<a class="hide_comments"><span class="genericon genericon-close"></span> HIDE</a>		
						</div>
						<div class="results-btn pull-right">
							<a class="view-poll-result"><span class="genericon genericon-summary"></span> RESULTS</a>
							<a class="close-poll-result"><span class="genericon genericon-close"></span> HIDE</a>
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
					<div class="col-xs-6 col-sm-6 col-md-6">						
						<h1>Trending <span class="genericon genericon-expand"></span> | <span class="cat-count">4579 POLLS</span> </h1>		
					</div>	
					<div class="col-xs-6 col-sm-6 col-md-6">					
						<h1>Multiple Choice <button class="share-this m-share" title="Share this Poll">SHARE THIS</button></h1>	
					</div>	
				</div>	
				<div class="row  mg-btm-10 mg-top-10">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="poll-question">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
						</div>
					</div>	
					<div class="col-xs-12 col-sm-6 col-md-6">		
						<div class="fb-comments-cnt">									
							<div class="fb-comments" data-href="http://localhost:3" data-numposts="5" data-width="100%" ></div>														
						</div>										
						<div class="poll-answer scrollbar style-1">
							<input type="checkbox" id="checkbox1" class="css-checkbox lrg" checked>
								<label for="checkbox1" name="checkbox1_lbl" class="css-label lrg a-chk">Lorem Ipsum lorem lorem Lorem Ipsum lorem lorem Lorem Ipsum lorem lorem</label>
							</input>
							<input type="checkbox" id="checkbox2" class="css-checkbox lrg">
								<label for="checkbox2" name="checkbox2_lbl" class="css-label lrg b-chk">Lorem Ipsum</label>
							</input>
							<input type="checkbox" id="checkbox3" class="css-checkbox lrg">
								<label for="checkbox3" name="checkbox3_lbl" class="css-label lrg c-chk">Lorem Ipsum</label>
							</input>
							<input type="checkbox" id="checkbox4" class="css-checkbox lrg">
								<label for="checkbox4" name="checkbox4_lbl" class="css-label lrg d-chk">Lorem Ipsum</label>
							</input>
							<input type="checkbox" id="checkbox5" class="css-checkbox lrg">
								<label for="checkbox5" name="checkbox5_lbl" class="css-label lrg e-chk">Lorem Ipsum</label>
							</input>
							<input type="checkbox" id="checkbox6" class="css-checkbox lrg">
								<label for="checkbox6" name="checkbox6_lbl" class="css-label lrg f-chk">Lorem Ipsum</label>
							</input>
		                    <a class="btn btn-success submit-choice-btn">Submit Choice/s</a>
						</div>	
						<div class="poll-result scrollbar style-1">
							<div class="mc-cnt clearfix">
								<input type="checkbox" id="checkbox1-r" class="css-checkbox lrg" checked disabled>
									<label for="checkbox1-r" name="checkbox1-r_lbl" class="css-label lrg a-chk">									
										<div class="progress">
										  <div class="progress-bar progress-bar-info active" role="progressbar" aria-valuenow="90"
										  aria-valuemin="0" aria-valuemax="100" style="width:90%">
										    Lorem Ipsum lorem lorem Lorem Ipsum lorem lorem Lorem Ipsum lorem lorem
										  </div>
										  <span class="percentage">90%</span>
										</div>
									</label>
								</input>
								<input type="checkbox" id="checkbox2-r" class="css-checkbox lrg" checked disabled>
									<label for="checkbox2-r" name="checkbox2-r_lbl" class="css-label lrg b-chk">
										<div class="progress">
										  <div class="progress-bar progress-bar-info active" role="progressbar" aria-valuenow="100"
										  aria-valuemin="0" aria-valuemax="100" style="width:100%">
										    Lorem Ipsum
										  </div>
										  <span class="percentage">100%</span>
										</div>
									</label>	
								</input>						
								<input type="checkbox" id="checkbox3-r" class="css-checkbox lrg" checked disabled>
									<label for="checkbox3-r" name="checkbox3_lbl-r" class="css-label lrg c-chk">
										<div class="progress">
										  <div class="progress-bar progress-bar-info active" role="progressbar" aria-valuenow="40"
										  aria-valuemin="0" aria-valuemax="100" style="width:40%">
										    Lorem Ipsum
										  </div>
										  <span class="percentage">40%</span>
										</div>
									</label>
								</input>								
								<input type="checkbox" id="checkbox4-r" class="css-checkbox lrg" checked disabled>
									<label for="checkbox4-r" name="checkbox4_lbl-r" class="css-label lrg d-chk">
										<div class="progress">
										  <div class="progress-bar progress-bar-info active" role="progressbar" aria-valuenow="70"
										  aria-valuemin="0" aria-valuemax="100" style="width:70%">
										    Lorem Ipsum
										  </div>
										  <span class="percentage">70%</span>
										</div>
									</label>
								</input>
								<input type="checkbox" id="checkbox5-r" class="css-checkbox lrg" checked disabled>
									<label for="checkbox5-r" name="checkbox5_lbl-r" class="css-label lrg e-chk">
										<div class="progress">
										  <div class="progress-bar progress-bar-info active" role="progressbar" aria-valuenow="60"
										  aria-valuemin="0" aria-valuemax="100" style="width:60%">
										    Lorem Ipsum
										  </div>
										  <span class="percentage">60%</span>
										</div>
									</label>
								</input>
								<input type="checkbox" id="checkbox6-r" class="css-checkbox lrg" checked disabled>
									<label for="checkbox6-r" name="checkbox6_lbl-r" class="css-label lrg f-chk">
										<div class="progress">
										  <div class="progress-bar progress-bar-info active" role="progressbar" aria-valuenow="20"
										  aria-valuemin="0" aria-valuemax="100" style="width:20%">
										    Lorem Ipsum
										  </div>
										  <span class="percentage">20%</span>
										</div>
									</label>
								</input>
							</div>
						</div>				
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
						<div class="comments-section pull-left">						
							<a class="view_comments"><span class="genericon genericon-chat"></span> COMMENTS</a>
							<a class="hide_comments"><span class="genericon genericon-close"></span> HIDE</a>		
						</div>
						<div class="results-btn pull-right">
							<a class="view-poll-result"><span class="genericon genericon-summary"></span> RESULTS</a>
							<a class="close-poll-result"><span class="genericon genericon-close"></span> HIDE</a>
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
					<div class="col-xs-6 col-sm-6 col-md-6">					
						<h1>Trending <span class="genericon genericon-expand"></span> | <span class="cat-count">4579 POLLS</span> </h1>		
					</div>	
					<div class="col-xs-6 col-sm-6 col-md-6">
						<h1>Mood Meter <button class="share-this m-share" title="Share this Poll">SHARE THIS</button></h1>	
					</div>	
				</div>	
				<div class="row mg-btm-10 mg-top-10">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="poll-question">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
						</div>
					</div>	
					<div class="col-xs-12 col-sm-6 col-md-6">		
						<div class="fb-comments-cnt">									
							<div class="fb-comments" data-href="http://localhost:4" data-numposts="5" data-width="100%"></div>														
						</div>															
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
						<div class="comments-section pull-left">						
							<a class="view_comments"><span class="genericon genericon-chat"></span> COMMENTS</a>
							<a class="hide_comments"><span class="genericon genericon-close"></span> HIDE</a>		
						</div>
						<div class="results-btn pull-right">
							<a class="view-poll-result"><span class="genericon genericon-summary"></span> RESULTS</a>
							<a class="close-poll-result"><span class="genericon genericon-close"></span> HIDE</a>
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
					<div class="col-xs-6 col-sm-6 col-md-6">
						<h1>Trending <span class="genericon genericon-expand"></span> | <span class="cat-count">4579 POLLS</span> </h1>						
					</div>	
					<div class="col-xs-6 col-sm-6 col-md-6">
						<h1>Ranking <button class="share-this m-share" title="Share this Poll">SHARE THIS</button></h1>		
					</div>	
				</div>	
				<div class="row mg-btm-10 mg-top-10">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="poll-question">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
						</div>
					</div>	
					<div class="col-xs-12 col-sm-6 col-md-6">	
						<div class="fb-comments-cnt">									
							<div class="fb-comments" data-href="http://localhost:5" data-numposts="5" data-width="100%"></div>														
						</div>																
						<div class="poll-answer">						
							<ul id="h_ranking" class="h_ranking list-group scrollbar style-1 text-center">
							  <li class="list-group-item"><p>1</p></li>
							  <li class="list-group-item"><p>2</p></li>
							  <li class="list-group-item"><p>3</p></li>
							  <li class="list-group-item"><p>4</p></li>
							  <li class="list-group-item"><p>5</p></li>
							  <li class="list-group-item"><p>6</p></li>
							  <li class="list-group-item"><p>7</p></li>
							  <li class="list-group-item"><p>8</p></li>
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
						<div class="comments-section pull-left">						
							<a class="view_comments"><span class="genericon genericon-chat"></span> COMMENTS</a>
							<a class="hide_comments"><span class="genericon genericon-close"></span> HIDE</a>		
						</div>
						<div class="results-btn pull-right">
							<a class="view-poll-result"><span class="genericon genericon-summary"></span> RESULTS</a>
							<a class="close-poll-result"><span class="genericon genericon-close"></span> HIDE</a>
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
						<h1 class="pull-left">Politics | uPick <span class="genericon genericon-expand"></span> |<span class="cat-count"> 4579 POLLS</span> </h1>
						<h1 class="pull-right"><button class="share-this m-share" title="Share this Poll">SHARE THIS</button></h1>
					</div>		
				</div>	
				<div class="row" style="margin: 10px 0px">
					<div class="fb-comments-cnt">									
						<div class="fb-comments" data-href="http://localhost:6" data-numposts="5" data-width="100%"></div>														
					</div>
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
				</div>	
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="poll-question-buttons">
							<a class="btn submit-poll-btn-home" href="{{ url('/submit-poll?a=1') }}" title="Submit Poll"><b>SUBMIT POLL</b></a>
							<a class="btn source-btn" href="#" title="Source"><b>SOURCE</b></a>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="comments-section pull-left">						
							<a class="view_comments"><span class="genericon genericon-chat"></span> COMMENTS</a>
							<a class="hide_comments"><span class="genericon genericon-close"></span> HIDE</a>		
						</div>
						<div class="results-btn pull-right">
							<a class="view-poll-result"><span class="genericon genericon-summary"></span> RESULTS</a>
							<a class="close-poll-result"><span class="genericon genericon-close"></span> HIDE</a>
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

@stop