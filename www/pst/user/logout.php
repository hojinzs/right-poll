<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * 로그인 처리 POST
 */

// $_SESSION['login_type'] 세션 로그인 상태를 체크
if($_SESSION['login_type']=='user'){
	session_destroy();
	$msg = "success";	
} else {
	$msg = "error:: not login user!";
}

echo $msg;