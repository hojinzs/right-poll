<?php require_once __DIR__ . '/../core/init.php';
// 로그인한 사용자는 사용 불가, 마이페이지로 이동.
if($_SESSION['login_type']=="user") header("Location:/new_mypage.php");

// 기본 메타데이터 (타이틀, 설명) 세팅
$title = "공약지킴이::로그인";
?>
<HTML>
<?php include 'head.php'; ?>
<head>
    <!-- CryptoJS -->
    <script src="js/cryptojs.core.js"></script>
    <script src="js/cryptojs.enc-base64.js"></script>
    <!-- reffernce: https://github.com/travist/jsencrypt -->
    <script src="js/jsencrypt.min.js"></script>

    <script src="js/login.js"></script>

    <link rel="stylesheet" href="style/wr_form.css">
</head>

<BODY>
<?php include 'new_nav.php'; ?>

<div class="hidden" >
    <input id="publickey" style="display:none"></input>
</div>
<div class="container">
    <div class="row">
        <div class="wr_contents col-md-12">
            <div class="wr_single_wrapper">
                <h1>로그인</h1>
                    <form id="login" class="wr_form" action="/pst/user/login.php" method="post">
                        <input id="email" class="wr_form_input" name="email" type="email" placeholder="이메일"></input>
                        <input id="password" class="wr_form_input" type="password" placeholder="비밀번호"></input>
                        <input id="submit" class="wr_form_btn wr_btn wr_btn_blue" type="submit" value="로그인 >"></input>
                    </form>
                </div>
        </div>
    </div>
</div>
<?php include 'new_footer.php'; ?>
</BODY>
</HTML>
