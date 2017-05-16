<?php require_once __DIR__ . '/../core/init.php';?>

<?php

$pol_id = $_POST['pol_id'];
$return = \App\Control::setThumbsUp($pol_id);

switch($return){
    case "success":
        $message="공약을 '좋아요' 하셨습니다.";
        break;
    case "liked":
        $message="이미 '좋아요'한 공약입니다.";
        break;
}

echo $message;
