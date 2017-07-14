<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * @param var $email 인증코드를 전송할 이메일 주소
 */

echo App\Register::sendVerifiyEmail($_POST['email']);
