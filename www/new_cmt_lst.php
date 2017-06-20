<?php
// 공약 목록 컨트롤러
switch ($tg) {
    case 'elct': # 당선자에 달리는 댓글일 경우
        $get_cmts = \App\Common::getCommentList('elected',$elected['id']);
        break;

    case 'pol':  # 공약에 달리는 댓글일 경우
        $get_cmts = \App\Common::getCommentList('policy',$policy['id']);
        break;
}

$cmt_list = [];

// 가져온 댓글 배열을 다시 배열함.
// cmt_list = 댓글
// c_cmt_list['id'] = 'id'에 해당하는 댓글의 대댓글
foreach ($get_cmts as $tmp_cmt) {

    if ($tmp_cmt['id'] == $tmp_cmt['parents_id']) {
        $cmt_list[$tmp_cmt['id']] = $tmp_cmt;
        $c_cmt_list[$tmp_cmt['parents_id']] = [];
    } else {
        $c_cmt_list[$tmp_cmt['parents_id']][] = $tmp_cmt;
    }

}

// DB에서 가져온 댓글 목록은 메모리에서 삭제
unset($get_cmts);

?>

<!-- PRINT COMMENT LIST -->
<div class="comment_list">
<?php foreach ($cmt_list as $cmt): ?>
    <!-- 댓글을 표시 -->
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
                        댓글 작성
                    </button>
                </div>
                <div class="comment_recommend">
                    <button class="cmt_addmnt">
                        댓글<?= count($c_cmt_list[$cmt['id']])?>
                    </button>
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
            <?php foreach ($c_cmt_list[$cmt['id']] as $c_cmt):?>
                <div class="add_comment" data-parent-cmt-id="<?=$c_cmt['parents_id']?>" _id="add_comment_<?=$c_cmt['parents_id'] ?>">
                    <div class="add_comment_header">
                        <?=$c_cmt['nick'] ?>
                        <div class="wr_user_ip go_right">
                            <span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span><?=$c_cmt['ip'] ?>
                        </div>
                    </div>
                    <div class="add_comment_area">
                        <?=$c_cmt['content']?>
                    </div>
                    <div class="add_comment_report">
                        <?=$c_cmt['created_at']?> | <a href="https://docs.google.com/forms/d/e/1FAIpQLSe5amQrq50d50l8_vrfiOi0xAx9yxVijGmhb-pZalrzy4BKrw/viewform?usp=pp_url&entry.205279347=<?=$c_cmt['id']?>&entry.2128441167=<?=$c_cmt['nick'] ?>&entry.2064394676=<?=$c_cmt['content']?>" target="_blank">신고</a>
                    </div>
                    <div class="add_cmt_btn_set">
                        <div class="add_comment_recommend">
                            <button class="cmt_like" onclick="$(this).postCommentLike_click('<?=$c_cmt['id']?>')">
                                좋아요<?=$c_cmt['lke']?></button>
                            <button class="cmt_dislike" onclick="$(this).postCommentDislike_click('<?=$c_cmt['id']?>')">
                                싫어요<?=$c_cmt['dislke']?></button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
<?php endforeach; ?>
</div>
