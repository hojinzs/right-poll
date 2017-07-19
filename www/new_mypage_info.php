<?php
/**
 * 사용자 정보 확인 / 수정
 * @param var $_SESSION['user_id'] 사용자 ID
 */

// 사용자 정보 불러오기
$myinfo = \User\Common::getUserInfomation($_SESSION['user_id']);

?>

<form id="myinfo" class="wr_form" action="/pst/user/edit.php" method="post">
    <h2>회원정보 수정</h2>
    <input class="wr_form_input" name="userid" hidden="hidden" value="<?=$_SESSION['user_id']?>"></input>

    <div id="group_email" class="group_btn">
        <input class="wr_form_input" name="email" type="email" placeholder="이메일" value="<?=$myinfo['email']?>"></input>
        <input class="wr_form_btn wr_btn wr_btn_blue" name="email_send" type="button" value="변경하기"></input>
        <i class="fa fa-check" aria-hidden="true"></i>
    </div>

    <div id="group_code" class="group_btn">
        <input class="wr_form_input" name="code" type="text" placeholder="인증코드 입력(5자리)" maxlength="5"></input>
        <input class="wr_form_btn wr_btn wr_btn_blue" name="email_check" type="button" value="확인"></input>
        <i class="fa fa-check" aria-hidden="true"></i>
    </div>

    <div id="group_nick" class="group_btn">
        <input class="wr_form_input" name="nick" type="text" placeholder="닉네임" value="<?=$myinfo['nick']?>" ></input>
        <input class="wr_form_btn wr_btn wr_btn_blue" name="nick_check" type="button" value="중복확인" ></input>
        <i class="fa fa-check" aria-hidden="true"></i>
    </div>

    <input class="wr_form_btn wr_btn wr_btn_blue" type="submit" value="저장"></input>
</form>

<form id="password" class="wr_form" action="/pst/user/edit.php" method="post">
    <h2>비밀번호 수정</h2>
    <input id="password" class="wr_form_input" name="password" type="password" placeholder="비밀번호"></input>
    <input id="password_repeat" class="wr_form_input" type="password" placeholder="비밀번호 확인"></input>
    <input id="submit" class="wr_form_btn wr_btn wr_btn_blue" type="submit" value="저장"></input>
</form>
