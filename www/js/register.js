$(document).ready(function(){
    // 암호화를 위한 공개키 받아옴.
    $.ajax({
            url:"/pst/csr.php",
            success:getPublickKey
        })

    // '코드발송' 버튼을 눌렀을 경우
    $('#group_email > .wr_form_btn').click(function(){
        sendmail();
    });

    // '확인' 버튼을 눌렀을 경우
    $('#group_code > .wr_form_btn').click(function(){
        checkcode();
    });

    // '중복확인' 버튼을 눌렀을 경우
    $('#group_nick > .wr_form_btn').click(function(){
        var nick = $('#group_nick > .wr_form_input').val();

        checknick(nick);
    });


    // form submit을 눌렀을 경우
    $('#form_register').submit(function(){
        //form의 내용을 불러옴.
        var nick = $('#group_nick > .wr_form_input').val();
        var pw_raw = $('#password').val();
        var pw_rpt = $('#password_repeat').val();

        //password와 password 일치 확인

        //password를 암호화한다
        var password = pwCrypt(pw_raw);

        //POST 메세지 준비
        var pst_msg = "nick="+nick+"&password="+password+"&password_repeat="+pw_rpt;

        //ajax 전송
        $.ajax({
            type: "POST",
            url: "./pst/register/submit.php",
            data: pst_msg,
            success: function(return_msg){
                alert(return_msg);
            },
            error:function(request,status,error){
                alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                // alert("실패하였습니다");
            },
        })

        return false;
    });

});

$(function(){
    $('#group_nick > .wr_form_input').change(function(){
        $('#group_nick > i').removeClass('green');
    });
})

// 페이지 오픈시 받아온 공개키를 $publickey에 저장
function getPublickKey(csr){
    $("#publickey").attr('value',csr);
};

function complete_group_btn(element){
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
        beforeSend:function(){
            $('#group_email > .wr_form_btn').prop('disabled', true);
            $('#group_email > .wr_form_btn').prop('value', "발송중..");
        },
        complete: function(){
            $('#group_email > .wr_form_btn').prop('disabled', false);
            $('#group_email > .wr_form_btn').prop('value', "코드발송");
        },
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
        success:function(return_msg){
            alert(return_msg);

            complete_group_btn('#group_email');
            complete_group_btn('#group_code');

        },
        error:function(request,status,error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            // alert("실패하였습니다");
        },
    })
}

function checknick(nick){

    //ready post message
    var pst_msg = "nick="+nick;

    //ajax POST
    $.ajax({
        type: "POST",
        url: "/pst/register/nick_check.php",
        data: pst_msg,
        success:function(return_msg){
            alert(return_msg);

            $('#group_nick > i').addClass('green');
        },
        error:function(request,status,error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            // alert("실패하였습니다");
        },
    })
}

// 패스워드 JS 암호화
function pwCrypt(pw){

    // #publickey에 저장된 공개키 가져옴.
    var csr = $('#publickey').val();

    // Encrypt with the public key...
    var encrypt = new JSEncrypt();
    encrypt.setPublicKey(csr);
    var encrypted = encrypt.encrypt(pw);

    //encoding Base64 for POST connection
    var wordArray = CryptoJS.enc.Utf8.parse(encrypted);
    var encoded = CryptoJS.enc.Base64.stringify(wordArray);

    return encoded;

}
