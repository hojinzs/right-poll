<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * @param var $code 체크할 코드
 * @param var $email User Email
 */

//POST 데이터(code={code})가 제대로 전달 되었는지 확인
if(!isset($_POST['code'])){return "error:: code is not sent!";}
if(!isset($_POST['email'])){return "error:: email is not sent!";}

$result = \User\Common::matchVerifyCode($_POST['code'],$_POST['email']);

$_SESSION['findpw']['user_id'] = $_SESSION['findpw']['target_user_id'];

// Send Email 실패시 에러 메시지 반환
if($result!="success"){
    echo $result;
    return;
}

echo "success";
return;