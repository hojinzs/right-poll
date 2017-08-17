<?php require_once __DIR__ . '/../core/init.php';
// 로그인한 사용자는 사용 불가, 마이페이지로 이동.
if($_SESSION['login_type']=="user") header("Location:/new_mypage.php");

// 기본 메타데이터 (타이틀, 설명) 세팅
$title = "공약지킴이::회원가입";

// 회원가입 단계 시작. 회원가입 단계에 따라 $SESSION['register']에 단계/정보 추가.
// 페이지를 불러오면 단계를 초기화한다.
if(isset($_SESSION['register'])){
    unset($_SESSION['register']);
}

?>

<HTML>
<?php include 'head.php'; ?>
<head>
    <!-- CryptoJS -->
    <script src="js/cryptojs.core.js"></script>
    <script src="js/cryptojs.enc-base64.js"></script>
    <!-- reffernce: https://github.com/travist/jsencrypt -->
    <script src="js/jsencrypt.min.js"></script>

    <script src="js/register.js"></script>

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

                <form id="form_register" name="register" class="wr_form" action="./pst/register/submit.php" method="post">
                    <h2> 회원가입 </h3>
                        <label for="name">ID</label>
                        <input id="name" class="wr_form_input" name="name" type="text" placeholder="5~20자 (영문)" autocomplete="on" required></input>

                        <label for="nick">닉네임</label>
                        <input id="nick" class="wr_form_input" name="nick" type="text" placeholder="2~12자 (대소문자/한글)" required></input>

                        <label for="email">이메일</label>
                        <input id="email" class="wr_form_input" name="email" type="email" placeholder="이메일 (정보 수신 / 비밀번호 찾기 용도)" required></input>

                        <label for="nick">비밀번호</label>
                        <input id="password" class="wr_form_input" name="password" type="password" placeholder="비밀번호 (영문/숫자/특수문자 포함)" required></input>
                        <input id="password_repeat" class="wr_form_input" name="password_repeat" type="password" placeholder="비밀번호 확인" required></input>

                        <input id="submit" class="wr_form_btn wr_btn wr_btn_blue" type="submit" value="가입하기"></input>
                </form>

            </div>

        </div>
    </div>
</div>
<?php include 'new_footer.php'; ?>
</BODY>
</HTML>
