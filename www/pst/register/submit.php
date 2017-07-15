<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * @param var $nickname 사용할 닉네임
 * @param var $password 로그인시 사용할 비밀번호
 * @param var $password_repeat 중복 패스워드
 * $email과 $code가 넘어왔다면, FORM에서 인증을 거치지 않았다는 의미
 */

// 이메일 인증 여부 확인. 인증하였다면 $email에 저장한다.
if(!isset($_SESSION['register']['checked_email'])) {echo "error:: need email validation";return;}

// 넘어온 데이터 확인
if(!isset($_POST['nick'])) {echo "error:: email is not sent!"; return;}
if(!isset($_POST['password'])) {echo "error:: password is not sent!"; return;}
if(!isset($_POST['password_repeat'])) {echo "error:: repeat password is not sent!"; return;}

// 데이터 세팅
$email = $_SESSION['register']['checked_email'];
$nick = $_POST['nick'];
$password = Auth\Crypt::decryptCryptoJS($_POST['password']);

// 회원 가입 정보 제출
$return = User\Register::setRegister($email,$nick,$password);

// 회원가입 성공 여부에 따라 return message 세팅
echo $return;
