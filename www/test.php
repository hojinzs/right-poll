<?php require_once __DIR__ . '/../core/init.php';?>
<?php
$title = "TEST";
include 'head.php';

$cmt1 = "10.1.1.1";
$cmt1 = \App\Str::replaceIpAddress($cmt1);

echo $cmt1;
echo "<hr>";

$array = array(
    "10.1.1.1",
    "10.2.1.1",
    "10.3.1.1",
    "10.4.1.1",
    "10.5.1.1");

print_r($array);

echo "<hr>";

foreach ($array as $cmt) {
# IP주소 가림 처리
echo "$cmt ->";
$cmt = \App\Str::replaceIpAddress($cmt);
echo "$cmt <br>";
}

echo "<hr>";

print_r($array);
