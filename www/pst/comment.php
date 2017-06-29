<?php require_once __DIR__ . '/../../core/init.php';

$setComment['owner_type'] = $_POST['target'];
$setComment['owner_id'] = $_POST['target_id'];
$setComment['nickname'] = $_POST['nickname'];
$prepareComment = mb_strimwidth($_POST['content'],0,300,'','utf-8');
$setComment['content'] = $prepareComment;
$setComment['parents_id'] = $_POST['parents'];

$return = \App\Control::setComment($setComment);

\App\User::setGuestUserNick($setComment['nickname']);

$msg ="Message\nResult:";

foreach ($return as $i) {
    $msg = $msg.$i."\n";
}

echo $msg;
