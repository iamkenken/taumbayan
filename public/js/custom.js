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
if (window.location.hash && window.location.hash == '#_=_') {
    window.location.hash = '';
}
});




