<?php require_once __DIR__ . '/../core/init.php';?>

<?php
$title = "TEST";
include 'head.php';

$pol_id=2;
$elected_id=2;

$i = \App\Common::getCommentList($elected_id);
var_dump($i);

?>
