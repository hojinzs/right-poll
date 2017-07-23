<?php
/**
 * 사용자 정보 확인 / 수정
 * @param var $_SESSION['user_id'] 사용자 ID
 */

// 사용자 정보 불러오기
$myinfo = \User\Common::getUserInfomation($_SESSION['user_id']);

?>

<form id="form_myinfo" class="wr_form" action="/pst/user/edit.php" method="post">
    <h2>회원정보 수정</h2>
    <input class="wr_form_input" name="id" hidden="hidden" value="<?=$_SESSION['user_id']?>"></input>

    <label for="id">ID</label>
    <input id="user_id" class="wr_form_input" name="user_id" type="text" placeholder="5~20자 (영문)" value="<?=$myinfo['user_id']?>"></input>

    <label for="nick">닉네임</label>
    <input id="nick" class="wr_form_input" name="nick" type="text" placeholder="2~12자 (대소문자/한글)" value="<?=$myinfo['nick']?>"></input>

    <label for="email">이메일</label>
    <input id="email" class="wr_form_input" name="email" type="email" placeholder="이메일 (정보 수신 / 비밀번호 찾기 용도)" value="<?=$myinfo['email']?>"></input>

    <input class="wr_form_btn wr_btn wr_btn_blue" type="submit" value="저장"></input>
</form>

<form id="password" class="wr_form" action="/pst/user/edit.php" method="post">
    <h2>비밀번호 수정</h2>
    <input id="password" class="wr_form_input" name="password" type="password" placeholder="비밀번호"></input>
    <input id="password_repeat" class="wr_form_input" type="password" placeholder="비밀번호 확인"></input>
    <input id="submit" class="wr_form_btn wr_btn wr_btn_blue" type="submit" value="저장"></input>
</form>
