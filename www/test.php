<?php require_once __DIR__ . '/../core/init.php';?>
<?php
$title = "TEST";
include 'head.php';

// 당선자 정보를 가져옴
$elected = \App\Common::getElectedInfo(4);

// 당선자가 존재하는지 않는다면, 404 페이지로 이동
if($elected==null){
    header('Location:/');
}

print_r($elected);
