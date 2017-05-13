<?php require_once __DIR__ . '/../core/init.php';?>

<?php
$electedid = $_GET['id'];
$policyid = $_GET['pol'];
$elected = \App\Common::getElectedInfo($electedid);
$policy = \App\Common::getPolicyInfo($policyid);
$plans = \App\Common::getPlanList($policyid);
$title = "공약정보".$elected['chair']."-".$elected['name'];
?>

<HTML>

<?php include 'head.php';?>
<BODY>
<?php include 'nav.php'; ?>

<header>
    <div class="container">
        <div class="row">
          <div class="col-md-2 col-xs-8">
            <img class="wr-profile img-responsive img-rounded" src="http://placehold.it/500x500">
          </div>
          <div class="col-md-10 col-xs-12">
              <div class="row">
                  <div class="col-xs-12">
                      <h1 id="pagetitle"><?php echo $elected['name']; ?><br></h1>
                  </div>
                  <div class="col-xs-12">
                      <h4><?php echo $elected['chair']; ?></h4>
                  </div>
              </div>
          </div>
          <div class="col-md-12 col-xs-12">
              <br>
              <button type="button" class="btn" onclick="location.href='/elected_info.php?id=<?php echo $policy['elected_id'] ?>'"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
공약 목록</button>
          </div>
      </div>
  </div>
</header>

    <div class="wr-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <span class="label label-primary"><?php echo $policy['label']; ?></span>
                    <h2><?php echo $policy['title']?></h2>
                    <button type="button" class="btn btn-primary" id="set_thumbsup" value="<?php echo $policy['id'] ?>"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
좋아요</button> <?php echo $policy['likesum'] ?>명이 이 공약을 좋아합니다.
                    <hr>
                </div>
                <div class="col-md-6 col-xs-12">

<?php
foreach ($plans as $plan) {
?>

                    <p><?php echo $plan['name']?></p>
<?php
}
?>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div>
                        <ul class="nav nav-pills">
                            <li role="presentation" class="active"><a href="#">이행평가</a></li>
                            <li role="presentation"><a href="#">소식</a></li>
                            <li role="presentation"><a href="#">한마디</a></li>
                        </ul>
                    </div>
                    <div>
                        <p>준비중입니다.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
    </footer>
</BODY>
</HTML>
