<nav>
    <div class="container">
        <div class="nav-wrapper">
            <div class="nav-brand">
                <a href="/" >공약지킴이</a>
            </div>
            <ul class="nav-left">
                <li>asdf</li>
                <li>asdf</li>
            </ul>
            <div class="nav-right">

                <?php switch ($_SESSION['login_type']):
                    case 'guest':?>
                        <!-- USERTYPE: GUEST 일 경우-->
                        <div id="nav_more" class="nav-guest">
                            <i class="fa fa-user-secret" aria-hidden="true"></i><?=$_SESSION['user_id']?>
                        </div>
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
        <ul>
            <li>asdf</li>
            <li>asdf</li>
            <li>asdf</li>
        </ul>
    </div>
</div>
