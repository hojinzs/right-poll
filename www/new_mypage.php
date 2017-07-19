<?php require_once __DIR__ . '/../core/init.php';

// 기본 메타데이터 (타이틀, 설명) 세팅
$title = "공약지킴이::마이페이지";

?>

<HTML>
<?php include 'head.php'; ?>
<BODY>
<?php include 'new_nav.php'; ?>

<div class="container">
    <div class="row">
        <div class="wr_contents col-md-12">
            <h1> MyPAGE </h1>
            <div class="row">
            	<div class="col-md-3">
            		<ul>
            			마이페이지 메뉴
            			<li>abc</li>
            			<li>abc</li>
            			<li>abc</li>
            		</ul>
            	</div>
            	<div class="col-md-9">
            		<form id="myinfo" class="wr_form">
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
            		</form>
            	</div>
            </div>

        </div>
    </div>
</div>

<?php include 'new_footer.php'; ?>

</BODY>
</HTML>
