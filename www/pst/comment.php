<?php require_once __DIR__ . '/../../core/init.php';?>
<?php

$setComment['target'] = $_POST['target'];

switch ($setComment['target']) {
    case 'elct':
        $setComment['elected_id'] = $_POST['elected_id'];
        break;

    case 'pol':
        $setComment['elected_id'] = $_POST['elected_id'];
        $setComment['policy_id'] = $_POST['policy_id'];
        break;

    default:
        # 타겟이 잘못되었을 경우
        break;
}

$setComment['nickname'] = $_POST['nickname'];
$setComment['content'] = $_POST['content'];


$return = \App\Control::setComment($setComment);

$msg ="Message\nResult:";

foreach ($return as $i) {
    $msg = $msg.$i."\n";
}

echo $msg;
