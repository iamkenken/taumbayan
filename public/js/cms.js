var baseUrl = "http://localhost:8000";
$(document).ready(function() {
	'use strict';

	$('#tbl-allUsers-admin, #tbl-allPolls-admin').DataTable({	 
	 	
	});

	$('#dob, #inputbirthday').datepicker({
		format: "yyyy-mm-dd",		
		changeDecade:true,
		changeMonth: true,
      	changeYear: true            
	});

	$('.dp').on('change', function(){
        $('.datepicker').hide();
    });

	/* User - Profile */
    $("#inputfname").prop('disabled', true);
    $("#inputmname").prop('disabled', true);
    $("#inputlname").prop('disabled', true);
    $("#inputsex").prop('disabled', true);
    $("#inputbirthday").prop('disabled', true);
    $("#inputuserrole").prop('disabled', true);
    $("#save-frm-profile").prop('disabled', true);
    
    $("#inputuname").prop('disabled', true);
    $("#inputsex").prop('disabled', true);

	$("#edit-frm-profile").click(function() {
		$("#edit-frm-profile").prop('disabled', true);
	    $("#inputfname").prop('disabled', false);
	    $("#inputmname").prop('disabled', false);
	    $("#inputlname").prop('disabled', false);
	    $("#inputsex").prop('disabled', false);
	    $("#inputbirthday").prop('disabled', false);
	    $("#inputuserrole").prop('disabled', false);
	    $("#save-frm-profile").prop('disabled', false);
	    return false;
    });

	$("#save-frm-profile").click(function(){
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
				$("#inputuserrole").prop('disabled', true);			    
			    $("#saveprofile").prop('disabled', true);
			    $("#cr-new-pw").show();
			    $(".pw-grp").hide(0);
			    $("#edit-frm-profile").prop('disabled', false);
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


/**Poll Submission**/
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
    $('img.mood').css('opacity', 0.4);
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
/**END - Poll Submission**/

/**User Action**/
$('.usrdelete').click(function(){
    var id = $(this).data('id');
    if(confirm('Do you really want to delete this user?')){
    if(id != ''){
        $.ajax({
            url: baseUrl+'/admin/user/delete',
            data: {'id': id},
            type: 'POST',
            dataType: 'JSON',
            success: function(e){
                if(e['status'] == 'ok'){
                    alert('Successfully Deleted.');
                    location.reload();
                }else{
                    alert('Something went wrong. Please refresh the page or try again.');
                }
            }
        });
    }
    }
    return false;
});

/**display user role field value on page load or refresh**/
userRoleVal();
function userRoleVal(){
var userRole = $('#user_role').val();
if(userRole == 'taumbayan'){
$('#username').css('display', 'none');
}
if(userRole == 'admin'){
$('#username').css('display', 'block');
}
}
/**display user role field value on dropdown value change**/
$('#user_role').change(function(){
    userRoleVal();
});
/**End - User Action**/

});
