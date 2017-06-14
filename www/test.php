<?php require_once __DIR__ . '/../core/init.php';?>
<?php
$title = "TEST";
include 'head.php';

$policy = \App\Common::getPolicyInfo($_GET['pol']);

$elected = \App\Common::getElectedInfo($policy['elected_id']);
$plans = \App\Common::getPlanList($policy['id']);

// 기본 메타데이터 (타이틀, 설명) 세팅
$title = $elected['name']."님의 공약";
$desc = $policy['title'];

//오픈그래프 데이터 세팅 (head.php에서 사용)

$og['title'] = $title;
$og['desc'] = $desc;
$og['url'] = "http://policy.lenscat.in/@".$elected['url'].$policy['id'];
$og['img'] = $elected['profile'];

print_r($policy);
