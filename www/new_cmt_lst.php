<?php
switch ($tg) {
    case 'elct': # 당선자에 달리는 댓글일 경우
        $cmts = \App\Common::getCommentList('elected',$elected['id']);
        break;

    case 'pol':  # 공약에 달리는 댓글일 경우
        $cmts = \App\Common::getCommentList('policy',$policy['id']);
        break;
}
?>

<!-- PRINT COMMENT LIST -->
<div class="comment_list">
<?php
foreach ($cmts as $cmt):
?>
    <?php
    if ($cmt['parents_id'] == $cmt['id']) : // 댓글일 경우
    ?>
        <div class="comment_main">
            <div class="comment_header">
                <?=$cmt['nick'] ?>
                <div class="wr_user_ip go_right">
                    <span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span><?=$cmt['ip'] ?>
                </div>
            </div>
            <div class="comment_area">
                <?=$cmt['content'] ?>
            </div>
            <div class="comment_report">
                <?=$cmt['created_at']?> | <a href="https://docs.google.com/forms/d/e/1FAIpQLSe5amQrq50d50l8_vrfiOi0xAx9yxVijGmhb-pZalrzy4BKrw/viewform?usp=pp_url&entry.205279347=<?=$cmt['id']?>&entry.2128441167=<?=$cmt['nick'] ?>&entry.2064394676=<?=$cmt['content']?>" target="_blank">신고</a>
            </div>
            <div class="comment_info">
                <div class="comment_openaddbtn">
                    <button class="cmt_addmnt_btn" data-cmt-id="<?=$cmt['id']?>" _onclick="$(this).sh_add_click('<?=$cmt['id'] ?>');">
                        대댓글
                    </button>
                </div>
                <div class="comment_recommend">
                    <button class="cmt_like" onclick="$(this).postCommentLike_click('<?=$cmt['id']?>')">
                        좋아요<?=$cmt['lke']?>
                    </button>
                    <button class="cmt_dislike" onclick="$(this).postCommentDislike_click('<?=$cmt['id']?>')">
                        싫어요<?=$cmt['dislke']?>
                    </button>
                </div>
            </div>
        </div>
        <div class="comment_add" id="comment_add_<?=$cmt['id']?>">
            <?php $prt_cmt=$cmt['id']; include 'new_addcmt_summit.php'; ?>
        </div>
            <?php else: ?>
        <div class="add_comment" data-parent-cmt-id="<?=$cmt['parents_id']?>" _id="add_comment_<?=$cmt['parents_id'] ?>">
            <div class="add_comment_header">
                <?=$cmt['nick'] ?>
                <div class="wr_user_ip go_right">
                    <span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span><?=$cmt['ip'] ?>
                </div>
            </div>
            <div class="add_comment_area">
                <?=$cmt['content']?>
            </div>
            <div class="add_comment_report">
                <?=$cmt['created_at']?> | <a href="https://docs.google.com/forms/d/e/1FAIpQLSe5amQrq50d50l8_vrfiOi0xAx9yxVijGmhb-pZalrzy4BKrw/viewform?usp=pp_url&entry.205279347=<?=$cmt['id']?>&entry.2128441167=<?=$cmt['nick'] ?>&entry.2064394676=<?=$cmt['content']?>" target="_blank">신고</a>
            </div>
            <div class="add_cmt_btn_set">
                <div class="add_comment_recommend">
                    <button class="cmt_like" onclick="$(this).postCommentLike_click('<?=$cmt['id']?>')">
                        좋아요<?=$cmt['lke']?></button>
                    <button class="cmt_dislike" onclick="$(this).postCommentDislike_click('<?=$cmt['id']?>')">
                        싫어요<?=$cmt['dislke']?></button>
                </div>
            </div>
        </div>
    <?php
    endif;
    ?>
<?php
endforeach;
?>
</div>
