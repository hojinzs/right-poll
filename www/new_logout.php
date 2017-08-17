<?php require_once __DIR__ . '/../core/init.php';
/**
 * JS 안먹힐 경우에 쓰게 되는 로그아웃 페이지
 * @var string
 */

// 기본 메타데이터 (타이틀, 설명) 세팅
$title = "공약지킴이::로그아웃";

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

?>
<HTML>
<?php include 'head.php'; ?>
<BODY>
<?php include 'new_nav.php'; ?>

<div class="container">
    <div class="row">
        <div class="wr_contents col-md-12">
            <div class="wr_single_wrapper">
            	<?=$msg?>
            </div>
        </div>
    </div>
</div>
<?php include 'new_footer.php'; ?>
</BODY>
</HTML>
