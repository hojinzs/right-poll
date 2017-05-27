<?php require_once __DIR__ . '/../core/init.php';?>
<?php

$elected = \App\Common::getElectedInfo($_GET['id']);
$mnu = $_GET['mnu'];
$title = "공약정보::".$elected['chair']."-".$elected['name'];
?>

<HTML>
<?php include 'head.php'; ?>

<BODY>

<?php include 'new_nav.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-2">
<?php include 'new_elected_menu.php' ?>
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="wr_contents col-md-12">
<?php
switch ($mnu) {
    case 'pol':
        # 공약 목록일 경우, 공약 리스트를 include
        include 'new_elected_pollist.php';
        break;

    case 'cmt':
        # 한마디일 경우, 댓글 리스트를 include
        $tg="elct"; $prt_cmt=null;
        include 'new_cmt_summit.php';
        include 'new_cmt_lst.php';
        break;

    default:
        # 지정이 없을 경우, 공약 리스트를 include
        include 'new_elected_pollist.php';
        break;
}
?>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
</footer>
</BODY>
</HTML>
