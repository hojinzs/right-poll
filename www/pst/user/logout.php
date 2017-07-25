<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * 로그인 처리 POST
 */

// $_SESSION['login_type'] 세션 로그인 상태를 체크
if($_SESSION['login_type']=='user'){
	// 로그인 타입을 게스트로 다시 변경
	$_SESSION['login_type']='guest';
	$_SESSION['user_id'] = $_SESSION['guest_id'];
	$_SESSION['user_nick'] = '';

	$msg = "success";
} else {
	$msg = "error:: not login user!";
}

echo $msg;
