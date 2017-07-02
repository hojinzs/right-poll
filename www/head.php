<?php

// 기본 설정

$opengraph['title'] = "공약이행률";
$opengraph['type'] = "website";
$opengraph['description'] = "누구나 참여하는 공약 이행 평가, 직접 민주주의 실현";
$opengraph['url'] = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$opengraph['image'] = $_SERVER['HTTP_HOST']."/asset/logo.png";

if(!isset($title)){
    $title="공약이행률";
}

if(!isset($desc)){
    $dec="누구나 참여하는 공약 이행 평가, 직접 민주주의 실현";
}

if(isset($og)){
    # $og 값이 넘어왔다면 덮어쓰기
}
?>


<HEAD>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/common.js"></script>

    <!-- bootstrap.css intro:: http://bootstrapk.com -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- w3.css intro:: http://www.w3im.com/ko/w3css/default.html -->
    <link rel="stylesheet" href="css/w3.css">

    <!-- Font Awesome intro:: http://fontawesome.io -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- custom css stylesheet -->
    <link rel="stylesheet" href="style/wr_common.css">
    <link rel="stylesheet" href="style/site.css">
    <link rel="stylesheet" href="style/n_site.css">
    <link rel="stylesheet" href="style/article.css">

    <!-- Webfont -->
    <link rel="stylesheet" href="//fonts.googleapis.com/earlyaccess/nanumgothic.css">

    <!-- 기본 메타정보 -->
    <title><?=$title?></title>
    <meta name="description" content="<?=$desc?>">

    <!-- 파비콘 -->
    <link rel="shortcut icon" href="/asset/favicon.ico"/>

    <!-- 오픈그래프 설정 -->
    <meta property="og:title" content="<?=$opengraph['title']?>" />
    <meta property="og:type" content="<?=$opengraph['type']?>" />
    <meta property="og:description" content="<?=$opengraph['description']?>">
    <meta property="og:url" content="<?=$opengraph['url']?>"/>
    <meta property="og:image:url" content="<?=$opengraph['image']?>" />

</HEAD>
