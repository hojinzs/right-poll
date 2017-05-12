<?php require_once __DIR__ . '/../core/init.php';?>

<?php
$title = "TEST";
include 'head.php';

$a = 2;
print_r($b = \App\Common::getPolicyInfo($a));

return ;
//
// function callCountUpLike($policy_id)
// {
//     $stmt = \db()->prepare("UPDATE like_c SET likesum = likesum+1 WHERE pol_id = :id");
//     $stmt->bindValue(':id', $policy_id);
//     $stmt->execute();
//     $a = $stmt->fetch();
//
//     return $a;
// }
//
// $a = 3;
// echo callCountUpLike($a);
//
// return ;
//
// /**
//  * [callThumbsUp description]
//  * @param [type] $policy_id [description]
//  * @return [type] [description]
//  */
// function callThumbsUp($policy_id)
// {
//     {
//         $a=null;
//         $b=0;
//
//         /* 해당 ID의 좋아요 기록을 확인한다. */
//         $a = getLikeInfo($policy_id);
//         if ($a==null)
//         {
//             # 좋아요가 없을 경우, INSERT
//             $result = \db()->prepare("INSERT INTO like_c(pol_id) values (1)");
//             $result->bindValue(':id', $policy_id);
//             $result->execute();
//             $c = $result->fetch();
//
//             if($c=null)
//             {
//                 return "DONE";
//             }
//                 return "ERROR::$c";
//         } else {
//             # 좋아요가 있을 경우,
//             $b = "있어";
//         }
//
//         return $b;
//     }
// }
//
//
// function getLikeInfo($policy_id)
// {
//     $stmt = \db()->prepare("SELECT * FROM rightpoll.like_c WHERE pol_id = :id");
//     $stmt->bindValue(':id', $policy_id);
//     $stmt->execute();
//     $a = $stmt->fetch();
// }
//
// function callCountUpLike($policy_id)
// {
//     $stmt = \db()->prepare("UPDATE like_c set likesum = likesum+1 where pol_id = :id");
//     $stmt->bindValue(':id', $policy_id);
//     $stmt->execute();
//     $a = $stmt->fetch();
//
//     return $a;
// }
//
// function newThumbsUp($policy_id)
// {
//     $result = \db()->prepare("INSERT INTO like_c(pol_id) values (1)");
//     $result->bindValue(':id', $policy_id);
//     $result->execute();
//     $c = $result->fetch();
//
//     return $c;
// }
//
// $a = callThumbsUp(2);
// echo $a;
