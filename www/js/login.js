$(document).ready(function(){
    // 암호화를 위한 공개키를 받아 페이지에 저장
    $.ajax({
        url:"/pst/csr.php",
        success:function(csr){
            // 공개키를 받아왔다면 $publickey에 저장
            $("#publickey").attr('value',csr);
        }
    })

    // 로그인 폼이 제출 되었을 경우 submit을 가로챔.
    $('#login').submit(function(){

        // 로그인폼 입력값과 공개키를 가져움.
        var email = $('#email').val();
        var pw = $('#password').val();
        var csr = $('#publickey').val();

        // 비밀번호 암호화
        var crypt_pw = pwCrypt(pw,csr);

        // post 메세지 준비
        pst_msg = "email="+email+"&pw="+crypt_pw;

        // ajax 전송
        $.ajax({
            type: "POST",
            url: "/pst/user/login.php",
            data: pst_msg,
            success: function(return_msg){
                alert(return_msg);
                goBack();
            },
            error:function(request,status,error){
                alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                // alert("실패하였습니다");
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


// 이전 페이지로 이동
function goBack(){
    var ref = document.referrer.split('/')[2];
    var domain = ref.substring(ref.indexOf('.')+1, ref.length);
    var thisdomain = window.location.hostname;

    if (domain == thisdomain)
    	window.location.replace(document.referrer);
    else if (ref == thisdomain)
    	window.location.replace(document.referrer);
    else
    	window.location.replace("http://example.com");
}
