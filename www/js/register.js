$(document).ready(function(){
    // form submit을 눌렀을 경우
    $.ajax({
            url:"/pst/csr.php",
            success: function(csr){
                $("#publickey").attr('value',csr);
            },
            error: function(msg){
                alert("서버가 응답하지 않습니다.");
            }
        })


    $('#form_register').submit(function(){
        var publickey = $("#publickey").attr('value');

        //form의 내용을 불러옴.
        var id = $('#name').val();
        var nick = $('#nick').val();
        var email = $('#email').val();
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
        var pst_msg = "id="+id+"&nick="+nick+"&email="+email+"&password="+password+"&password_repeat="+password_repeat;

        //ajax 전송
        $.ajax({
            type: "POST",
            url: "./pst/register/submit.php",
            data: pst_msg,
            success: function(return_msg){
                if(return_msg=="success"){
                    location.href = '/new_login.php';
                }
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

function complete_group_btn(element){
    $(element+' > input').prop('disabled', true);
    $(element).addClass('green');
};

// 패스워드 JS 암호화
function pwCrypt(pw,publickey){

    // Encrypt with the public key...
    var encrypt = new JSEncrypt();
    encrypt.setPublicKey(publickey);
    var encrypted = encrypt.encrypt(pw);

    //encoding Base64 for POST connection
    var wordArray = CryptoJS.enc.Utf8.parse(encrypted);
    var encoded = CryptoJS.enc.Base64.stringify(wordArray);

    return encoded;

}

// 안씀
// // 인증코드 체크
// function checkcode(){
//     var code = $('#group_code > .wr_form_input').val();
//
//     //ready post message
//     var pst_msg = "code="+code;
//
//     //ajax POST
//     $.ajax({
//         type: "POST",
//         url: "/pst/register/code_check.php",
//         data: pst_msg,
//         success:function(return_msg){
//             alert(return_msg);
//
//             complete_group_btn('#group_email');
//             complete_group_btn('#group_code');
//
//         },
//         error:function(request,status,error){
//             alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
//             // alert("실패하였습니다");
//         },
//     })
// }
//
//
// // 닉네임 중복 체크
// function checknick(nick){
//
//     //ready post message
//     var pst_msg = "nick="+nick;
//
//     //ajax POST
//     $.ajax({
//         type: "POST",
//         url: "/pst/register/nick_check.php",
//         data: pst_msg,
//         success:function(return_msg){
//             alert(return_msg);
//
//             $('#group_nick > i').addClass('green');
//         },
//         error:function(request,status,error){
//             alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
//             // alert("실패하였습니다");
//         },
//     })
// }
