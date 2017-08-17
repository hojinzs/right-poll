<?php require_once __DIR__ . '/../core/init.php';
// 로그인한 사용자는 사용 불가, 마이페이지로 이동.
if($_SESSION['login_type']=="user") header("Location:/mypage");

// 기본 메타데이터 (타이틀, 설명) 세팅
$title = "공약지킴이::로그인";

// Clear Session
if(isset($_SESSION['findpw'])==true){
    unset($_SESSION['findpw']);
}

// $_SESSION['findpw']['email'] = "";
// $_SESSION['findpw']['issued_code'] = "";
// $_SESSION['findpw']['user_id'] = "";

?>
<HTML>
<?php include 'head.php'; ?>
<head>
    <!-- CryptoJS -->
    <script src="js/cryptojs.core.js"></script>
    <script src="js/cryptojs.enc-base64.js"></script>
    <!-- reffernce: https://github.com/travist/jsencrypt -->
    <script src="js/jsencrypt.min.js"></script>

    <script src="js/findpw.js"></script>

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
            	<!-- STEP1. Enter Email, ID -->
            	<div id="findpw_1">
	                <h1>이메일을 입력하세요.</h1>
                    <form id="findpw1" class="wr_form" action="/pst/user/findpw.php" method="post">
                        <input id="name" class="wr_form_input" name="name" type="text" placeholder="아이디" autocomplete="on" required></input>
                        <input id="email" class="wr_form_input" type="email" placeholder="이메일" autocomplete="on" required></input>

                        <input id="submit" class="wr_form_btn wr_btn wr_btn_blue" type="submit" value="check >"></input>
                    </form>
                </div>

            	<!-- STEP2. Check Verify Code -->
            	<div id="findpw_2">
	                <h1>이메일을 확인해주세요.</h1>
                    <p>이메일로 인증코드(5자리)를 발송했습니다. 발송된 인증코드를 입력해주세요.</p>
                    <form id="findpw2" class="wr_form" action="/pst/user/codecheck.php" method="post">
                        <input id="code" class="wr_form_input" name="code" type="text" placeholder="verify code(5 charater)" maxlenth="5" autocomplete="on" ></input>

                        <input id="submit" class="wr_form_btn wr_btn wr_btn_blue" type="submit" value="check >"></input>
                    </form>
                </div>

                <!-- STEP3. Set New Password -->
            	<div id="findpw_3">
	                <h1>새로운 비밀번호를 입력해주세요.</h1>
                    <form id="findpw3" class="wr_form" action="/pst/user/newpw.php" method="post">
                        <input id="password" class="wr_form_input" name="password" type="password" placeholder="New Password" autocomplete="on" ></input>
                        <input id="password_repeat" class="wr_form_input" name="password_repeat" type="password" placeholder="Repeat Password" autocomplete="on" ></input>

                        <input id="submit" class="wr_form_btn wr_btn wr_btn_blue" type="submit" value="Submit >"></input>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include 'new_footer.php'; ?>
</BODY>
</HTML>
