<?php require_once __DIR__ . '/../core/init.php';?>

<?php
$policy = \App\Common::getPolicyInfo($_GET['pol']);

$elected = \App\Common::getElectedInfo($policy['elected_id']);
$plans = \App\Common::getPlanList($policy['id']);

// 기본 메타데이터 (타이틀, 설명) 세팅
$title = $elected['name']."님의 공약";
$desc = $policy['title'];

//오픈그래프 데이터 세팅 (head.php에서 사용)

$og['title'] = $title;
$og['desc'] = $desc;
$og['url'] = "http://policy.lenscat.in/@".$elected['url'].$policy['id'];
$og['img'] = $elected['profile'];

?>

<HTML>

<?php include 'head.php';?>
<BODY>
<?php include 'new_nav.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-2">
<?php include 'new_elected_menu.php'; ?>
        </div>
        <div class="col-md-10">
            <div class="row">

                <div class="plan_info col-md-12 col-xs-12">
                    <ol class="wr_breadcrumb">
                        <il><a href="/@<?php echo $elected['url']?>">공약 목록</a></il>
                        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                        <il class="planname"><?php echo $policy['title']?></il>
                    </ol>
                    <hr>
                    <span class="wr_label wr_label_blue"><?php echo $policy['label']; ?></span>
                    <h2><?php echo $policy['title']?></h2>
                    <button type="button" class="btn btn-primary" id="set_thumbsup" value="<?php echo $policy['id'] ?>">
                        <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>좋아요
                    </button> <?php echo $policy['likesum'] ?>명이 이 공약을 좋아합니다.
                    <hr>
<?php include 'new_planlist.php' ?>
                </div>

                <div class="wr_box col-md-12 col-xs-12">
                    <h3>공약 평가</h3>
<?php include 'new_policy_rate.php'; ?>
                </div>

                <div class="wr_box np col-md-12 col-xs-12 ">
                    <h3>한마디</h3>
<?php
$tg="pol"; $prt_cmt=null;
include 'new_cmt_summit.php';
include 'new_cmt_lst.php';
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
