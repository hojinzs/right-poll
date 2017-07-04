<?php require_once __DIR__ . '/../core/init.php';

// 마크다운 라이브러리 사용
use Michelf\MarkdownExtra;

// 기본 메타데이터 (타이틀, 설명) 세팅
$desc = "여러분의 도움이 필요합니다.";

// 파일 경로 저장
$file_name = $_GET['name'];
$file_type = $_GET['type'];
$file_dir = "./docs/".$file_name.".".$file_type;

// 파일 불러오기
@$file = file_get_contents($file_dir);

if($file!=""){
$html = "에러가 발생하였습니다.";
}

switch ($file_type) {
   case 'md':
       # 마크다운일 경우, HTML로 변환함.
       $html = MarkdownExtra::defaultTransform($file);
       break;

   case 'html':
       # HTML일 경우, 그대로 뿌려줌.
       $html = $file;
       break;

   default:
       # 인식하지 못하는 파일일 경우 ERROR.
       $html = "알 수 없는 형식의 파일입니다.";
       break;
   }

// 파일 타입에 따라 처리 방법 변경 (작업 예정)


//오픈그래프 데이터 세팅 (head.php에서 사용)
$og['title'] = $title;
$og['desc'] = $desc;

?>

<HTML>
<?php include 'head.php'; ?>
<BODY>
<?php include 'new_nav.php'; ?>

<div class="container contents-box">
    <div class="row">
        <div class="wr_contents col-md-12">
            <article>
                <?=$html;?>
            </article>
        </div>
    </div>
</div>
<?php include 'new_footer.php'; ?>
</BODY>
</HTML>
