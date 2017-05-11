<?php require_once __DIR__ . '/../core/init.php';?>

<?php
$title = "약속을 했으면 지켜야지?";
?>

<HTML>
<?php include 'head.php';?>
<BODY>
<?php include 'nav.php'; ?>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 id="pagetitle">약속을 했으면 지켜야지?<h1>
                    <h4>우리가 직접 감시하는 당선자 공약 이행 현황</h4>
                </div>
            </div>
        </div>
    </header>

    <div class="wr-wrapper container">
        <div class="row">
<?php
$elected_list = \App\Common::getElectedList();
foreach ($elected_list as $num)
{
?>
              <div class="col-xs-12 col-md-3">
                  <div id="wb_ElectedCard">
                    <img class="thum_img img-responsive" src="http://placehold.it/500x500">
                    <div id="info">
                        <h4><?php echo ($num['name']); ?></h4>
                        <p><?php echo ($num['chair']); ?></p>
                        <a href="/elected_info.php?id=<?php echo ($num['id']); ?>" class="btn btn-primary" role="button">공약 보기</a>
                    </div>
                </div>
              </div>
<?php
}
?>
        </div>
    </div>
  <footer>
  </footer>
</BODY>
</HTML>
