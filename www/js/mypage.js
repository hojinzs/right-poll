$(document).ready(function(){
    // 암호화를 위한 공개키를 받아 페이지에 저장
    $.ajax({
        url:"/pst/csr.php",
        success:function(csr){
            // 공개키를 받아왔다면 $publickey에 저장
            $("#publickey").attr('value',csr);
        }
    })

    $('#form_myinfo').submit(function(){

        // set ajax data
        var queryString = $('#form_myinfo').serialize();

        // ajax POST 전송
        $.ajax({
            type: "POST",
            url: "./pst/user/edit_userinfo.php",
            data: queryString,
            success:function(return_msg){
                if(return_msg=="success"){
                    // return이 success라면
                    alert("회원정보가 정상적으로 수정되었습니다.");
                    location.reload(true);
                } else {
                    // return이 success가 아니라면 (서버에서 에러가 있을 경우)
                    alert(return_msg);
                }
            },
            error:function(request,status,error){
                alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                alert("실패하였습니다");
            },
        })
        return false;
    })

    $('#form_pw').submit(function(){
        var publickey = $("#publickey").attr('value');

        // set ajax data
        var user_id = $('#pw_user_id').val();
        var pw_raw = $('#password').val();
        var pw_rpt = $('#password_repeat').val();

        //password와 password 일치 확인
        if(pw_raw != pw_rpt){
            alert("error:: password is not matched!");
            return false;
        }

        //password 규칙 확인
        var pwtest= /(^(?=.*[a-zA-Z])((?=.*\d))((?=.*\W)).{8,20}$)/;
        if(!pwtest.test(pw_raw)){
            alert("error:: password is less strength!");
            return false;
        }

        //password를 암호화하고, 암호화 방식을 전달.
        var password = pwCrypt(pw_raw,publickey);
        var password_repeat = pwCrypt(pw_rpt,publickey);

        //POST 메세지 준비
        var pst_msg = "user_id="+user_id+"&password="+password+"&password_repeat="+password_repeat;

        // ajax POST 전송
        $.ajax({
            type: "POST",
            url: "./pst/user/newpw.php",
            data: pst_msg,
            success:function(return_msg){
                if(return_msg=="success"){
                    // return이 success라면
                    alert("비밀번호가 정상적으로 수정되었습니다.");
                    location.reload(true);
                } else {
                    // return이 success가 아니라면 (서버에서 에러가 있을 경우)
                    alert(return_msg);
                }
            },
            error:function(request,status,error){
                alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                alert("실패하였습니다");
            },
        })
        return false;
    })
})

// 패스워드 JS 암호화
function pwCrypt(pw,pubkey){

    // Encrypt with the public key...
    var encrypt = new JSEncrypt();
    encrypt.setPublicKey(pubkey);
    var encrypted = encrypt.encrypt(pw);

    //encoding Base64 for POST connection
    var wordArray = CryptoJS.enc.Utf8.parse(encrypted);
    var encoded = CryptoJS.enc.Base64.stringify(wordArray);

    return encoded;

}

//인증 메일 발송하기
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
