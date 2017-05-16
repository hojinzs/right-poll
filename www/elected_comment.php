<?php require_once __DIR__ . '/../core/init.php';?>
<?php

$electedid = $_GET['id'];
$info = \App\Common::getElectedInfo($electedid);
$elected_name = $info['name'];
$elected_chair = $info['chair'];
$title = "한마디::$elected_chair-$elected_name";
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
                <div class="col-md-3">
                    <div class="list-group">
                      <a href="/elected_info.php?id=<?php echo $info['id']?>" class="list-group-item">
                          공약 목록
                      </a>
                      <a href="/elected_comment.php?id=<?php echo $info['id']?>" class="list-group-item active">
                          한마디
                      </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder=".col-md-8">
                                </div>
                                <div class="col-md-12">
                                    <div
                                    <div class="col-md-3">
                                        <img class="img-responsive img-rounded" src="http://placehold.it/36x36">
                                        <p>Your IP: <?php echo $_SESSION['ip']?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-primary">Primary</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
  </div>
  <footer>
  </footer>
</BODY>
</HTML>
