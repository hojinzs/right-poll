<?php require_once __DIR__ . '/../../core/init.php';
/**
 * 로그인 처리 POST
 * @param var $id 로그인 아이디
 * @param var $pw 패스워드
 */

//임시 패스워드 암호화 테스트 스크립트. 나중에 user 기능으로 변경
$pw = base64_decode($_POST['pw']); //JS에서 BASE64로 인코딩된 텍스트를 한번 디코딩 한다.
$result = \Auth\Crypt::rsaDecrypt($pw);
echo "YourPassword is ".$result;
