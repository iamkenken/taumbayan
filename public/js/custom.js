$(".m-login").click(function(){
	$("#modLogin").modal();		
});
		
$(".m-signup").click(function(){
	$("#modSignup").modal();
});		

$(".m-share").click(function(){
	$("#modShare").modal();
});				

/*$("#modLogin").on('shown.bs.modal', function(){
	$(this).find('#login_email').focus();
});		

$("#modSignup").on('shown.bs.modal', function(){
	$(this).find('#fname').focus();
});	*/
	
$(document).ready(function() {
	$('.drawer').drawer();				
	            
	$('#birthday').datepicker({
		format: "yyyy-mm-dd",
		changeMonth: true,
      	changeYear: true
	});  

	$('#bod').datepicker({
		format: "yyyy-mm-dd",
		changeMonth: true,
      	changeYear: true
	}); 

	if($(window).width() > 990 ){
	$('.prev_page').clone().prependTo('body').addClass('prev_big').html('&lsaquo;');
	$('.next_page').clone().prependTo('body').addClass('next_big').html('&rsaquo;');
	};

	if (window.location.hash && window.location.hash == '#_=_') {
	    window.location.hash = '';
	}

/*Ajax Login & Signup*/

	var baseUrl = "http://localhost:8000"
	var formLogin = $('#loginForm');

    formLogin.validator().on('submit',function(e){
    	if (e.isDefaultPrevented()) {
    	// handle the invalid form...
		} else {
			$('.login-error div').remove();
			 e.preventDefault();
	        $('#loginbtn').append(' <i class="signinspin fa fa-circle-o-notch fa-spin"></i> ');
	        var email = $("#login_email").val();
	        var pw =  $("#login_pw").val();
	        $.ajaxSetup({
			   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
			});
	        $.ajax({
	            type: "POST",
	            url : baseUrl + "/auth/login",
	            data : {"email": email, "pass": pw},
	            success : function(data){
	                if(data['status'] == "success"){
	                	window.location.href = baseUrl + '/dashboard';
	                }else{
	                	$('.login-error').append('<div class="alert alert-danger signup-error">Email and/or password invalid</div>').hide().fadeIn();
	                	$('.signinspin').remove();
	                }
	            }
	        },"json");

		}	
       
	});


	var signupForm = $('#signupForm');

	signupForm.validator().on('submit', function(e){
		//$('#signupButton').prop('disabled', 'disabled');
		if (e.isDefaultPrevented()) {
    		// handle the invalid form...
		} else {
			$('.signup-error div').remove();
			$('#signupButton').append(' <i class="signupspin fa fa-circle-o-notch fa-spin"></i> ');
			e.preventDefault();
			var data = $(this).serialize();
			$.ajaxSetup({
			   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
			});

			$.ajax({
				type: "POST",
				data: data,
				url: baseUrl+"/auth/register",
				success: function(e){
					if(e['status'] == 'success'){
						window.location.href = baseUrl + '/dashboard';
					}else if(e['status'] == 'failed'){
						window.location.href = baseUrl + '/login';
					}else{
						/*if(e.length != 0){
						var errorMsg = '<div class="alert alert-danger">';
						$.each(e, function(i, msg){
							errorMsg += e[i]+'<br />';
						});
						errorMsg += '</div>';*/
						if(e['email'] != undefined){
							$('.signup-error').append('<div class="alert alert-danger">'+e['email']+'</div>').hide().fadeIn();
						}else if(e['g-recaptcha-response'] != undefined){
							$('.signup-error').append('<div class="alert alert-danger">Please confirm that you are not a robot.</div>').hide().fadeIn();
						}else{
							$('.signup-error').append('<div class="alert alert-danger">Something went wrong. Please reload the page</div>').hide().fadeIn();
						}
						$('.signupspin').remove();
					}
				}
			});
		}
	})

});
