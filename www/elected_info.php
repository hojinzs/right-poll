<?php require_once __DIR__ . '/../core/init.php';?>
<?php

$electedid = $_GET['id'];
$info = \App\Common::getElectedInfo($electedid);
// $info = get_elected_info($_GET['id']);
$elected_name = $info['name'];
$elected_chair = $info['chair'];
$title = "공약정보: $elected_name";
?>

<HTML>

<?php include 'head.php'; ?>

<BODY>

<?php include 'nav.php'; ?>


  <div class="container">

    <header class="row">
      <div class="col-md-2">
        <img src="http://placehold.it/160x160">
      </div>
      <div class="col-md-10">
        <h1 id="pagetitle"><?php echo $elected_name; ?><br></h1>
        <p><?php echo $elected_chair; ?></p>
      </div>
    </header>

    <div id="policy_list">

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
                <p><?php echo $num['description']?></p>
              </div>
              <div class="col-md-4">
                <p>이행률</p>
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
            <li class="list-group-item"><?php echo $polnum['label'];?></li>
<?php
}
?>
          </ul>

      </div>

<?php
}
?>

<!-- 세부 공약 펼침 -->

      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-8">
              <p>공약 카테고리2</p>
              <p>설명</p>
            </div>
            <div class="col-md-4">
              <p>이행률</p>
              <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;">0%</div>
              </div>
            </div>
          </div>
        </div>
        <ul class="list-group">
          <li class="list-group-item">공약1</li>
          <li class="list-group-item">공약2</li>
          <li class="list-group-item">공약3</li>
          <li class="list-group-item">공약4</li>
          <li class="list-group-item">공약5</li>
        </ul>
      </div>

  </div>

  <footer>
  </footer>
</BODY>
</HTML>
