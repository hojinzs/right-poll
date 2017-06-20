<?php require_once __DIR__ . '/../core/init.php';

// $title = "TEST";
// include 'head.php';


// 당선자의 댓글 목록을 가져옴.
$cmt = \App\Common::getCommentList('elected',2);

$cmt_list = [];

foreach ($cmt as $tmp_cmt) {
    # 가져온 댓글 배열을 다시 배열함.

    if ($tmp_cmt['id'] == $tmp_cmt['parents_id']) {
        $cmt_list[$tmp_cmt['id']] = $tmp_cmt;
        $c_cmt_list[$tmp_cmt['parents_id']] = [];
    } else {
        $c_cmt_list[$tmp_cmt['parents_id']][] = $tmp_cmt;
    }

}

foreach ($cmt_list as $cmt_as) {
    # 댓글 뿌려줌

        echo $cmt_as['id']." <b>".$cmt_as['nick']."</b>: ".$cmt_as['content']."<br>";
        echo count($c_cmt_list[$cmt_as['parents_id']])."<br>";

        foreach ($c_cmt_list[$cmt_as['parents_id']] as $c_cmt) {

            echo ">>>".$c_cmt['id']." <b>".$c_cmt['nick']."</b>: ".$c_cmt['content']."<br>";
        }

    echo "<hr>";

}
