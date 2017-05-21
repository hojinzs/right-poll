<?php require_once __DIR__ . '/../core/init.php';?>
<?php
$title = "TEST";
include 'head.php';


$pstd=60;
$pstdComment = \App\Common::getCommentInfo($pstd);

if($pstdComment['comment_id'] == null){
    $query =
    "UPDATE rightpoll.comment
    SET comment_id =:id
    WHERE id=:where_id;
    ";

    $stmt = \db()->prepare($query);
    $stmt->bindParam(':id', $pstdComment['id']);
    $stmt->bindParam(':where_id', $pstdComment['id']);
    $stmt->execute();

    echo 'get\n';
}

echo 'not get\n';
print_r($pstdComment);
