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
            <div class="wr_single_wrapper">

            <h1>회원가입</h1>

                <form id="form_register" class="wr_form">

                    <div id="group_email" class="group_btn">
                        <input class="wr_form_input" name="email" type="email" placeholder="이메일"></input>
                        <input class="wr_form_btn wr_btn wr_btn_blue" name="email_send" type="button" value="코드발송"></input>
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </div>

                    <div id="group_code" class="group_btn">
                        <input class="wr_form_input" name="code" type="text" placeholder="인증코드 입력(5자리)" maxlength="5"></input>
                        <input class="wr_form_btn wr_btn wr_btn_blue" name="email_send" type="button" value="확인"></input>
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </div>

                    <div id="group_nick" class="group_btn">
                        <input class="wr_form_input" name="nick" type="text" placeholder="닉네임"></input>
                        <input class="wr_form_btn wr_btn wr_btn_blue" name="nick_check" type="button" value="중복확인" ></input>
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </div>

                    <input id="password" class="wr_form_input" name="password" type="password" placeholder="비밀번호"></input>
                    <input id="password_repeat" class="wr_form_input" name="password_repeat" type="password" placeholder="비밀번호 확인"></input>
                    <input id="submit" class="wr_form_btn wr_btn wr_btn_blue" name="submit" type="submit" value="양식 제출 >"></input>
                </form>

            </div>

        </div>
    </div>
</div>
<?php include 'new_footer.php'; ?>
</BODY>
</HTML>
