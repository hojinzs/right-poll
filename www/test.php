<?php require_once __DIR__ . '/../core/init.php';?>
<?php
$title = "TEST";
include 'head.php';


$i[] = 1;
$i[] = 2;
$i[] = 3;
$i[] = 4;
$i[] = 5;

$msg = "Message \n Result:";
foreach ($i as $j ) {
    $msg = $msg."\n".$j;
}

echo $msg;
