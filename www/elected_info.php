<?php require_once __DIR__ . '/../core/init.php';?>
<?php

$electedid = $_GET['id'];
$info = \App\Common::getElectedInfo($electedid);
// $info = get_elected_info($_GET['id']);
$elected_name = $info['name'];
$elected_chair = $info['chair'];
$title = "공약정보::$elected_chair-$elected_name";
?>

<HTML>

<?php include 'head.php'; ?>

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
                          <h1 id="pagetitle"><?php echo $elected_name; ?><br></h1>
                      </div>
                      <div class="col-xs-12">
                          <h4><?php echo $elected_chair; ?></h4>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </header>

    <div class="wr-wrapper">
        <div class="container">
            <div class="row">
<?php
$polecat = \App\Common::getPolecatList($electedid);
foreach ($polecat as $num)
{
?>
              <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-8">
                        <h4><?php echo $num['label']?></h4>
                        <p><?php echo $num['desc']?></p>
                      </div>
                      <div class="col-md-4">
                        <p>전체 이행률</p>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;">0%</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <ul class="list-group">
<?php
$policy = \App\Common::getPolicyList($num['id']);
foreach ($policy as $polnum) {
?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-7 col-xs-9"><?php echo $polnum['title'];?> | <span class="like"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>100</span></div>
                            <div class="col-md-1 col-xs-3">
                                <button type="button" class="btn btn-default btn-xs">
                                    <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> 좋아요
                                </button>
                            </div>
                            <div class="col-md-4 col-xs-12">[공약이행평가]</div>
                        </div>
                    </li>
<?php
}
?>
                  </ul>

              </div>

<?php
}
?>

          </div>
      </div>
  </div>
  <footer>
  </footer>
</BODY>
</HTML>
