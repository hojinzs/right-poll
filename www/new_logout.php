<?php require_once __DIR__ . '/../core/init.php';
// 기본 메타데이터 (타이틀, 설명) 세팅
$title = "공약지킴이::로그아우ㅅ";

// $_SESSION['login_type'] 세션 로그인 상태를 체크
if($_SESSION['login_type']=='user'){
	session_destroy();
	$msg = "Logout Success!";	
} else {
	$msg = "not login user!";
}

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