<?php require_once __DIR__ . '/../core/init.php';

// 기본 메타데이터 (타이틀, 설명) 세팅
$title = "실시간 공약이행률";
$desc = "여러분의 도움이 필요합니다.";

// 파일 경로 저장
$file_name = $_GET['name'];
$file_type = $_GET['type'];
$file_dir = "./docs/".$file_name.".".$file_type;

// 파일 타입에 따라 처리 방법 변경 (작업 예정)
// switch ($file_type) {
//     case 'md':
//         # 마크다운일 경우, HTML로 변환함.
//         $file = file_get_contents($file_dir);
//         use Michelf\MarkdownExtra;
//         $html = MarkdownExtra::defaultTransform($file);
//         break;
//
//     case 'html':
//         # HTML일 경우, 그대로 뿌려줌.
//         $file = file_get_contents($file_dir);
//         $html = $file;
//         break;
//
//     default:
//         # code...
//         break;
// }

$text = file_get_contents($file_dir);
use Michelf\MarkdownExtra;
$html = MarkdownExtra::defaultTransform($text);


//오픈그래프 데이터 세팅 (head.php에서 사용)
$og['title'] = $title;
$og['desc'] = $desc;
$og['url'] = "http://policy.lenscat.in/about.php";
$og['img'] = "";

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
