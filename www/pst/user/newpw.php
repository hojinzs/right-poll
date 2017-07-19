<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * 비밀번호 수정 처리 POST
 * @param var $userid 정보를 수정할 유저 ID
 * @param var $password 비밀번호
 * @param var $password_repeat 비밀번호
 */

// post 파라미터가 제대로 넘어왔는지 확인
if(!isset($_POST['userid'])) {echo "error:: id is not sent!"; return;}
if(!isset($_POST['password'])) {echo "error:: password is not sent!"; return;}
if(!isset($_POST['password_repeat'])) {echo "error:: repeat password is not sent!"; return;}

// 처리 함수 세팅
$id = $_POST['userid'];
$password = Auth\Crypt::decryptCryptoJS($_POST['password']);
$password_repeat = Auth\Crypt::decryptCryptoJS($_POST['password_repeat']);

// 요청ID 와 세션ID가 일치하는지 확인
if($id!=$_SESSION['user_id']) {echo "error:: user is differnt"; return;}

// 변경 시도
echo $result;

// // 유저 정보 수정 실패시 메시지 반환
// if($result!="success"){
//     echo $result;
//     return;
// }
//
// echo "success";
// return;


function getUserPassword(){

}
