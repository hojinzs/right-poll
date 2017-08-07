<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * @param var $code 체크할 코드
 */

//POST 데이터(code={code})가 제대로 전달 되었는지 확인
if(!isset($_POST['code'])){
    return "error:: 'code'is not sent!";
}

echo \User\Register::matchVerifyCode($_POST['code']);