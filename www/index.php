<?php require_once __DIR__ . '/../core/init.php';?>

<?php
$title = "약속을 했으면 지켜야지?";
?>

<HTML>
<?php include 'head.php';?>
<BODY>
  <div class="container">
    <header class="row">
      <div class="col-sm-6">
        <h1 id="pagetitle">약속을 했으면 지켜야지?<br>
        <small>우리가 직접 감시하는 당선자 공약 이행 현황</small></h1>
      </div>
    </header>

<?php include 'nav.php'; ?>

    <div id="elected_list" class="row">

<?php
$elected_list = \App\Common::getElectedList();
foreach ($elected_list as $num)
{
?>
      <div class="col-sm-6 col-md-4">
        <div>
          <img src="http://placehold.it/320x200">
            <div class="caption">
              <h3><?php print_r($num['name']); ?></h3>
              <p><?php print_r($num['chair']); ?></p>
              <p><a href="/elected_info.php?id=<?php print_r($num['id']); ?>" class="btn btn-primary" role="button">공약 보기</a></p>
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
