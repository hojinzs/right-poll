<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * 로그인 처리 POST
 * @param var $email 로그인 아이디 (이메일)
 * @param var $pw 패스워드
 */

// post 파라미터가 제대로 넘어왔는지 확인
if (isset($_POST['email'])) {echo "error:: cannot find email"; return;};
if (isset($_POST['pw'])) {echo "error:: cannot find password"; return;};

// post 파라미터 세팅
$id = $_POST['email'];
$pw = Auth\Crypt::decryptCryptoJS($_POST['pw']);

// 결과::

echo $id.'::'.$pw;
