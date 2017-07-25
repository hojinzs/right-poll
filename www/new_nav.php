<?php
// 메뉴 하이라이트 세팅 (todo)

// 우측 메뉴 (유저 메뉴) 세팅
switch ($_SESSION['login_type']) {
    case 'guest':
        # 게스트 유저일 경우 메뉴
        $user_menu = [
            [
                'id' => "nav_login",
                'herf' => "/new_login.php",
                'text' => "로그인"
            ],
            [
                'id' => "nav_register",
                'herf' => "/new_register.php",
                'text' => "회원가입"
            ]
        ];
        $user_icon = "fa-user-secret";
        $user_info = [
            [
                'name' => "ID",
                'value' => $_SESSION['user_id']
            ],
            [
                'name' => "IP",
                'value' => $_SESSION['ip']
            ],
            [
                'name' => "NICK",
                'value' => $_SESSION['user_nick']
            ]
        ];

        break;

    case 'user':

        $user_menu = [
            [
                'id' => "nav_mypage",
                'herf' => "/new_mypage.php",
                'text' => "마이페이지"
            ],
            [
                'id' => "nav_logout",
                'herf' => "/new_logout.php",
                'text' => "로그아웃"
            ]
        ];
        $user_icon = "fa-user-circle-o";
        $user_info = [
            [
                'name' => "NICK",
                'value' => $_SESSION['user_nick']
            ]
        ];

        break;

    default:
        # code...
        break;
}

?>

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
            <ul id="nav-right" class="nav-right">
                <?php foreach ($user_menu as $menu):?>
                    <li><a id="<?=$menu['id']?>" href="<?=$menu['herf']?>"><?=$menu['text']?></a></li>
                <?php endforeach;?>
            </ul>
            <a id="toggle_nav_more" class="nav-profile" href="#">
                <i class="fa <?=$user_icon?>" aria-hidden="true"></i>
            </a>
        </div>
        <div class="nav-more">
            <ul class="user_info">
                <?php foreach ($user_info as $info):?>
                    <li id="<?=$info['name']?>"><?=$info['value']?></li>
                <?php endforeach; ?>
            </ul>
            <hr id="nav-more-right">
        </div>
    </div>
</nav>
