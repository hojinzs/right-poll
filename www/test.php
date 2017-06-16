<?php require_once __DIR__ . '/../core/init.php';?>
<?php
$title = "TEST";
include 'head.php';

$policy = \App\Common::getPolicyInfo(10000);

if($policy['id']==null){
     header('Location:http://naver.com');
}

print_r($policy);
