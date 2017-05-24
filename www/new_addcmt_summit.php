<!-- ADD POST COMMENT -->

    <div class="wr-comment center-block">
        <form name="add_comment_form" id="add_comment_form_<?php echo $prt_cmt ?>">
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
            <div class="form_comment_header">
                <label for="user">한마디 작성</label>
                <div class="go_right">
                    YOUR IP: <?php echo $_SESSION['ip'];?>
                </div>
            </div>
                <label for="nickname" class="sr-only">닉네임</label>
                <input id="nickname" class="form-control" name="nickname" placeholder="닉네임">
                <label for="content" class="sr-only">한마디 내용</label>
                <textarea type="text" id="content" name="content" class="form-control" rows="4" cols="35" placeholder="나의 한마디"></textarea>
                <button type="button" id="summit_add_comment_<?php echo $prt_cmt ?>" class="btn-block" onclick="$(this).addComment_click('<?php echo $prt_cmt ?>');">남기기</button>
        </form>
    </div>
