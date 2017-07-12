<nav>
    <div class="container">
        <div class="nav-wrapper">
            <div class="nav-brand">
                <a href="/" >공약지킴이</a>
            </div>
            <div id="nav-left" class="nav-left">
                <ul>
                    <li><a href="#">
                        <i class="fa fa-search" aria-hidden="true"></i><span>발견하기</span>
                    </a></li>
                    <li><a href="#">
                        <i class="fa fa-pencil" aria-hidden="true"></i><span>평가하기</span>
                    </a></li>
                    <li></li>
                </ul>
            </div>
            <?php switch ($_SESSION['login_type']):
                case 'guest': ##USERTYPE: GUEST일 경우 ?>
                    <ul id="nav-right" class="nav-right">
                        <li><a href="/new_login.php">로그인</a></li>
                        <li><a href="/new_register.php">회원가입</a></li>
                    </ul>
                    <a id="toggle_nav_more" class="nav-profile" href="#">
                        <i class="fa fa-user-secret" aria-hidden="true"></i>
                    </a>
                    <?php break;?>
                <?php case 'user': ##USERTYPE: USER일 경우 ?>

                    <ul class="nav-right">
                        <li><a href="./new_mypage.php">마이페이지</a></li>
                    </ul>
                    <a id="toggle_nav_more" class="nav-profile" href="#">
                        <i class="fa fa-user-secret" aria-hidden="true"></i>
                    </a>
                    <?php break;?>

                <?php default:?>
                    !!?!
                    <?php break;?>
            <?php endswitch; ?>

            </div>
            <div class="nav-more">
                <ul class="user_info">
                    <li><?=$_SESSION['user_id']?></li>
                    <li><?=$_SESSION['ip']?></li>
                </ul>
                <hr id="nav-more-right">
            </div>
        </div>
    </div>
</nav>
