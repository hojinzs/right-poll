<?php require_once __DIR__ . '/../core/init.php';

$elected_list = \App\Common::getElectedList();

$title = "약속을 했으면 지켜야지?";
$desc = "우리가 직접 감시하는 당선자 공약 이행 현황";

?>

<HTML>
<?php include 'head.php';?>
<BODY>
<?php include 'new_nav.php'; ?>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 id="pagetitle">(NEW)약속을 했으면 지켜야지?<h1>
                    <h4>우리가 직접 감시하는 당선자 공약 이행 현황</h4>
                </div>
            </div>
        </div>
    </header>

    <div class="wr-wrapper container">
        <div class="row">
            <?php foreach ($elected_list as $num): ?>
              <div class="col-xs-12 col-md-3">
                  <div class="wr_ElectedCard">
                    <img class="thum_img img-responsive" src="<?=FILE.$num['profile']?>">
                    <div class="info">
                        <h4><?=($num['name']); ?></h4>
                        <p><?=($num['chair']); ?></p>
                        <a href="/el/<?=($num['url']);?>" class="btn btn-primary" role="button">공약 보기</a>
                    </div>
                </div>
              </div>
            <?php endforeach;?>
        </div>
    </div>
  <footer>
  </footer>
</BODY>
</HTML>
