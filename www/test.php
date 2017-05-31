<?php require_once __DIR__ . '/../core/init.php';?>
<?php
$title = "TEST";
include 'head.php';

$text = 'abcdefg\n<iframe width="560" height="315" src="https://www.youtube.com/embed/r05qQdpY2nY" frameborder="0" allowfullscreen></iframe>';
echo strip_tags($text);

// <p>,<a>,<br>을 제외한 HTML 코드를 제거
echo strip_tags($text, '<p><a><br>');
