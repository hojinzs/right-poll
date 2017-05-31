<?php require_once __DIR__ . '/../../core/init.php';?>

<?php

$cmt_id = $_POST['cmt_id']; # 평가할 대상 코멘트의 id
$stt = $_POST['stt']; # 평가값 (1=좋아요, 2=싫어요)
$return = \App\Control::postCommentRecommend($cmt_id,$stt);

switch($return){
    case "success":
        $message="댓글을 평가 하였습니다.";
        break;
    case "recommended":
        $message="이미 평가한 댓글입니다.";
        break;
    case "error":
        $message="에러 발생";
        break;
}

echo $message;
