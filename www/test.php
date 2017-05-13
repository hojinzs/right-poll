<?php require_once __DIR__ . '/../core/init.php';?>

<?php
$title = "TEST";
include 'head.php';

$a = \App\Common::getPolicyInfo(2);
var_dump($a);

?>
