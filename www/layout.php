<?php require_once __DIR__ . '/../core/init.php';?>

<?php
$title = "약속을 했으면 지켜야지?";
?>

<HTML>
<?php include 'head.php';?>
<BODY>
<?php include 'nav.php'; ?>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1 id="pagetitle">ABOUT<h1>
                    <h4>이곳은 무엇입니까?</h4>
                </div>
            </div>
        </div>
    </header>

    <div class="wr-wrapper">
        <div class="container">
<?php
$text = file_get_contents("./about.md");
use Michelf\MarkdownExtra;
$html = MarkdownExtra::defaultTransform($text);
echo $html;
?>
        </div>
    </div>

    <footer>
    </footer>
</BODY>
</HTML>
