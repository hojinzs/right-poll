<?php require_once __DIR__ . '/../core/init.php';

// 당선자 정보를 가져옴
$elected = \App\Common::getElectedInfo($_GET['id']);

// 당선자가 존재하는지 않는다면, 404 페이지로 이동
if($elected==null){
    header('Location:/404.php');
}

// 메뉴 세팅
$mnu = "pol";
if(isset($_GET['mnu'])){
    $mnu = $_GET['mnu'];
}

// 기본 메타데이터 (타이틀, 설명) 세팅
$title = "공약지킴이::".$elected['chair']."-".$elected['name'];
$desc = $elected['chair'].$elected['name']."님의 공약 정보를 확인해보세요!";

//오픈그래프 데이터 세팅 (head.php에서 사용)

$og['title'] = $title;
$og['desc'] = $desc;
$og['img'] = FILE.$elected['profile'];

?>

<HTML>
<?php include 'head.php'; ?>
<BODY>
<?php include 'new_nav.php'; ?>

<div class="container contents-box">
    <div class="row">
        <div class="col-md-3">
            <?php include 'new_elected_menu.php' ?>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="wr_contents col-md-12">
                    <?php
                    switch ($mnu) {
                        case 'pol':
                            # 공약 목록일 경우, 공약 리스트를 include
                            include 'new_elected_pollist.php';
                            break;

                        case 'info':
                            # 정보일 경우, 당선자 정보를 include
                            include 'new_elected_info.php';
                            break;

                        case 'cmt':
                            # 한마디일 경우, 댓글 리스트를 include
                            $for="elct"; $cmt_target=$elected['url']; include 'new_cmt_submit.php';
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
<?php include 'new_footer.php'; ?>
</BODY>
</HTML>
