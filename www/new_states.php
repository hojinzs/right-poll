<?php require_once __DIR__ . '/../core/init.php';?>
<?php

// 당선자 정보를 가져옴
$elected = \App\Common::getElectedInfo($_GET['id']);

// 메뉴 세팅
$mnu = null;
if(isset($_GET['mnu'])){
    $mnu = $_GET['mnu'];
}

// 기본 메타데이터 (타이틀, 설명) 세팅
$title = "공약이행:".$elected['chair']."-".$elected['name'];
$desc = $elected['chair'].$elected['name']."님의 n개의 공약중 n개 이행 완료(진행률 x%)";

//오픈그래프 데이터 세팅 (head.php에서 사용)

$og['title'] = $title;
$og['desc'] = $desc;
$og['url'] = "http://policy.lenscat.in/@".$elected['url'];
$og['img'] = $elected['profile'];

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
