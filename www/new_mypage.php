<?php require_once __DIR__ . '/../core/init.php';
// guest user는 사용 불가
if($_SESSION['login_type']!="user") header("Location:/login");
if(!isset($_SESSION['user_id'])) header("Location:/404");

// 기본 메타데이터 (타이틀, 설명) 세팅
$title = "공약지킴이::마이페이지";

?>

<HTML>
<?php include 'head.php'; ?>
<head>
    <!-- CryptoJS -->
    <script src="js/cryptojs.core.js"></script>
    <script src="js/cryptojs.enc-base64.js"></script>
    <!-- reffernce: https://github.com/travist/jsencrypt -->
    <script src="js/jsencrypt.min.js"></script>

    <script src="js/mypage.js"></script>
</head>
<BODY>
<?php include 'new_nav.php'; ?>
<div class="hidden" >
    <input id="publickey" style="display:none"></input>
</div>
<div class="container">
    <div class="row">
        <div class="wr_contents col-md-12">
        	<div class="wr_single_wrapper">
	            <h1> MyPAGE </h1>
	            <div class="row">
	            	<div class="col-md-3">
	                    <?php include 'new_mypage_menu.php'; ?>
	            	</div>
	            	<div class="col-md-9">
	                    <?php include 'new_mypage_info.php'; ?>
	            	</div>
	            </div>
            </div>
        </div>
    </div>
</div

<?php include 'new_footer.php'; ?>

</BODY>
</HTML>
