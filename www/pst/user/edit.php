<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * 회원정보 수정 처리 POST
 * @param var $userid 정보를 수정할 유저 ID
 * @param var $email 로그인 아이디 (이메일)
 * @param var $nick 닉네임
 */

// post 파라미터가 제대로 넘어왔는지 확인
if (!isset($_POST['userid'])) {echo "error:: id is not sent!"; return;}
if (!isset($_POST['email'])) {echo "error:: email is not sent!"; return;}
if (!isset($_POST['nick'])) {echo "error:: nickname is is not sent!"; return;}

// post 파라미터 세팅
$id = $_POST['userid'];
$email = $_POST['email'];
$nick = $_POST['nick'];

// 요청ID 와 세션ID가 일치하는지 확인
if($id!=$_SESSION['user_id']) {echo "error:: user is differnt"; return;}

// 수정 시도
$result = \User\Control::editUserInformation($id,$email,$nick);

// 유저 정보 수정 실패시 메시지 반환
if($result!="success"){
    echo $result;
    return;
}

echo "success";
return;
