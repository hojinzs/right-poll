<?php require_once __DIR__ . '/../core/init.php';
// 기본 메타데이터 (타이틀, 설명) 세팅
$title = "실시간 공약이행률::로그인";
$desc = "로그인";
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
</head>

<BODY>
<?php include 'new_nav.php'; ?>

<div class="container contents-box">
    <div class="row">
        <div class="wr_contents col-md-12">

            <h1>비번 암호화 테스트</h1>
            <form id="login">
                닉네임: <input name="id" id="id" type="text"><br>
                비밀번호: <input name="pw" id="pw" type="password"><br>
                <input id="btn" type="button" value="로그인"><br>
            </form>

        </div>
    </div>
</div>
<?php include 'new_footer.php'; ?>
</BODY>
</HTML>
