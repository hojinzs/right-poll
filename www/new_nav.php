<nav>
    <div class="container">
        <div class="nav-wrapper">
            <div class="nav-brand">
                <a href="/" >공약지킴이</a>
            </div>
            <ul class="nav-left">
                <li><a href="#">발견하기</a></li>
                <li><a href="#">평가하기</a></li>
            </ul>
            <?php switch ($_SESSION['login_type']):
                case 'guest': ##USERTYPE: GUEST일 경우 ?>
                    <ul class="nav-right">
                        <li><a href="/new_login.php">로그인</a></li>
                        <li><a href="/new_register.php">회원가입</a></li>
                    </ul>
                    <a id="nav_more" class="nav-profile" href="#">
                        <i class="fa fa-user-secret" aria-hidden="true"></i>
                    </a>
                    <?php break;?>
                <?php case 'user': ##USERTYPE: USER일 경우 ?>

                    <ul class="nav-right">
                        <li><a href="./new_mypage.php">마이페이지</a></li>
                    </ul>
                    <a id="nav_more" class="nav-profile" href="#">
                        <i class="fa fa-user-secret" aria-hidden="true"></i>
                    </a>
                    <?php break;?>

                <?php default:?>
                    !!?!
                    <?php break;?>
            <?php endswitch; ?>

            </div>
        </div>
    </div>
</nav>
<div class="nav-more">
    <div class="container">
        <p><?=$_SESSION['user_id']?></p>
        <p><?=$_SESSION['ip']?></p>
        <ul>
            <li>댓글</li>
            <li>좋아하는 공약 수</li>
        </ul>
    </div>
</div>
