<?php require_once __DIR__ . '/../core/init.php';

// 기본 메타데이터 (타이틀, 설명) 세팅
$title = "공약지킴이::마이페이지";

?>

<HTML>
<?php include 'head.php'; ?>
<BODY>
<?php include 'new_nav.php'; ?>

<div class="container">
    <div class="row">
        <div class="wr_contents col-md-12">

            <h1>회원가입</h1>

            <form>
                <input name="email" type="email"></input>
                <input name="email" type="submit"></input>
            </form>

        </div>
    </div>
</div>
<?php include 'new_footer.php'; ?>
</BODY>
</HTML>
