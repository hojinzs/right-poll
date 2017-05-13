<?php require_once __DIR__ . '/../core/init.php';?>

<?php

$a = $_POST['pol_id'];
\App\Control::setThumbsUp($a);

echo "success";
