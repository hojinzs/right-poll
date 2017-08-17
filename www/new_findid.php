<?php require_once __DIR__ . '/../core/init.php';
// 로그인한 사용자는 사용 불가, 마이페이지로 이동.
if($_SESSION['login_type']=="user") header("Location:/new_mypage.php");

// 기본 메타데이터 (타이틀, 설명) 세팅
$title = "공약지킴이::Find ID";

?>
<HTML>
<?php include 'head.php'; ?>
<head>
    <script src="js/findid.js"></script>
</head>

<BODY>
<?php include 'new_nav.php'; ?>

<div class="container">
    <div class="row">
        <div class="wr_contents col-md-12">
            <div class="wr_single_wrapper">

            	<!-- Enter Email for send ID -->
            	<div id="find_id">
	                <h1>이메일을 입력해주세요.</h1>
                    <p>회원 정보가 있다면 이메일이 발송됩니다.</p>
                    <form id="findid" class="wr_form" action="/pst/user/findid.php" method="post">
                        <input id="email" class="wr_form_input" type="email" placeholder="이메일" autocomplete="on" required></input>
                        <input id="submit" class="wr_form_btn wr_btn wr_btn_blue" type="submit" value="check >"></input>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include 'new_footer.php'; ?>
</BODY>
</HTML>
