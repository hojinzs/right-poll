<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * @param var $nickname 사용할 닉네임
 * @param var $password 로그인시 사용할 비밀번호
 * $email과 $code가 넘어왔다면, FORM에서 인증을 거치지 않았다는 의미
 */

// // 이메일 인증 여부 확인. 인증하였다면 $email에 저장한다.
// if(isset($_SESSION['register']['checked_email'])){
//     # 인증 받았었다면
//     $email = $_SESSION['register']['checked_email'];
// } else {
//     # 인증받은적이 없다면
//     return "error:: need email validation";
// }

// 닉네임 준비
$nick = $_POST['nick'];

// 전달된 비밀번호($password) 복호화
$decoded = base64_decode($_POST['password']); //JS에서 BASE64로 인코딩된 텍스트를 한번 디코딩 한다.
$password = \Auth\Crypt::rsaDecrypt($decoded);

// 최종 회원 가입 시작

echo $nick."-".$password;

// 회원가입 성공 여부에 따라 return message 세팅

function setRegister($email,$nick,$password){
    // $_SESSION['register']가 설정 되어 있는지 확인.

    // STAGE 1 :: 이메일 중복 여부 재확인
    // 이미 해당 메일로 가입한 회원이 있는지 확인한다.
    $check_mail = \App\User::getCurrentUserEmail($email);
    if($check_mail == true){
        return "error:: exist email";
    }

    // STAGE 2 :: 닉네임 중복 여부 재확인
    $check_nick = \App\User::getCurrentUserNick($nick);
    if($check_nick == true){
        return "error:: exist nickname";
    }

    // STAGE 3 :: 비밀번호 유효성 확인
    $check_pw = "";

    // 다 통과했다면 새로운 유저 생성


    // 유저 생성 결과 return

}

function setNewUser(){

}
