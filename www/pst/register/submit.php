<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * @param var $id 로그인에 사용할 아이디
 * @param var $nick 사용할 닉네임
 * @param var $email 서비스에 사용할 이메일
 * @param var $password 로그인시 사용할 비밀번호
 * @param var $password_repeat 중복 패스워드
 * $email과 $code가 넘어왔다면, FORM에서 인증을 거치지 않았다는 의미
 */

// 넘어온 데이터 확인
if(!isset($_POST['id'])) {echo "error:: login id is not sent!"; return;}
if(!isset($_POST['nick'])) {echo "error:: nickname is not sent!"; return;}
if(!isset($_POST['email'])) {echo "error:: email is not sent!"; return;}
if(!isset($_POST['password'])) {echo "error:: password is not sent!"; return;}
if(!isset($_POST['password_repeat'])) {echo "error:: repeat password is not sent!"; return;}

// 데이터 세팅
$user_id = strtolower($_POST['id']);
$nick = $_POST['nick'];
$email = strtolower($_POST['email']);
$password = \Auth\Crypt::decryptCryptoJS($_POST['password']);
$password_repeat = \Auth\Crypt::decryptCryptoJS($_POST['password_repeat']);

// 패스워드 암호화 성공하였는가?
if($password == "Password Decrypt Fail"){echo "error:: passwrod Decrypt Fail!!"; return;}

// check password & repeat password matched
if($password != $password_repeat) {echo "error:: password is not matched!"; return;}

// 회원 가입 정보 제출
$return = User\Register::setRegister($user_id,$nick,$email,$password);

// 회원가입 성공 여부에 따라 return message 세팅
echo $return;
return;
