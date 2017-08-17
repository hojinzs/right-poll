<?php require_once __DIR__ . '/../../../core/init.php';
/**
 * 로그아웃 처리 POST
 */

// $_SESSION['login_type'] 세션 로그인 상태를 체크
if($_SESSION['login_type']=='user'){
	# 로그인 유저일 경우

	// 게스트 접속 정보가 있을 경우
	if(isset($_SESSION['guest_id']) == true){
		$guest_id = $_SESSION['guest_id'];
		session_destroy();

		// 로그인 타입을 게스트로 다시 변경
		$_SESSION['login_type']='guest';
		$_SESSION['user_id'] = $guest_id;
		$_SESSION['user_nick'] = '';
	} else {
		// 그런거 없다면 냅다 디스트로이
		session_destroy();
	}

	// 성공 메시지 출력
	$msg = "success";
} else {
	# 로그인 유저가 아닐 경우
	$msg = "error:: not login user!";
}

echo $msg;
