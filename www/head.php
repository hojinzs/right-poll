<?php

// 타이틀 및 메타데이터 설정
$meta['title']="공약이행률";
$meta['desc']="누구나 참여하는 공약 이행 평가, 직접 민주주의 실현";

// 메타데이터 설정값이 넘어왔을 경우 변경
if(!isset($title)){
    $meta['title']=$title;
}
if(!isset($desc)){
    $meta['desc']=$desc;
}

// (오픈그래프) 기본 설정
$opengraph['title'] = $meta['title'];
$opengraph['type'] = "website";
$opengraph['description'] = $meta['desc'];
$opengraph['url'] = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$opengraph['image'] = $_SERVER['HTTP_HOST']."/asset/logo.png";
$apple_touch_icon = $opengraph['image'];

// (오픈그래프) 오픈그래프 설정값이 넘어올 경우 변경 ($og로 설정한다.)
if(isset($og['title'])){
    $opengraph['title'] = $og['title'];
}
if(isset($og['type'])){
    $opengraph['type'] = $og['type'];
}
if(isset($og['desc'])){
    $opengraph['description'] = $og['desc'];
}
if(isset($og['url'])){
    $opengraph['url'] = $og['url'];
}
if(isset($og['image'])){
    $opengraph['image'] = $og['image'];
}
?>


<HEAD>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-N7VLQPB');</script>
    <!-- End Google Tag Manager -->

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
    <title><?=$meta['title']?></title>
    <meta name="description" content="<?=$meta['desc']?>">

    <!-- 파비콘 -->
    <link rel="shortcut icon" href="/asset/favicon.ico"/>
    <link rel="apple-touch-icon" href="<?=$apple_touch_icon?>"/>

    <!-- 오픈그래프 설정 -->
    <meta property="og:title" content="<?=$opengraph['title']?>" />
    <meta property="og:type" content="<?=$opengraph['type']?>" />
    <meta property="og:description" content="<?=$opengraph['description']?>">
    <meta property="og:url" content="<?=$opengraph['url']?>"/>
    <meta property="og:image:url" content="<?=$opengraph['image']?>" />

</HEAD>
