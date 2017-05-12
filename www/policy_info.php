<?php require_once __DIR__ . '/../core/init.php';?>

<?php
$electedid = $_GET['id'];
$policyid = $_GET['pol'];
$elected = \App\Common::getElectedInfo($electedid);
$policy = \App\Common::getPolicyInfo($policyid);

// $info = get_elected_info($_GET['id']);
$elected_name = $elected['name'];
$elected_chair = $elected['chair'];
$policy_title = $policy['title'];
$title = "세부 공약::$elected_chair-$elected_name";
?>

<HTML>
    <head>
    <script language="javascript">
        function callThumbsUp(){
            var ThumsUp="<?php echo \App\Control::callThumbsUp($policyid);?>";
            alert("이 공약을 좋아하셨습니다.");

        }
    </script>
</head>
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
                      <h1 id="pagetitle"><?php echo $elected_name; ?><br></h1>
                  </div>
                  <div class="col-xs-12">
                      <h4><?php echo $elected_chair; ?></h4>
                  </div>
              </div>
          </div>
          <div class="col-md-12 col-xs-12">
              <br>
              <button type="button" class="btn"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
공약 목록</button>
          </div>
      </div>
  </div>
</header>

    <div class="wr-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <span class="label label-primary">정치</span>
                    <h2><?php echo $policy_title?></h2>
                    <button type="button" class="btn btn-primary" onclick="javascript:callThumbsUp();"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
좋아요</button> 1231명이 이 공약을 좋아합니다.
                    <hr>
                </div>
                <div class="col-md-6 col-xs-12">
                    <p>이행안1</p>
                    <p>이행안2</p>
                    <p>이행안3</p>
                    <p>이행안4</p>
                    <p>이행안5</p>
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
