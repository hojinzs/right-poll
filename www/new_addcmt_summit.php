<!-- ADD POST COMMENT -->
<div class="add_cmt_wraper row">
    <div class="add_cmt_form">
        <form name="add_comment_form" id="add_comment_form_<?php echo $prt_cmt ?>">
        <?php if ($tg=="elct"): # 당선자에 달리는 댓글일 경우 ?>
            <input type="hidden" id="target" name="target" value="elct">
            <input type="hidden" id="elected" name="elected_id" value="<?php echo $elected['id'] ?>">
        <?php endif; ?>
        <?php if ($tg=="pol"): # 당선자에 달리는 댓글일 경우 ?>
            <input type="hidden" id="target" name="target" value="pol">
            <input type="hidden" id="elected" name="elected_id" value="<?php echo $elected['id'] ?>">
            <input type="hidden" id="policy" name="policy_id" value="<?php echo $policy['id'] ?>">
        <?php endif; ?>
            <input type="hidden" id="parents" name="parents" value="<?php echo $prt_cmt; ?>">
            <div class="wr_form_comment col-md-10 col-xs-12">
                <label for="nickname" class="sr-only">닉네임</label>
                <input id="nickname" class="wr_nick_input" name="nickname" placeholder="닉네임" value="<?=$_SESSION['user_nick']?>">
                <div class="wr_user_ip go_right">
                    <span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span>
                    <?php echo $_SESSION['ip'];?>
                </div>
                <label for="content" class="sr-only">한마디 내용</label>
                <textarea type="text" id="content" name="content" class="wr_comment_input" rows="4" resize="none" placeholder="나의 한마디"></textarea>
            </div>
            <div class="wr_form_comment_btn col-md-2 col-xs-12">
                <button type="button" id="summit_add_comment_<?php echo $prt_cmt ?>" class="wr_comment_btn" onclick="$(this).addComment_click('<?php echo $prt_cmt ?>');">남기기</button>
            </div>
        </form>
    </div>
</div>
