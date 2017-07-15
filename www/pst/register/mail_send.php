<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * @param var $email 인증코드를 전송할 이메일 주소
 */

//POST 데이터(email={email})가 제대로 전달 되었는지 확인
if(!isset($_POST['email'])){
 return "error:: 'email'is not sent!";
}

echo App\Register::sendVerifiyEmail($_POST['email']);
