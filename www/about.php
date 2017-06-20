<?php require_once __DIR__ . '/../core/init.php';

// 기본 메타데이터 (타이틀, 설명) 세팅
$title = "실시간 공약이행률";
$desc = "여러분의 도움이 필요합니다.";

$md_file =

//오픈그래프 데이터 세팅 (head.php에서 사용)
$og['title'] = $title;
$og['desc'] = $desc;
$og['url'] = "http://policy.lenscat.in/about.php";
$og['img'] = "";

//about.md 파일을 HTML로 변환하여 뿌려줌.
$text = file_get_contents("./md/about.md");
use Michelf\MarkdownExtra;
$html = MarkdownExtra::defaultTransform($text);

?>

<HTML>
<?php include 'head.php'; ?>
<BODY>
<?php include 'new_nav.php'; ?>

<div class="container contents-box">
    <div class="row">
        <div class="wr_contents col-md-12">
            <?=$html;?>
        </div>
    </div>
</div>
<?php include 'new_footer.php'; ?>
</BODY>
</HTML>
