<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * @param var $nickname 사용할 닉네임
 * @param var $password 로그인시 사용할 비밀번호
 * @param var $password_repeat 중복 패스워드
 * $email과 $code가 넘어왔다면, FORM에서 인증을 거치지 않았다는 의미
 */

// 이메일 인증 여부 확인. 인증하였다면 $email에 저장한다.
if(isset($_SESSION['register']['checked_email'])){
    # 인증 받았었다면
    $email = $_SESSION['register']['checked_email'];
} else {
    # 인증받은적이 없다면
    return "error:: need email validation";
}

// 데이터 세팅
$email = $_SESSION['register']['checked_email'];
$nick = $_POST['nick'];
$password = decryptCryptoJS($_POST['password']);

// 최종 회원 가입 시작
$return = setRegister($email,$nick,$password);

// 회원가입 성공 여부에 따라 return message 세팅
echo $return;

function decryptCryptoJS($pw){
    //JS에서 BASE64로 인코딩된 텍스트를 한번 디코딩 한다.
    $decoded = base64_decode($pw);

    // rsaDecrypt를 이용해 패스워드 복호화.
    $password = \Auth\Crypt::rsaDecrypt($decoded);

    return $password;
}

function setRegister($email,$nick,$password){
    // $_SESSION['register']가 설정 되어 있는지 확인.

    // STAGE 1 :: 이메일 중복 여부 재확인
    $check_mail = \App\User::getCurrentUserEmail($email);
    if($check_mail == true) return "error:: exist email";

    // STAGE 2 :: 닉네임 중복 여부 재확인
    $check_nick = \App\User::getCurrentUserNick($nick);
    if($check_nick == true) return "error:: exist nickname";

    // STAGE 3 :: 비밀번호 유효성 확인
    $check_pw = \App\Str::checkPasswordStrength($password);
    if($check_pw == false) return "error:: not strength password";

    // 다 통과했다면 새로운 유저 생성

    // 유저 생성 결과 return
    return "success";

}

function setNewUser(){

}
