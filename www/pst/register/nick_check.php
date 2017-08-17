<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * @param var $nick 중복체크할 닉네임
 */

//POST 데이터(nick={nick})가 제대로 전달 되었는지 확인
if(!isset($_POST['nick'])){
 echo "error:: nick is not sent!";
 return;
}

echo User\Register::checkCurrentNick($_POST['nick']);
