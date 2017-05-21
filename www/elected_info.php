<?php require_once __DIR__ . '/../core/init.php';?>
<?php

$elected = \App\Common::getElectedInfo($_GET['id']);
$title = "공약정보::".$elected['chair']."-".$elected['name'];
?>

<HTML>
<?php include 'head.php'; ?>

<BODY>

<?php include 'nav.php'; ?>

<?php include 'elected_header.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
<?php include 'elected_menu.php' ?>
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
