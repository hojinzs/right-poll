<?php require_once __DIR__ . '/../core/init.php';?>
<?php

$elected = \App\Common::getElectedInfo($_GET['id']);
$title = "공약정보::".$elected['chair']."-".$elected['name'];
?>

<HTML>
<?php include 'head.php'; ?>
<head>
    <link rel="stylesheet" href="style/n_site.css">
    <link rel="stylesheet" href="http://www.w3ii.com/lib/w3.css">
    <!-- w3.css intro:: http://www.w3im.com/ko/w3css/default.html -->
</head>

<BODY>

<?php include 'new_nav.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-2">
<?php include 'new_elected_menu.php' ?>
        </div>
        <div class="col-md-10 wr_contents ">
<?php include 'new_elected_pollist.php' ?>
        </div>
    </div>
</div>
<footer>
</footer>
</BODY>
</HTML>
