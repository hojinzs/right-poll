<?php require_once __DIR__ . '/../core/init.php';

## validation

$policy = \App\Common::getPolicyInfo($_GET['pol']);
//공약 번호가 올바르지 않다면, 404 페이지로 이동
if($policy==null){
     header('Location:/404.php');
     return;
}

$elected = \App\Common::getElectedInfo($_GET['id']);
//후보자 정보와 공약 정보가 일치하지 않다면, 404 페이지로 이동.
if($policy['elected_id']!=$elected['id']){
    header('Location:/404.php');
}

//세부 공약 내용을 불러옴
$plans = \App\Common::getPlanList($policy['id']);

//메뉴 세팅
$mnu = "pol";

// 기본 메타데이터 (타이틀, 설명) 세팅
$title = $elected['name']."님의 공약";
$desc = $policy['title'].$policy['like_c']."명이 이 공약을 좋아하며, ".$policy['cmt_c']."명이 이 공약에 대해 이야기하고 있습니다.";

//오픈그래프 데이터 세팅 (head.php에서 사용)

$og['title'] = $title;
$og['desc'] = $desc;
$og['img'] = $elected['profile'];

?>

<HTML>
<?php include 'head.php';?>
<BODY>
<?php include 'new_nav.php'; ?>

<div class="container contents-box">
    <div class="row">
        <div class="col-md-3">
            <?php include 'new_elected_menu.php'; ?>
        </div>
        <div class="col-md-9">
            <div class="row">

                <div class="plan_info col-md-12 col-xs-12">
                    <ol class="wr_breadcrumb">
                        <il><a href="/el/<?php echo $elected['url']?>">공약 목록</a></il>
                        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                        <il class="planname"><?php echo $policy['title']?></il>
                    </ol>
                    <hr>
                    <div class="plan_detail">
                        <span class="wr_label wr_label_blue"><?php echo $policy['label']; ?></span>
                        <h2><?php echo $policy['title']?></h2>
                        <span class="wr_comment_c">
                            <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                            <?php echo $policy['cmt_c'] ?>명이 이 공약에 대해 이야기하고 있으며
                        </span><br>
                        <span class="wr_like_c">
                            <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                            <?php echo $policy['like_c'] ?>명이 이 공약을 좋아합니다.
                        </span><br>
                        <button type="button" class="wr_btn wr_btn_heart" id="set_thumbsup" value="<?php echo $policy['id'] ?>">
                            <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                            공약 좋아요
                        </button>
                    </div>
                    <hr>
                        <?php include 'new_planlist.php' ?>
                    <hr>
                    <div class="plan_report">
                        공약 내용에 문제가 있나요? 잘못된 내용이나 오타가 있나요?<br>
                        <a class="wr_btn wr_btn_caution" href="https://docs.google.com/forms/d/e/1FAIpQLScq4yO2P8PvuDL2DKlgmA7w4hOkRxFHkBgpX42t77BR1YI4Fg/viewform?usp=pp_url&entry.1471402073=<?=$policy['id']?>" target="_blank">
                            <i class="fa fa-bug" aria-hidden="true"></i>의견 보내기
                        </a>
                    </div>
                </div>

                <div class="wr_box col-md-12 col-xs-12">
                    <h3>공약 평가</h3>
<?php include 'new_policy_rate.php'; ?>
                </div>

                <div class="wr_box np col-md-12 col-xs-12 ">
                    <h3>한마디</h3>
                        <?php
                        $for="pol"; $prt_cmt=null; $cmt_target="pol".$policy['id']; include 'new_cmt_submit.php';
                        include 'new_cmt_lst.php';
                        ?>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include 'new_footer.php'; ?>
</BODY>
</HTML>
