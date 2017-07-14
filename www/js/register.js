$(document).ready(function(){
    // disable_group_btn('#group_email');

    // '코드발송' 버튼을 눌렀을 경우
    $('#group_email > .wr_form_btn').click(function(){
        sendmail();
    });

    // '확인' 버튼을 눌렀을 경우
    $('#group_code > .wr_form_btn').click(function(){
        checkcode();
    });

});

function disable_group_btn(element){
    $(element+' > input').prop('disabled', true);
    $(element).addClass('green');
};

function sendmail(){
    var mail = $('#group_email > .wr_form_input').val();

    //ready post message
    var pst_msg = "email="+mail;

    //ajax POST
    $.ajax({
        type: "POST",
        url: "/pst/register/mail_send.php",
        data: pst_msg,
        success: function(return_msg){
            alert(return_msg);
        },
        error:function(request,status,error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            // alert("실패하였습니다");
        },
    })
}

function checkcode(){
    var code = $('#group_code > .wr_form_input').val();

    //ready post message
    var pst_msg = "code="+code;

    //ajax POST
    $.ajax({
        type: "POST",
        url: "/pst/register/code_check.php",
        data: pst_msg,
        success: function(return_msg){
            alert(return_msg);
        },
        error:function(request,status,error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            // alert("실패하였습니다");
        },
    })
}
