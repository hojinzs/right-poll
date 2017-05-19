<?php require_once __DIR__ . '/../../core/init.php';?>

<?php
$setComment['elected_id'] = $_POST['elected_id'];
$setComment['content'] = $_POST['content'];
$return = \App\Control::setComment($setComment);

switch($return){
    case "success":
        $message="공약을 '좋아요' 하셨습니다.";
        break;
    case "liked":
        $message="이미 '좋아요'한 공약입니다.";
        break;
}

echo $message;
