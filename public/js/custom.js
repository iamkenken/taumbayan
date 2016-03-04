		

/*$("#modLogin").on('shown.bs.modal', function(){
	$(this).find('#login_email').focus();
});		

$("#modSignup").on('shown.bs.modal', function(){
	$(this).find('#fname').focus();
});	*/
	
$(document).ready(function() {
	$(".m-login").click(function(){
	$("#modLogin").modal();		
	});
			
	$(".m-signup").click(function(){
		$("#modSignup").modal();
	});		

	$(".m-share").click(function(){
		$("#modShare").modal();
	});		

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
	 noneSelectedText: 'Select Number of Choices'
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

	var rankNum = $('#ranknumber');
	rankNum.selectpicker({
	 noneSelectedText: 'Select Number of Ranks'
	});


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
		}else if(ranknumber == ''){
			$('.rank-error').append('<div class="alert alert-danger">Please add ranking number</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(number == ''){
			$('.rank-error').append('<div class="alert alert-danger">Please add choices</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else if(rankchoices.length < 2){
			$('.rank-error').append('<div class="alert alert-danger">Please add more than 1 choices</div>').hide().fadeIn();
			$('.signupspin').remove();
		}else{
			/*$.ajax({
				url: baseUrl+'/poll/add/ranking',
				data: {"type": type, "cats": cats, "title": title, "question": question, "number": number, "choices": choices},
				type: "POST",
				dataType: "JSON",
				success: function(e){
					if(e['status'] == 'success'){
					$('.rank-error').append('<div class="alert alert-success">Congratulations!You&#39ve successfully submitted a poll question. A notification will be sent to your email once  your poll is published</div>').hide().fadeIn();
					$('.signupspin').remove();
					$('form#rank_form').find("input[type=text], textarea").val("");
					$('#rank_cat').val('').selectpicker('refresh');
					$('#rankchoice').val('').selectpicker('refresh');
					$('#ranknumber').val('').selectpicker('refresh');
					}else if(e['status'] == 'not verified'){
					$('.rank-error').append('<div class="alert alert-danger">Please verified your email address</div>').hide().fadeIn();
					$('.signupspin').remove();
					}else{
					$('.rank-error').append('<div class="alert alert-danger">Something went wrong. Please try again</div>').hide().fadeIn();
					$('.signupspin').remove();
					}
				}
			})*/
		}
	});

});



/*Val's scripts*/

$(document).ready(function() {	
	'use strict';
	
	$('#fullpage').fullpage({
		anchors: ['poll'],
		css3: true
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

	$('.grid').masonry({
	  itemSelector: '.grid-item',
	  columnWidth: '.grid-sizer',
	  percentPosition: true,
	  gutter: 5
	});

	$("#file-3").fileinput({
			showUpload: false,
			showCaption: false,
			browseClass: "btn btn-primary btn-lg",
			fileType: "any",
	        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
		});
		$("#file-4").fileinput({
			uploadExtraData: {kvId: '10'}
	});

	 $(".btn-warning").on('click', function() {
	    if ($('#file-4').attr('disabled')) {
	        $('#file-4').fileinput('enable');
	    } else {
	        $('#file-4').fileinput('disable');
	    }
	});    

	$(".btn-info").on('click', function() {
	    $('#file-4').fileinput('refresh', {previewClass:'bg-info'});
	});

	$(".thumbs, .submit-choice-btn, ul.h-mood li, .h-upick .thumbnail a img").click(function () {
        $(".poll-answer").hide("slow");
		$(".fb-comments-cnt").hide("slow"); 
		$(".view-poll-result").hide("slow");
		$(".poll-result").show("slow");
		$(".close-poll-result").show("slow");
    });

	$('.rating-answer, .rating-world').rating('refresh', {disabled: true,  showCaption: false});
	$('.rating').on('change', function () {     
        var x = $(this).val();       
        $('.rating-answer').rating('update', x);       
        $('.rating-world').rating('update', x);
        $(".poll-answer").hide("slow");
		$(".fb-comments-cnt").hide("slow"); 
		$(".view-poll-result").hide("slow");
		$(".poll-result").show("slow");
		$(".close-poll-result").show("slow");
    });
		
	$(".view_comments").click(function() {
		$(".fb-comments-cnt").toggle("slow"); 
		$(".view_comments").hide("slow");    
		$(".poll-answer").hide("slow");  
		$(".poll-result").hide("slow");  		
		$(".hide_comments").show("slow");  
		$(".view-poll-result").show("slow"); 		
		$(".close-poll-result").hide("slow");
    });

	$(".hide_comments").click(function() {	  
		$(".view_comments").show("slow");     
		$(".fb-comments-cnt").hide("slow"); 
		$(".poll-answer").show("slow");
		$(".hide_comments").hide("slow"); 	
    });

	$(".view-poll-result").click(function() {	
		$(".poll-answer").hide("slow");
		$(".fb-comments-cnt").hide("slow"); 
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
	        $(this).css("background-color", "#F9F6F6");
	    } 
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
		$(".fb-comments-cnt").hide("slow"); 
		$(".view-poll-result").hide("slow");
		$(".poll-result").show("slow");
		$(".close-poll-result").show("slow");
    });

});

//Facebook Comments
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=523169924525740";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

