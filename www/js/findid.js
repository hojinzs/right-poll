$(document).ready(function(){

    $('#findid').submit(function(){

		var email = $('#findid > #email').val();

	    //ready post message
	    var pst_msg = "email="+email;

	    //ajax POST
	    $.ajax({
	        type: "POST",
	        url: "/pst/user/findid.php",
	        data: pst_msg,
	        beforeSend:function(){
	            $('#findid > #submit').prop('disabled', true);
	            $('#findid > #submit').prop('value', "발송중..");
	        },
	        complete: function(){
	            $('#findid > #submit').prop('disabled', false);
	            $('#findid > #submit').prop('value', "코드발송");
	        },
	        success: function(return_msg){
	            if (return_msg == "success") {
	            	alert("success!!");
	            	location.href = '/login';
	            } else {
	            	alert(return_msg);
	            }
	        },
	        error:function(request,status,error){
	        	alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
	        	// alert("실패하였습니다");
	        }
        })

        return false;
    })

})
