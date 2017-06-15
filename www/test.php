<?php require_once __DIR__ . '/../core/init.php';?>
<?php
$title = "TEST";
include 'head.php';

$mnu = "pol";

$mnu_list = [
    [
        'id' => 0,
        'mnu' => "pol",
        'name' => "공약목록",
        // 'url' => "/el/".$elected['url'],
    ],
    [
        'id' => 1,
        'mnu' => "cmt",
        'name' => "한마디",
        // 'url' => "/el/".$elected['url']."/comment",
    ],
];

foreach ($mnu_list as $menu) {
    # code...
    if($menu["mnu"] == $mnu){
        # 일치할 경우 클래스 지정

        $mnu_list[$menu['id']]['class']="active";

    } else {

        $mnu_list[$menu['id']]['class']="non_active";
    }
}

print_r($mnu_list);
