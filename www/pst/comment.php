<?php require_once __DIR__ . '/../../core/init.php';

$setComment['owner_type'] = $_POST['target'];
$setComment['owner_id'] = $_POST['target_id'];
$setComment['nickname'] = $_POST['nickname'];
$prepareComment = mb_strimwidth($_POST['content'],0,300,'','utf-8');
$setComment['content'] = $prepareComment;
$setComment['parents_id'] = $_POST['parents'];


// 유저 닉네임을 변경
\App\User::setGuestUserNick($setComment['nickname']);

$return = \App\Control::setComment($setComment);

if($return=="success"){
    # setComment가 success를 반환했다면
    echo $return;

} else {
    # setComment가 success가 아니라면 반환했다면

    $msg ="Message\nResult:";
    foreach ($return as $i) {
        $msg = $msg.$i."\n";
    }
    echo $msg;
}
