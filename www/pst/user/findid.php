<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * find ID POST
 * @param var $email User Email
 */

// post 파라미터가 제대로 넘어왔는지 확인
if (!isset($_POST['email'])) {
    echo "error:: email is not sent";
    return;
};

// post 파라미터 세팅
$email = $_POST['email'];

// Send Verify Email
$result = \User\Common::sendIdentifyEmail($email);

// Send Email 실패시 에러 메시지 반환
if($result!="success"){
    echo $result;
    return;
}

echo "success";
return;
