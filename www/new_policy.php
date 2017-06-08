<?php require_once __DIR__ . '/../core/init.php';?>

<?php
$policy = \App\Common::getPolicyInfo($_GET['pol']);

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
<?php include 'new_elected_menu.php'; ?>
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
                <div class="wr_box col-md-12 col-xs-12">
                    <h3>공약 평가</h3>
<?php include 'new_policy_rate.php'; ?>
                </div>

                <div class="wr_box col-md-12 col-xs-12">
                    <h3>한마디</h3>
<?php include 'new_policy_cmt.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>

    <footer>
    </footer>
</BODY>
</HTML>
