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
