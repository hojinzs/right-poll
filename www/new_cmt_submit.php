<?php

// POST COMMENT CONTROLLER
/**
 * 코멘트 작성 폼.
 * @param var $for 댓글이 달리는 곳 (elct,pol,...)
 * @param int $prt_cmt 상위 코멘트 ID
 * @param var $cmt_target 코멘트 폼 제출시, 폼 식별자
 * $for = elct일 경우, $elected(당선자 정보)필요
 * $for = pol일 경우, $policy(공약 정보)
 */

switch ($for) {
    case 'elct':
        # 당선자에 달리는 댓글일 경우
        $target_type="elected";
        $target_id=$elected['id'];
        break;

    case 'pol':
        # 당선자에 달리는 댓글일 경우
        $target_type="policy";
        $target_id=$policy['id'];
        break;

    default:
        # code...
        break;
}

// switch nickname input by login_type
$hidden = "";
if($_SESSION['login_type']=='user'){
	$hidden = "hidden";
}

?>

<!-- POST COMMENT -->
<div class="cmt_window row">
    <form name="comment_form" id="comment_form_<?=$cmt_target?>">
        <input type="hidden" id="target" name="target" value="<?=$target_type?>">
        <input type="hidden" id="target_id" name="target_id" value="<?=$target_id?>">
        <?php if(isset($prt_cmt)):?>
            <input type="hidden" id="parents" name="parents" value="<?=$prt_cmt; ?>">
        <?php endif;?>
        <div class="wr_form_comment col-md-10 col-xs-12">
        	<div class="wr_nickname" <?=$hidden?>>
	            <label for="nickname" class="sr-only">닉네임</label>
	            <input id="nickname" class="wr_nick_input" name="nickname" placeholder="닉네임" value="<?=$_SESSION['user_nick']?>">
	            <div class="wr_user_ip go_right">
	                <span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span>
	                <?=$_SESSION['ip'];?>
	            </div>
            </div>
            <label for="content" class="sr-only">한마디 내용</label>
            <textarea type="text" id="content" name="content" class="wr_comment_input wr_comment_input_<?=$cmt_target?>" rows="4" resize="none" placeholder="나의 한마디"></textarea>
        </div>
        <div class="wr_form_comment_btn col-md-2 col-xs-12">
            <button type="button" id="summit_comment" class="wr_comment_btn submit_comment" cmt-target="<?=$cmt_target?>">남기기</button>
            <div class="wr_content_count remaining" count-target="<?=$cmt_target?>"><span class="count">300</span>/300</div>
        </div>
    </form>
</div>
