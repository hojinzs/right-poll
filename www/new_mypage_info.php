<?php
/**
 * 사용자 정보 확인 / 수정
 * @param var $_SESSION['user_id'] 사용자 ID
 */

// 사용자 정보 불러오기
$myinfo = \User\Common::getUserInfomation($_SESSION['user_id']);

?>
<div class="hidden" >
    <input id="publickey" style="display:none"></input>
</div>

<form id="form_myinfo" class="wr_form" action="./pst/user/edit_userinfo.php" method="post">
    <input class="wr_form_input" id="user_id" name="user_id" hidden="hidden" value="<?=$_SESSION['user_id']?>"></input>
    <h2>회원정보 수정</h2>
    <label for="user_id">ID (수정 불가)</label>
    <input class="wr_form_input" type="text" placeholder="5~20자 (영문)" value="<?=$myinfo['user_id']?>" disabled></input>

    <label for="nick">닉네임</label>
    <input id="nick" class="wr_form_input" name="nick" type="text" placeholder="2~12자 (대소문자/한글)" value="<?=$myinfo['nick']?>"></input>

    <label for="email">이메일</label>
    <input id="email" class="wr_form_input" name="email" type="email" placeholder="이메일 (정보 수신 / 비밀번호 찾기 용도)" value="<?=$myinfo['email']?>"></input>

    <input class="wr_form_btn wr_btn wr_btn_blue" type="submit" value="저장"></input>
</form>

<form id="form_pw" class="wr_form" action="/pst/user/edit.php" method="post">
    <input id="pw_user_id" class="wr_form_input" name="user_id" hidden="hidden" value="<?=$_SESSION['user_id']?>"></input>

    <h2>비밀번호 수정</h2>
    <input id="password" class="wr_form_input" name="password" type="password" placeholder="비밀번호"></input>
    <input id="password_repeat" class="wr_form_input" type="password" placeholder="비밀번호 확인"></input>
    <input class="wr_form_btn wr_btn wr_btn_blue" type="submit" value="저장"></input>
</form>
