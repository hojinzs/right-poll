<?php require_once __DIR__ . '/../core/init.php';?>

<?php
$policy = \App\Common::getPolicyInfo($_GET['pol']);
$menu = $_GET['mnu'];

$elected = \App\Common::getElectedInfo($policy['elected_id']);
$plans = \App\Common::getPlanList($policy['id']);
$title = "공약정보".$elected['chair']."-".$elected['name'];
?>

<HTML>

<?php include 'head.php';?>
<BODY>
<?php include 'new_nav.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-2">
<?php include 'new_elected_menu.php' ?>
        </div>
        <div class="col-md-10">
            <div class="row">
                    <div class="plan_info col-md-12 col-xs-12">
                        <span class="label label-primary"><?php echo $policy['label']; ?></span>
                        <h2><?php echo $policy['title']?></h2>
                        <button type="button" class="btn btn-primary" id="set_thumbsup" value="<?php echo $policy['id'] ?>"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
    좋아요</button> <?php echo $policy['likesum'] ?>명이 이 공약을 좋아합니다.
    <?php include 'planlist.php' ?>
                    </div>
                <!-- <div class="col-md-12 col-xs-12"> -->
                <ul class="wr_pol_menu col-md-12 col-xs-12">
                    <li class="active"><a href="#">한마디</a></li>
                    <li><a href="#">소식</a></li>
                    <li><a href="#">이행평가</a></li>
                </ul>
                <!-- </div> -->
                <div class="wr_contents col-md-12 col-xs-12">
<?php

switch ($menu) {
    case 'comment':
        # 코멘트 페이지를 출력

        include 'new_policy_cmt.php';

        break;

    default:
        # 기본: 코멘트 페이지를 출력

        include 'new_policy_cmt.php';
        
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
