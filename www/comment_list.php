<!-- POST COMMENT -->

<div class="row">
    <div class="wr-comment center-block">
        <form class="form">
            <div class="form_comment_header form-group">
                    <label for="comment">닉네임</label> ABCDE
                        <div class="go_right">
                            YOUR IP: xxx.xxx.xxx.xxx
                        </div>
            </div>
            <div class="form-group">
                    <label for="comment" class="sr-only">한마디</label>
                    <textarea type="text" class="form-control" rows="4" cols="35" id="comment" placeholder="나의 한마디"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-block">남기기</button>
            </div>
        </form>
    </div>
</div>

<!-- COMMENT LIST -->
<div class="row">
    <div class="comment_list">
<?php
$cmts = \App\Common::getCommentList($info['id']);
foreach ($cmts as $cmt)
{

    if ($cmt['comment_id'] == $cmt['id']) // 댓글일 경우
    { ?>
            <div class="comment_header">
<?php echo $cmt['id'] ?>
                <div class="go_right">
                    IP: xxx.xxx.xxx.xxx
                </div>
            </div>
            <div class="comment_area">
<?php echo $cmt['content'] ?>
            </div>
            <div class="comment_info">
                <div class="comment_report">
<?php echo $cmt['created_at']?> | 신고
                </div>
                <div class="comment_recommend">
                    <button>좋아요</button>
                    <button>싫어요</button>
                </div>
            </div>
<?php
    } else {
// 대댓글일 경우
?>
            <div class="add_comment_list">
                <div class="add_comment_header">
<?php echo $cmt['id'] ?>
                    <div class="go_right">
                        IP: xxx.xxx.xxx.xxx
                    </div>
                </div>
                <div class="add_comment_area">
<?php echo $cmt['content']?>
                </div>
                <div class="add_comment_info">
                    <div class="add_comment_report">
<?php echo $cmt['created_at']?> | 신고
                    </div>
                    <div class="add_comment_recommend">
                        <button>좋아요</button>
                        <button>싫어요</button>
                    </div>
                </div>
            </div>
    <?php
    }
    ?>
<?php
}
?>
    </div>
</div>
