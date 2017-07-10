<nav>
    <div class="container">
        <div class="brand">
            <a href="/" >TEST</a>
        </div>
        <div class="nav-right">

            <?php switch ($_SESSION['login_type']):
                 case 'guest':?>
                    <!-- USERTYPE: GUEST 일 경우-->
                    <div class="nav-guest">
                        <a class="wr_btn" onclick="alert('준비중입니다.')" href="#">
                            <i class="fa fa-user-secret" aria-hidden="true"></i>
                            <?=$_SESSION['user_id']?>
                        </a>
                    </div>
                    <?php break;?>

                    <?php case 'user':?>
                        <!-- USERTYPE: USER 일 경우-->
                        <div class="nav-user">
                            <a class="wr_btn" onclick="alert('준비중입니다.')" href="#">
                                <i class="fa fa-user-secret" aria-hidden="true"></i>
                                <?=$_SESSION['user_id']?>
                            </a>
                        </div>
                        <?php break;?>

                <?php default:?>
                    !!?!
                    <?php break;?>
            <?php endswitch; ?>

        </div>
    </div>
</nav>
<div class="nav-more">
    <div class="container">
        hjkhk
    </div>
</div>
