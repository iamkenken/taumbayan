<!-- Modal Login -->
<div class="modal fade" id="modLogin" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
		<div class="modal-dialog m-login-dialog">    
		  <!-- Modal content-->
		  <div class="modal-content m-login-custom">
			<div class="modal-header m-login-header">				  
			  <div class="m-login-container-left">
				<div class="pointer m-signup" style="margin-top:10px; color: #FFF;"  data-dismiss="modal">
					SIGN UP
				</div>
			  </div>			 
			  <div class="">
				<div style="margin-top:10px">
					SIGN IN
				</div>
			  </div>		  
			</div>
			<div class="modal-body" style="padding:20px 30px;">
			  <form role="form">
				<div class="form-group">					  
				  <input type="text" class="form-control" id="login_email" name="email" placeholder="Email">
				</div>
				<div class="form-group">					  
				  <input type="password" class="form-control" id="login_pw" name="password" placeholder="Password">
				</div>
				<div class="checkbox">
				  <label><input type="checkbox" name="remember" value="" >Remember me</label>
				  <a href="{{ url('/password/reset') }}" class="pull-right">Forgot password?</a>
				</div>
				 {{ csrf_field() }}
				  <button type="button" id="loginbtn" class="btn btn-primary btn-block">SIGN IN</button>
			  </form>				
			  <div class="social-login-icons">				
				<a href="#"><img src="img/g-plus-icon.png" /></a>
				<a href="#"><img src="img/fb-icon.png" /></a>
				<a href="#"><img src="img/tw-icon.png" /></a>				
			  </div>			
			</div>			
		  </div>
		  
		</div>
	  </div> 

<!-- Modal Signup -->
<div class="modal fade" id="modSignup" role="dialog" aria-labelledby="ModalSignup" aria-hidden="true">
	<div class="modal-dialog m-signup-dialog">    
	  <!-- Modal content-->
	  <div class="modal-content m-login-custom">
		<div class="modal-header m-login-header">	
			<div style="margin-top:10px; color: #0e0e0e; float:left; width: 50%;" >
				SIGN UP
			</div>
		  <div class="m-login-container-right">
			<div class="pointer m-login" style="margin-top:10px"  data-dismiss="modal">
				SIGN IN
			</div>
		  </div>		  
		</div>
		<div class="modal-body" style="padding:20px 30px;">
		  <form role="form" method="POST" action="{{ url('/') }}">
			<div class="form-group">					
			  <input type="text" class="form-control" name="firstname" id="fname" placeholder="First Name *" required>					   
			</div>
			<div class="form-group">				
			  <input type="text" class="form-control" name="lastname" id="lname" placeholder="Last Name *">
			</div>
			<div class="form-group">				
			  <input type="text" class="form-control" name="email" id="signup_email" placeholder="Email *">
			</div>
			<div class="form-group">				
			  <input type="text" class="form-control" name="password" id="signup_pw" placeholder="Password *">
			</div>
			<div class="form-group">				
			  <input type="text" class="form-control" name="confirmation_password" id="signup_cpw" placeholder="Confirm Password *">
			</div>				
			<div class="row" style="margin-bottom: 12px;">
				<div class="col-xs-5 col-sm-4 col-lg-4" style="padding-right:0;">						
					<select class="form-control" name="gender" id="sex">
						<option value="" selected disabled style="display: none">Sex</option>
						<option value="">Male</option>
						<option value="">Female</option>							
					</select>	
				</div>							
				<div class="col-xs-7 col-sm-8 col-lg-8">
					<div class="input-group date" data-provide="datepicker" style="z-index:1151 !important;">
						<input type="text" class="form-control" name="birthday" placeholder="Birthday" id="birthday">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</div>
					</div>
				</div>
			</div>					
			  <button type="submit" class="btn btn-primary btn-block">SIGN UP</button>
		  </form>				
		  <div class="social-login-icons">				
			<a href="#"><img src="img/g-plus-icon.png" /></a>
			<a href="#"><img src="img/fb-icon.png" /></a>
			<a href="#"><img src="img/tw-icon.png" /></a>				
		  </div>			
		</div>			
	  </div>
	  
	</div>
</div> 

<!-- Modal Share -->
<div class="modal fade" id="modShare" tabindex="-1" role="dialog" aria-labelledby="ModalShare" aria-hidden="true">
	<div class="vertical-alignment-helper">
		<div class="modal-dialog vertical-align-center">
			<div class="modal-content m-share-content">			
				<div class="modal-body m-share-body">
				<!--div class="social-share-icons">
					<a href="#"><img src="img/g-plus-icon.png" /></a>
					<a href="#"><img src="img/fb-icon.png" /></a>
					<a href="#"><img src="img/tw-icon.png" /></a>				
				</div-->
				<div class="row">
					<div class="col-md-4 text-center">
						<a href="#"><img src="img/g-plus-icon.png" class="img-responsive"/></a>
					</div>
					<div class="col-md-4 text-center">
					<a href="#"><img src="img/fb-icon.png" class="img-responsive"/></a>
					</div>
					<div class="col-md-4 text-center">
					<a href="#"><img src="img/tw-icon.png" class="img-responsive"/></a>	
					</div>	
					<div class="m-share-back"  data-dismiss="modal">
						Back
					</div>
				</div>
			  </div>
			</div>
		</div>
	</div>
</div> 