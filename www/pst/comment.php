<?php require_once __DIR__ . '/../../core/init.php';
/**
 * 코멘트 POST 처리 PHP ($_POST)
 * @param var $target 댓글 등록 대상
 * @param var $target_id 댓글 등록 대상 ID
 */

// 필수값 세팅
$setComment['owner_type'] = $_POST['target'];
$setComment['owner_id'] = $_POST['target_id'];
$setComment['nickname'] = $_POST['nickname'];
$prepareComment = mb_strimwidth($_POST['content'],0,600,'','utf-8');
$setComment['content'] = $prepareComment;

// 부모 코멘트가 있을 경우
if(isset($_POST['parents'])){
        $setComment['parents_id'] = $_POST['parents'];
}

// 게스트일 경우 유저 닉네임을 변경
if ($_SESSION['login_type'] == 'guest') {
    $user_nick = \User\Guest::setGuestUserNick($_POST['nickname']);
}

// setComment에 코멘트 내용 전달
$return = \App\Control::setComment($setComment);

// 반환 처리
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

return;
