<?php require_once __DIR__ . '/../core/init.php';?>
<?php
$title = "TEST";
include 'head.php';

function foo($pstdCmt){
    $query =
    "INSERT INTO rightpoll.policy_cmt_c (pol_id, cmt_sum)
    VALUES (:id, '1') ON DUPLICATE KEY
    UPDATE cmt_sum = cmt_sum + 1
    ";

    $stmt = \db()->prepare($query);
    $stmt->bindParam(':id', $pstdCmt);
    $stmt->execute();
}

$pstdCmt=3;
foo($pstdCmt);
