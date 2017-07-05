<?php require_once __DIR__ . '/../core/init.php';



$nick = "asdfasdfasdfasdfasdf";
$mb_nick = mb_strimwidth($nick, '0', '30','','utf-8');
echo $mb_nick;
