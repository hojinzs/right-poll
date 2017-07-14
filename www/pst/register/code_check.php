<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * @param var $code 체크할 코드
 */

echo App\Register::matchVerifyCode($_POST['code']);
