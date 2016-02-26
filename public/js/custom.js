		

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
	})

});


/*Val's scripts*/

$(document).ready(function() {	
	$('#fullpage').fullpage({
		anchors: ['poll'],
		//sectionsColor: ['#C63D0F', '#1BBC9B', '#7E8F7C'],
		css3: true
	});
   
	/*$('.drawer').drawer();	

	$('#birthday').datepicker({
		format: "dd/mm/yyyy",
		orientation: "auto",
	});  */	

	if($(window).width() > 990 ){
	$('.prev_page').clone().prependTo('body').addClass('prev_big').html('&lsaquo;');
	$('.next_page').clone().prependTo('body').addClass('next_big').html('&rsaquo;');
	};

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

	$(".thumbs").click(function () {
        var addressValue = $(this).attr("value");
        alert(addressValue );
    });

    $("ul#h-mood li").click(function () {
        alert($(this).val());        
    });

	$('.kv-gly-star').rating({
        containerClass: 'is-star'
    });

	$('.rating,.kv-gly-star,.kv-gly-heart,.kv-uni-star,.kv-uni-rook,.kv-fa,.kv-fa-heart,.kv-svg,.kv-svg-heart').on(
        'change', function () {
        alert('Rating selected: ' + $(this).val());
    });
	
});  	

$(function () {
	$('#dg-container').carrousel({
		current: 0,
		autoplay: false,
		interval: 5000		
	});	
});

$(function () {
	$('.grid').masonry({
	  itemSelector: '.grid-item',
	  columnWidth: '.grid-sizer',
	  percentPosition: true,
	  gutter: 5
	});
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


$(document).ready(function() {	
	Sortable.create(h_ranking, {group: 'shared'});
	var iframe = document.createElement('iframe');

	iframe.width = '100%';
	iframe.onload = function () {
		var doc = iframe.contentDocument,
				list = doc.getElementById('listWithHandle');

		Sortable.create(list, {group: 'shared'});
	};
});