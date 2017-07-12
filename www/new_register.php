<?php require_once __DIR__ . '/../core/init.php';

// 기본 메타데이터 (타이틀, 설명) 세팅
$title = "공약지킴이::마이페이지";

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

    <link rel="stylesheet" href="style/wr_form.css">

</head>
<BODY>
<?php include 'new_nav.php'; ?>

<div class="container">
    <div class="row">
        <div class="wr_contents col-md-12">

            <h1>회원가입</h1>

            <form class="wr_form">

                <div class="group_btn">
                    <input class="wr_form_input green" name="email" type="email" placeholder="이메일" disabled></input>
                    <input class="wr_form_btn wr_btn wr_btn_blue green" name="email_send" type="button" value="인증코드 발송" disabled></input>
                    <i class="fa fa-check green" aria-hidden="true"></i>
                </div>

                <div class="group_btn">
                    <input class="wr_form_input" name="email_check" type="text" placeholder="인증코드 입력(4자리)" maxlength="4"></input>
                    <input class="wr_form_btn wr_btn wr_btn_blue" name="email_send" type="button" value="인증코드 확인"></input>
                </div>

                <div class="group_btn">
                    <input class="wr_form_input" name="nick" type="text" placeholder="닉네임"></input>
                    <input class="wr_form_btn wr_btn wr_btn_blue" name="nick_check" type="button" value="닉네임 확인" ></input>
                </div>

                <input class="wr_form_input" name="password" type="password" placeholder="비밀번호"></input>
                <input class="wr_form_input" name="password_again" type="password" placeholder="비밀번호 확인"></input>
                <input class="wr_form_btn wr_btn wr_btn_blue" name="submit" type="submit" value="양식 제출 >"></input>
            </form>

        </div>
    </div>
</div>
<?php include 'new_footer.php'; ?>
</BODY>
</HTML>
