		

/*$("#modLogin").on('shown.bs.modal', function(){
	$(this).find('#login_email').focus();
});		

$("#modSignup").on('shown.bs.modal', function(){
	$(this).find('#fname').focus();
});	*/
	
$(document).ready(function() {
	$(".m-login").click(function(){
		$("#modLogin").modal('toggle');
	});
			
	$(".m-signup").click(function(){
		$("#modSignup").modal('toggle');
	});		

	$(".m-share").click(function(){
		$("#modShare").modal('toggle');
	});		

	$('.drawer').drawer();				
	            
	$('#birthday, #bod, #inputbirthday').datepicker({
		format: "yyyy-mm-dd",		
		changeDecade:true,
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
	                	location.reload();
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
						window.location.href = baseUrl + '/';
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
	});

	/*TABS*/
 	$("#myTab li:eq(0) a").tab('show');

 	var selCat = $('.selectpicker');
 	selCat.selectpicker({
	 noneSelectedText: 'Select Category'
	});
 	/*Multiple Choice*/
 	var numChoice = $('#numchoice');
	numChoice.selectpicker({
	 noneSelectedText: 'Select Number of Choices'
	});

	numChoice.on('changed.bs.select', function(e){
	$('.choices').html('');
	var num = numChoice.val();
	if(num != 0){
	var choices = '';
	for(var x = 1; x <= num; x++){
		choices += '<div class="form-group"><input type="text" class="form-control choicevalue" placeholder="Type choice here" name="choices[]" value="" ></div>';
	}
	$('.choices').append(choices).hide().fadeIn();
	}
	});

	numChoice.on('refreshed.bs.select', function (e) {
	  $('.choices').html('');
	});

	$('#submitmc').click(function(){
		var type = $('#mc_type').val();
		var cats = $('#mchoicecat').val();
		var title = $('#mc_title').val();
		var question = $('#mc_question').val();
		var number = $('#numchoice').val();
		var choices = $("input[name='choices[]']")
		.map(function(){
			if($(this).val() != ''){
			return $(this).val();
			}
		}).get();
		$('#submitmc').append(' <i class="signupspin fa fa-circle-o-notch fa-spin"></i> ');
		$('.mc-error .alert').remove();
		if (cats == null){		
			$('.mc-error').append('<div class="alert alert-danger">Please select category</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(title == ''){
			$('.mc-error').append('<div class="alert alert-danger">Please add a title</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(question == ''){
			$('.mc-error').append('<div class="alert alert-danger">Please add a question</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(number == ''){
			$('.mc-error').append('<div class="alert alert-danger">Please add choices</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(choices.length < 2){
			$('.mc-error').append('<div class="alert alert-danger">Please add more than 1 choices</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else{
			$.ajax({
				url: baseUrl+'/poll/add/mc',
				data: {"type": type, "cats": cats, "title": title, "question": question, "number": number, "choices": choices},
				type: "POST",
				dataType: "JSON",
				success: function(e){
					if(e['status'] == 'success'){
					$('.mc-error').append('<div class="alert alert-success">Congratulations!You&#39ve successfully submitted a poll question. A notification will be sent to your email once  your poll is published</div>').hide().fadeIn();
					$('.signupspin').remove();
					$('form#mc_form').find("input[type=text], textarea").val("");
					$('#mchoicecat').val('').selectpicker('refresh');
					$('#numchoice').val('').selectpicker('refresh');
					}else if(e['status'] == 'not verified'){
					$('.mc-error').append('<div class="alert alert-danger">Please verified your email address</div>').hide().fadeIn();
					$('.signupspin').remove();
					}else{
					$('.mc-error').append('<div class="alert alert-danger">Something went wrong. Please try again</div>').hide().fadeIn();
					$('.signupspin').remove();
					}
				}
			})
		}
	});

	/*Thumbs*/
	$('#submitth').click(function(){
		var type = $('#th_type').val();
		var cats = $('#th_cat').val();
		var title = $('#th_title').val();
		var question = $('#th_question').val();

		$('#submitth').append(' <i class="signupspin fa fa-circle-o-notch fa-spin"></i> ');
		$('.th-error .alert').remove();
		if (cats == null){		
			$('.th-error').append('<div class="alert alert-danger">Please select category</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(title == ''){
			$('.th-error').append('<div class="alert alert-danger">Please add a title</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(question == ''){
			$('.th-error').append('<div class="alert alert-danger">Please add a question</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else{
			$.ajax({
				url: baseUrl+'/poll/add/thumbs',
				data: {"type": type, "cats": cats, "title": title, "question": question},
				type: "POST",
				dataType: "JSON",
				success: function(e){
					if(e['status'] == 'success'){
					$('.th-error').append('<div class="alert alert-success">Congratulations!You&#39ve successfully submitted a poll question. A notification will be sent to your email once  your poll is published</div>').hide().fadeIn();
					$('.signupspin').remove();
					$('form#th_form').find("input[type=text], textarea").val("");
					$('#th_cat').val('').selectpicker('refresh');
					}else if(e['status'] == 'not verified'){
					$('.th-error').append('<div class="alert alert-danger">Please verified your email address</div>').hide().fadeIn();
					$('.signupspin').remove();
					}else{
					$('.th-error').append('<div class="alert alert-danger">Something went wrong. Please try again</div>').hide().fadeIn();
					$('.signupspin').remove();
					}
				}
			})
		}
	});

	/*Mood Meter*/
	/*store mood in array*/
	var mood = [];
	$('img.mood').click(function(){
		var dataMood = $(this).data('mood');
		var i = mood.indexOf(dataMood);
		if(i != -1) {
		$(this).css('opacity', 0.4);
		mood.splice(i, 1);
		}else{
		$(this).css('opacity', 1);
		mood.push(dataMood);
		}
		console.log(mood);
	});
	
	$('#submitmood').click(function(){
		var type = $('#mm_type').val();
		var cats = $('#mm_cat').val();
		var title = $('#mm_title').val();
		var question = $('#mm_question').val();
		var moods = mood;

		$('#submitth').append(' <i class="signupspin fa fa-circle-o-notch fa-spin"></i> ');
		$('.mm-error .alert').remove();
		if (cats == null){		
			$('.mm-error').append('<div class="alert alert-danger">Please select category</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(title == ''){
			$('.mm-error').append('<div class="alert alert-danger">Please add a title</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(question == ''){
			$('.mm-error').append('<div class="alert alert-danger">Please add a question</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(moods.length < 2){
			$('.mm-error').append('<div class="alert alert-danger">Please select atleast 2 moods</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else{
			$.ajax({
				url: baseUrl+'/poll/add/mood',
				data: {"type": type, "cats": cats, "title": title, "question": question, "moods": moods},
				type: "POST",
				dataType: "JSON",
				success: function(e){
					if(e['status'] == 'success'){
					$('.mm-error').append('<div class="alert alert-success">Congratulations!You&#39ve successfully submitted a poll question. A notification will be sent to your email once  your poll is published</div>').hide().fadeIn();
					$('.signupspin').remove();
					$('form#moodform').find("input[type=text], textarea").val("");
					$('#mm_cat').val('').selectpicker('refresh');
					$('img.mood').css('opacity', 0.4);
					mood = [];
					}else if(e['status'] == 'not verified'){
					$('.mm-error').append('<div class="alert alert-danger">Please verified your email address</div>').hide().fadeIn();
					$('.signupspin').remove();
					}else{
					$('.mm-error').append('<div class="alert alert-danger">Something went wrong. Please try again</div>').hide().fadeIn();
					$('.signupspin').remove();
					}
				}
			})
		}
	});

	/*Ranking*/
	var rankChoice = $('#rankchoice');
	rankChoice.selectpicker({
	 noneSelectedText: 'Select Number of Ranks'
	});

	rankChoice.on('changed.bs.select', function(e){
	$('.rank_choices').html('');
	var num = rankChoice.val();
	if(num != 0){
	var choices = '';
	for(var x = 1; x <= num; x++){
		choices += '<div class="form-group"><input type="text" class="form-control choicevalue" placeholder="Type choice here" name="rankchoices[]" value="" ></div>';
	}
	$('.rank_choices').append(choices).hide().fadeIn();
	}
	});

	rankChoice.on('refreshed.bs.select', function (e) {
	  $('.rank_choices').html('');
	});

	/*var rankNum = $('#ranknumber');
	rankNum.selectpicker({
	 noneSelectedText: 'Select Number of Ranks'
	});*/


	$('#submitrank').click(function(){
		var type = $('#rank_type').val();
		var cats = $('#rank_cat').val();
		var title = $('#rank_title').val();
		var question = $('#rank_question').val();
		var ranknumber = $('#ranknumber').val();
		var number = $('#rankchoice').val();
		var rankchoices = $("input[name='rankchoices[]']")
		.map(function(){
			if($(this).val() != ''){
			return $(this).val();
			}
		}).get();
		$('#submitrank').append(' <i class="signupspin fa fa-circle-o-notch fa-spin"></i> ');
		$('.rank-error .alert').remove();
		if (cats == null){		
			$('.rank-error').append('<div class="alert alert-danger">Please select category</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(title == ''){
			$('.rank-error').append('<div class="alert alert-danger">Please add a title</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(question == ''){
			$('.rank-error').append('<div class="alert alert-danger">Please add a question</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(number == ''){
			$('.rank-error').append('<div class="alert alert-danger">Please add items to rank</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(rankchoices.length < 2){
			$('.rank-error').append('<div class="alert alert-danger">Please add more than 1 choices</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else{
			$.ajax({
				url: baseUrl+'/poll/add/ranking',
				data: {"type": type, "cats": cats, "title": title, "question": question, "number": number, "choices": rankchoices},
				type: "POST",
				dataType: "JSON",
				success: function(e){
					if(e['status'] == 'success'){
					$('.rank-error').append('<div class="alert alert-success">Congratulations!You&#39ve successfully submitted a poll question. A notification will be sent to your email once  your poll is published</div>').hide().fadeIn();
					$('.signupspin').remove();
					$('form#rank_form').find("input[type=text], textarea").val("");
					$('#rank_cat').val('').selectpicker('refresh');
					$('#rankchoice').val('').selectpicker('refresh');
					}else if(e['status'] == 'not verified'){
					$('.rank-error').append('<div class="alert alert-danger">Please verified your email address</div>').hide().fadeIn();
					$('.signupspin').remove();
					}else{
					$('.rank-error').append('<div class="alert alert-danger">Something went wrong. Please try again</div>').hide().fadeIn();
					$('.signupspin').remove();
					}
				}
			})
		}
	});

	/*Rating*/
	var ratingChoice = $('#ratingchoice');
	ratingChoice.selectpicker({
	 noneSelectedText: 'Select Number of Items'
	});

	ratingChoice.on('changed.bs.select', function(e){
	$('.rating_choices').html('');
	var num = ratingChoice.val();
	if(num != 0){
	var choices = '';
	for(var x = 1; x <= num; x++){
		choices += '<div class="form-group"><input type="text" class="form-control choicevalue" placeholder="Type Rating Name here" name="ratingchoices[]" value="" ></div>';
	}
	$('.rating_choices').append(choices).hide().fadeIn();
	}
	});

	ratingChoice.on('refreshed.bs.select', function (e) {
	  $('.rating_choices').html('');
	});

	var ratingNum = $('#ratingnumber');
	ratingNum.selectpicker({
	 noneSelectedText: 'Select Number of Rating'
	});


	$('#submitrating').click(function(){
		var type = $('#rating_type').val();
		var cats = $('#rating_cat').val();
		var title = $('#rating_title').val();
		var question = $('#rating_question').val();
		var ratingnumber = $('#ratingnumber').val();
		var number = $('#ratingchoice').val();
		var ratingchoices = $("input[name='ratingchoices[]']")
		.map(function(){
			if($(this).val() != ''){
			return $(this).val();
			}
		}).get();
		$('#submitrating').append(' <i class="signupspin fa fa-circle-o-notch fa-spin"></i> ');
		$('.rating-error .alert').remove();
		if (cats == null){		
			$('.rating-error').append('<div class="alert alert-danger">Please select category</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(title == ''){
			$('.rating-error').append('<div class="alert alert-danger">Please add a title</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(question == ''){
			$('.rating-error').append('<div class="alert alert-danger">Please add a question</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(ratingnumber == ''){
			$('.rating-error').append('<div class="alert alert-danger">Please add number of rating</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(number == ''){
			$('.rating-error').append('<div class="alert alert-danger">Please add number of items to rate</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(ratingchoices.length < 2){
			$('.rating-error').append('<div class="alert alert-danger">Please add more than 1 choices</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else{
			$.ajax({
				url: baseUrl+'/poll/add/rating',
				data: {"type": type, "cats": cats, "title": title, "question": question, "ratingnumber": ratingnumber, "choices": ratingchoices},
				type: "POST",
				dataType: "JSON",
				success: function(e){
					if(e['status'] == 'success'){
					$('.rating-error').append('<div class="alert alert-success">Congratulations!You&#39ve successfully submitted a poll question. A notification will be sent to your email once  your poll is published</div>').hide().fadeIn();
					$('.signupspin').remove();
					$('form#rating_form').find("input[type=text], textarea").val("");
					$('#rating_cat').val('').selectpicker('refresh');
					$('#ratingchoice').val('').selectpicker('refresh');
					}else if(e['status'] == 'not verified'){
					$('.rating-error').append('<div class="alert alert-danger">Please verified your email address</div>').hide().fadeIn();
					$('.signupspin').remove();
					}else{
					$('.rating-error').append('<div class="alert alert-danger">Something went wrong. Please try again</div>').hide().fadeIn();
					$('.signupspin').remove();
					}
				}
			})
		}
	});

	/*Upick Choice*/
 	var upickChoice = $('#upick_numchoice');
	upickChoice.selectpicker({
	 noneSelectedText: 'Select Number of Choices'
	});

	upickChoice.on('changed.bs.select', function(e){
	$('.upick_choices').html('');
	var num = upickChoice.val();
	if(num != 0){
	var choices = '';
	for(var x = 1; x <= num; x++){
		choices += '<div class="form-group"><input type="text" class="form-control choicevalue" placeholder="Type name here" name="choices[]" value="" ></div>';
	}
	$('.upick_choices').append(choices).hide().fadeIn();
	}
	});

	upickChoice.on('refreshed.bs.select', function (e) {
	  $('.upick_choices').html('');
	});

	$('#submitupick').click(function(){
		var type = $('#upick_type').val();
		var cats = $('#upick_cat').val();
		var title = $('#upick_title').val();
		var question = $('#upick_question').val();
		var number = $('#upick_numchoice').val();
		var choices = $("input[name='choices[]']")
		.map(function(){
			if($(this).val() != ''){
			return $(this).val();
			}
		}).get();
		$('#submitupick').append(' <i class="signupspin fa fa-circle-o-notch fa-spin"></i> ');
		$('.upick-error .alert').remove();
		if (cats == null){		
			$('.upick-error').append('<div class="alert alert-danger">Please select category</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(title == ''){
			$('.upick-error').append('<div class="alert alert-danger">Please add a title</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(question == ''){
			$('.upick-error').append('<div class="alert alert-danger">Please add a question</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(number == ''){
			$('.upick-error').append('<div class="alert alert-danger">Please add choices</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(choices.length < 2){
			$('.upick-error').append('<div class="alert alert-danger">Please add more than 1 choices</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else{
			$.ajax({
				url: baseUrl+'/poll/add/upick',
				data: {"type": type, "cats": cats, "title": title, "question": question, "number": number, "choices": choices},
				type: "POST",
				dataType: "JSON",
				success: function(e){
					if(e['status'] == 'success'){
					$('.upick-error').append('<div class="alert alert-success">Congratulations!You&#39ve successfully submitted a poll question. A notification will be sent to your email once  your poll is published</div>').hide().fadeIn();
					$('.signupspin').remove();
					$('form#upick_form').find("input[type=text], textarea").val("");
					$('#upick_cat').val('').selectpicker('refresh');
					$('#upick_numchoice').val('').selectpicker('refresh');
					}else if(e['status'] == 'not verified'){
					$('.upick-error').append('<div class="alert alert-danger">Please verified your email address</div>').hide().fadeIn();
					$('.signupspin').remove();
					}else{
					$('.upick-error').append('<div class="alert alert-danger">Something went wrong. Please try again</div>').hide().fadeIn();
					$('.signupspin').remove();
					}
				}
			})
		}

	});

	/**Answer Upick**/
	$('.upickimg, ul.h-mood li a').click(function(){
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
				url: baseUrl+'/poll/vote/upick',
				data: {'pollid': pollid, 'choiceid': choiceid },
				dataType: 'JSON',
				type: 'POST',
				success: function(e){
					if(e['status'] == 'success'){
					msg.html("<div class='alert alert-success alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Thank you for participating the poll.</div>");
					}else if(e['status'] == 'exist'){
					msg.html("<div class='alert alert-warning alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>You have already voted.</div>");
					}else{
					msg.html("<div class='alert alert-danger alert-dismissible fade in'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Failed. Please try again.</div>");
					}
				}
			});
		});
		$('.nobtn').click(function(){ msg.html(""); });
		}
	});

		


	$(document).on ('click', '.verify', function(){
		var id = $(this).data('id');
		var status = $(this).html();
		if(status == 'Verify'){
			$(this).append(' <i class="verifyspin fa fa-circle-o-notch fa-spin"></i> ');
			var url = baseUrl+'/verify-vote';
			$.ajax({
				context: this,
				url: url,
				data: {'id': id},
				dataType: 'JSON',
				success: function(e){
					if(e['status'] == 'success'){
					$(this).html('UnVerify');
					$('.verifyspin').remove();
					}else{
					$('.verifyspin').remove();
					alert('Something went wrong. Try again');
					}
				}
			});
		}else{
			var url = baseUrl+'/unverify-vote';
			$(this).append(' <i class="verifyspin fa fa-circle-o-notch fa-spin"></i> ');
			$.ajax({
				context: this,
				url: url,
				data: {'id': id},
				dataType: 'JSON',
				success: function(e){
					if(e['status'] == 'success'){
					$(this).html('Verify');
					$('.verifyspin').remove();
					}else{
					$('.verifyspin').remove();
					alert('Something went wrong. Try again');
					}
				}
			});
		}	
	});

});

function checkUser(baseUrl){
	var status = "false";
	$.ajax({
		url: baseUrl+'/auth/check',
		async: false,
		success: function(e){
			if(e['status'] == 'notallowed'){
			status = "notallowed";
			}

			if(e['status'] == 'allowed'){
			status = "allowed";
			}

			if(e['status'] == 'notverified'){
			status = "notverified";
			}
		}
	})
	return status;
}



/*Val's scripts*/
$(document).ready(function() {	
	'use strict';
	
	$('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');	

	var amountScrolled = 300;

	$(window).scroll(function() {
		if ( $(window).scrollTop() > amountScrolled ) {
			$('a.back-to-top').fadeIn('slow');
		} else {
			$('a.back-to-top').fadeOut('slow');
		}
	});
   
	$('a.back-to-top').click(function() {
		$('html, body').animate({
			scrollTop: 0
		}, 700);
		return false;
	});



	$( "#regForm" ).submit(function( event ) {    
	event.preventDefault();
	var $form = $( this ),
	data = $form.serialize(),
	url = $form.attr( "action" );
	var posting = $.post( url, { formData: data } );
	posting.done(function( data ) {
	if(data.fail) {
	  $.each(data.errors, function( index, value ) {
	    var errorDiv = '#'+index+'_error';
	    $(errorDiv).addClass('required');
	    $(errorDiv).empty().append(value);
	  });
	  $('#successMessage').empty();          
	} 

	if(data.success) {
	    $('.register').fadeOut(); //hiding Reg form
	    var successContent = '<div class="message"><h3>Registration Completed Successfully</h3><h4>Please Login With the Following Details</h4><div class="userDetails"><p><span>Email:</span>'+data.email+'</p><p><span>Password:********</span></p></div></div>';
	  $('#successMessage').html(successContent);
	} //success
	}); //done
	});

	$('#dg-container').carrousel({
		current: 0,
		autoplay: false,
		interval: 5000		
	});	

	$('.wall').jaliswall({  
	  item : '.wall-item',
	  columnClass : '.wall-column'	  
	});

	$("#file-3").fileinput({
			showUpload: false,
			showCaption: false,
			browseClass: "btn btn-primary btn-lg",
			fileType: "any",
	        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
		});
		$("#prof-pic").fileinput({
			uploadExtraData: {kvId: '10'}
	});

	 $(".btn-warning").on('click', function() {
	    if ($('#prof-pic').attr('disabled')) {
	        $('#prof-pic').fileinput('enable');
	    } else {
	        $('#prof-pic').fileinput('disable');
	    }
	});    

	$(".btn-info").on('click', function() {
	    $('#prof-pic').fileinput('refresh', {previewClass:'bg-info'});
	});

	$(".thumbs, .submit-choice-btn").click(function () {
        $(".poll-answer").hide("slow");		
		$(".view-poll-result").hide("slow");
		$(".poll-result").show("slow");
		$(".close-poll-result").show("slow");
    });

	/*$('.rating-answer, .rating-world').rating('refresh', {disabled: true,  showCaption: false});
	$('.rating').on('change', function () {     
        var x = $(this).val();       
        $('.rating-answer').rating('update', x);       
        $('.rating-world').rating('update', x);
        $(".poll-answer").hide("slow");		
		$(".view-poll-result").hide("slow");
		$(".poll-result").show("slow");
		$(".close-poll-result").show("slow");
    });*/

	$('.rating-answer, .rating-world').rating('refresh', {disabled: true,  showCaption: false, stars:3});

	//$('.rating-set').rating({ stars: 3 });

	$('.rating-set').rating({ }).on('change', function () {     
        var x = $(this).val();       
        $('.rating-answer').rating('update', x);       
        $('.rating-world').rating('update', x);
        $(".poll-answer").hide("slow");		
		$(".view-poll-result").hide("slow");
		$(".poll-result").show("slow");
		$(".close-poll-result").show("slow");
    });
		
	$(".view_comments").click(function() {		
		$(".view_comments").hide("slow");    
		$(".poll-answer").hide("slow");  
		$(".poll-result").hide("slow");  		
		$(".hide_comments").show("slow");  
		$(".view-poll-result").show("slow"); 		
		$(".close-poll-result").hide("slow");
    });

	$(".hide_comments").click(function() {	  
		$(".view_comments").show("slow");     
		$(".poll-answer").show("slow");
		$(".hide_comments").hide("slow"); 	
    });

	$(".view-poll-result").click(function() {	
		$(".poll-answer").hide("slow");		
		$(".view-poll-result").hide("slow");
		$(".poll-result").show("slow");
		$(".close-poll-result").show("slow");
		$(".view_comments").show("slow");   
		$(".hide_comments").hide("slow"); 	
    });

    $(".close-poll-result").click(function() {			
		$(".poll-result").hide("slow");
		$(".close-poll-result").hide("slow");
		$(".poll-answer").show("slow");
		$(".view-poll-result").show("slow");
    });
	

    $("input, textarea, select").on({
	    mouseenter: function(){
	        $(this).css("background-color", "#F9F6F6");
	    }, 
	    mouseleave: function(){
	        $(this).css("background-color", "#FFF");
	    }, 
	    click: function(){
	        $(this).css("background-color", "#ff0000");
	    } 
	});

	$(".sel-cs").change(function() {
	 	$(".sel-cs").css("color", "#555");
	 	$(".sel-cs").css("font-style", "normal");
	});

	$('.dp').on('change', function(){
        $('.datepicker').hide();
    });


    /* Dashboard - Profile */
    $("#inputfname").prop('disabled', true);
    $("#inputmname").prop('disabled', true);
    $("#inputlname").prop('disabled', true);
    $("#inputsex").prop('disabled', true);
    $("#inputbirthday").prop('disabled', true);
    $("#saveprofile").prop('disabled', true);
    
    $("#inputuname").prop('disabled', true);
    $("#inputsex").prop('disabled', true);

	$("#edit-frm-profile").click(function() {
		$("#edit-frm-profile").prop('disabled', true);
	    $("#inputfname").prop('disabled', false);
	    $("#inputmname").prop('disabled', false);
	    $("#inputlname").prop('disabled', false);
	    $("#inputsex").prop('disabled', false);
	    $("#inputbirthday").prop('disabled', false);
	    $("#saveprofile").prop('disabled', false);
	    return false;
    });

    $("#a-tab-pro, #a-tab-acc, #a-tab-set").click(function(){
    	$("#inputfname").prop('disabled', true);
    	$("#inputmname").prop('disabled', true);
	    $("#inputlname").prop('disabled', true);
	    $("#inputsex").prop('disabled', true);
	    $("#inputbirthday").prop('disabled', true);
	    $("#edit-frm-profile").prop('disabled', false);
	    $("#saveprofile").prop('disabled', true);
	    $("#cr-new-pw").show();
	    $(".pw-grp").hide(0);
    });

    $("#saveprofile").click(function(){
    	if($("#inputfname").val()== "" ||  $("#inputlname").val() == ""){
    		alert('Fill up field/s with *');
    		return false;
    	}else{
    		if($('#inputfname').val().length <= 1 || $('#inputlname').val().length <= 1){
    			alert('Required fields must be atleast 2 characters');
				return false;
    		}else{
    			return true
	    		$("#inputfname").prop('disabled', true);
		    	$("#inputmname").prop('disabled', true);
			    $("#inputlname").prop('disabled', true);
			    $("#inputsex").prop('disabled', true);
			    $("#inputbirthday").prop('disabled', true);
			    $("#edit-frm-profile").prop('disabled', false);
			    $("#saveprofile").prop('disabled', true);
			    $("#cr-new-pw").show();
			    $(".pw-grp").hide(0);
    		}	
    	}
    });

    $(".pw-grp").hide();

    $("#cr-new-pw").click(function() {
    	$("#cr-new-pw").hide();
    	$(".pw-grp").show();
    });

    $("#saveacc").click(function() {
    	if($('#inputpw').val() == "" || $('#inputcpw').val() == ""){
    		alert('Fill up field/s');
    		return false;
    	}else{

    		if($('#inputpw').val().length <= 6){
    			alert('Password must be atleast 7 characters');
				return false;
    		}else{
    			if ($('#inputpw').val() == $('#inputcpw').val()) {
					alert('Password successfully updated');
					return true;
				}else{
					alert('Passwords do not match');
					return false;
				}
    		}
    	}
    	
    });


	// New Homepage
	$(".h-upick .thumbnail a img").click(function() {			
		
	});

	$(".view_comments-2").click(function() {		
		$(".view_comments-2").hide("slow");    
		$(".poll-answer").hide("slow");  
		$(".poll-result-upick").show("slow");  	
		$(".poll-result-upick").css("display","table");  	
		$(".hide_comments-2").show("slow");  
	});

	$(".hide_comments-2").click(function() {	  
		$(".view_comments-2").show("slow");    
		$(".poll-result-upick").hide("slow");  		
		$(".poll-answer").show("slow");
		$(".hide_comments-2").hide("slow"); 	
	});

	 $('#tbl-allUsers').DataTable({	 
	 	
	 });


	$('#fullpage').fullpage({
		anchors: ['poll']		
	});

});  	


//Ranking
$(document).ready(function() {	
	Sortable.create(h_ranking, {group: 'shared'});
	var iframe = document.createElement('iframe');

	iframe.width = '100%';
	iframe.onload = function () {
		var doc = iframe.contentDocument,
				list = doc.getElementById('listWithHandle');

		Sortable.create(list, {group: 'shared'});
	};

    $(".submit-rank-btn").click(function() {			
		$(".poll-answer").hide("slow");
		$(".view-poll-result").hide("slow");
		$(".poll-result").show("slow");
		$(".close-poll-result").show("slow");
    });

});

//Facebook
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=523169924525740";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

//Twitter
(function(d,s,id){
	var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}
}(document, 'script', 'twitter-wjs'));

