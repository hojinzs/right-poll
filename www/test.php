<?php require_once __DIR__ . '/../core/init.php';?>
<?php
$title = "TEST";
include 'head.php';

$cmt_id=82;

$query="INSERT INTO rightpoll.comment_rate_c (cmt_id, like)
        VALUES (:id, '1') ON DUPLICATE KEY
        UPDATE like = like + 1";
$stmt = \db()->prepare($query);
$stmt->bindParam(':id', $cmt_id);
$stmt->execute();

return "done";
//
// /**
//  * 댓글의 좋아요 / 싫어요 카운트
//  * @param [type] $cmt_id 코멘트 ID
//  * @param [type] $stt    1=> 좋아요 / 2=> 싫어요
//  */
// function postCommentRecommend($cmt_id,$stt)
// {
//
//     switch ($stt) {
//         case 1:
//             # 좋아요일 경우, rate_c에 like를 +1
//
//             $query="INSERT INTO rightpoll.comment_rate_c (cmt_id, like)
//                     VALUES (:id, '1') ON DUPLICATE KEY
//                     UPDATE like = like + 1";
//
//             break;
//
//         case 2:
//             # 싫어요일 경우, rate_c에 dislike를 +1
//
//             $query="INSERT INTO rightpoll.comment_rate_c (pol_id, likesum)
//                     VALUES (:id, '1') ON DUPLICATE KEY
//                     UPDATE likesum = likesum + 1";
//
//             break;
//
//         default:
//             # 지정이 없을 경우, 에러 리턴
//             return 'Error'
//             break;
//     }
//
//     $stmt = \db()->prepare($query);
//     $stmt->bindParam(':id', $pol_id);
//     $stmt->execute();
//
//     $stmt = \db()->prepare("INSERT INTO rightpoll.like(pol_id, ip, session) VALUES (:id, :ip, :session)");
//     $stmt->bindParam(':id', $pol_id);
//     $stmt->bindParam(':ip', $_SESSION['ip']);
//     $stmt->bindParam(':session', $_SESSION['id']);
//     $stmt->execute();
//
//     return $return;
// }
