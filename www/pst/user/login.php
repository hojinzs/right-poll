<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * 로그인 처리 POST
 * @param var $email 로그인 아이디 (이메일)
 * @param var $pw 패스워드
 */

$id = $_POST['email'];
$pw = $_POST['pw'];

echo $id.'::'.$pw;
