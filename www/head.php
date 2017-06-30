
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

    <?php if (isset($title)): ?>
        <title><?=$title?></title>
    <?php else: ?>
        <title>공약 이행률</title>
    <?php endif; ?>

    <?php if(isset($desc)): ?>
        <meta name="description" content="<?=$desc?>">
    <?php endif; ?>

    <!-- 파비콘 -->
    <link rel="shortcut icon" href="/asset/favicon.ico"/>

    <!-- 오픈그래프 설정 -->
    <?php
    if (isset($og)):
        # 설정이 되어 있을 경우($og 값이 넘어왔다면)
    ?>
        <meta property="og:title" content="<?=$og['title']?>" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="<?=$og['desc']?>">
        <meta property="og:url" content="<?=$og['url']?>" />
        <meta property="og:image:url" content="<?=$og['img']?>" />
    <?php
    else:
        # 설정이 안되어 있을 경우 (기본값)
    ?>
        <meta property="og:title" content="공약이행률" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="공약을 얼마나 이행하였는지 확인해주세요.">
        <meta property="og:url" content="http://policy.lenscat.in" />
        <meta property="og:image:url" content="http://i1.ruliweb.daumcdn.net/uf/image/U01/ruliweb/576299D84B6F630005" />
    <?php
    endif;
    ?>

</HEAD>
