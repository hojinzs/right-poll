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
