$(".m-login").click(function(){
	$("#modLogin").modal();		
});
		
$(".m-signup").click(function(){
	$("#modSignup").modal();
});		

$(".m-share").click(function(){
	$("#modShare").modal();
});				

$("#modLogin").on('shown.bs.modal', function(){
	$(this).find('#login_email').focus();
});		

$("#modSignup").on('shown.bs.modal', function(){
	$(this).find('#fname').focus();
});	
	
$(document).ready(function() {
	$('.drawer').drawer();				
});  	

$(document).ready(function () {                
	$('#birthday').datepicker({
		format: "yyyy-mm-dd",
		changeMonth: true,
      	changeYear: true
	});  
});

$(document).ready(function(){
	if($(window).width() > 990 ){
	$('.prev_page').clone().prependTo('body').addClass('prev_big').html('&lsaquo;');
	$('.next_page').clone().prependTo('body').addClass('next_big').html('&rsaquo;');
	};
});


$(document).ready(function(){
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
});




