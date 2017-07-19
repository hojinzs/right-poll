$(document).ready(function(){
    // 암호화를 위한 공개키를 받아 페이지에 저장
    $.ajax({
        url:"/pst/csr.php",
        success:function(csr){
            // 공개키를 받아왔다면 $publickey에 저장
            $("#publickey").attr('value',csr);
        }
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
