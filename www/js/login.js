$(document).ready(function(){

    $('#btn').click(function(){

        $.ajax({
            url:"./pst/csr.php",
            success:login
        })

    })

})

function login(csr){
    var id = $('#id').val();
    var pw = $('#pw').val();

    // Encrypt with the public key...
    var encrypt = new JSEncrypt();
    encrypt.setPublicKey(csr);
    var encrypted = encrypt.encrypt(pw);

    //encoding Base64 for POST connection
    var wordArray = CryptoJS.enc.Utf8.parse(encrypted);
    var encoded = CryptoJS.enc.Base64.stringify(wordArray);

    // alert("encrypted::\n"+encrypted+"\nencoded::\n"+encoded+"\npassword::\n"+pw);

    var pst_msg = "id="+id+"&"+"pw="+encoded;

    $.ajax({
        type: "POST",
        url: "./pst/login.php",
        data: pst_msg,
        success: function(return_msg){
            alert(return_msg);
        },
        error:function(request,status,error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            // alert("실패하였습니다");
        },
    })
};
