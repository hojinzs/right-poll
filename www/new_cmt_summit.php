<!-- POST COMMENT -->
<div class="cmt_window row">
        <form name="comment_form" id="comment_form">
    <?php if ($tg=="elct") { # 당선자에 달리는 댓글일 경우 ?>
    <input type="hidden" id="target" name="target" value="elct">
    <input type="hidden" id="elected" name="elected_id" value="<?php echo $elected['id'] ?>">
    <?php } ?>
    <?php if ($tg=="pol") { # 당선자에 달리는 댓글일 경우 ?>
    <input type="hidden" id="target" name="target" value="pol">
    <input type="hidden" id="elected" name="elected_id" value="<?php echo $elected['id'] ?>">
    <input type="hidden" id="policy" name="policy_id" value="<?php echo $policy['id'] ?>">
    <?php } ?>
    <input type="hidden" id="parents" name="parents" value="<?php echo $prt_cmt; ?>">
            <div class="wr_form_comment col-md-10 col-xs-12">
                <label for="nickname" class="sr-only">닉네임</label>
                <input id="nickname" class="wr_nick_input" name="nickname" placeholder="닉네임">
                <div class="wr_user_ip go_right">
                    <span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span>
                    <?php echo $_SESSION['ip'];?>
                </div>
                <label for="content" class="sr-only">한마디 내용</label>
                <textarea type="text" id="content" name="content" class="wr_comment_input" rows="4" resize="none" placeholder="나의 한마디"></textarea>
            </div>
            <div class="wr_form_comment_btn col-md-2 col-xs-12">
                <button type="button" id="summit_comment" class="wr_comment_btn">남기기</button>
            </div>
        </form>

</div>
