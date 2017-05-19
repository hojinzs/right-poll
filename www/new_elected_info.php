<?php require_once __DIR__ . '/../core/init.php';?>
<?php

$electedid = $_GET['id'];
$info = \App\Common::getElectedInfo($electedid);
$elected_name = $info['name'];
$elected_chair = $info['chair'];
$title = "공약정보::$elected_chair-$elected_name";
?>

<HTML>
<?php include 'head.php'; ?>

<BODY>

<?php include 'nav.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
<?php include 'new_elected_menu.php' ?>
        </div>
        <div class="col-md-9">
<?php include 'elected_pollist.php' ?>
        </div>
    </div>
</div>
<footer>
</footer>
</BODY>
</HTML>
