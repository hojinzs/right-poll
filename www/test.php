<?php require_once __DIR__ . '/../core/init.php';?>

<?php
$title = "TEST";
include 'head.php';

$pol_id=2;

$i = \App\Common::isThumbsupAvailable($pol_id);

echo $i == true ? "true" : "false";

echo "<hr>";

$return = \App\Control::setThumbsUp($pol_id);

echo $return;
