
<HEAD>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/common.js"></script>

    <link rel="stylesheet" href="style/site.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/bootstrap-theme.min.css"> -->

    <link rel="stylesheet" href="style/n_site.css">
    <link rel="stylesheet" href="css/w3.css">
    <!-- w3.css intro:: http://www.w3im.com/ko/w3css/default.html -->

    <title><?=$title?></title>
    <meta name="description" content="<?=$desc?>">

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
        # 설정이 안되어 있을 경우
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
