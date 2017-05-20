<?php require_once __DIR__ . '/../../core/init.php';?>

<?php


$setComment['elected_id'] = $_POST['elected_id'];
$setComment['content'] = $_POST['content'];
$return = \App\Control::setComment($setComment);

if ($return == "success") {
    $message="success";
} else {
    $message="error";
}

echo $return;
