<?php

$mnu_list = [
    [
        'id' => 0,
        'mnu' => "pol",
        'name' => "공약목록",
        'url' => "/el/".$elected['url'],
    ],
    [
        'id' => 1,
        'mnu' => "cmt",
        'name' => "한마디",
        'url' => "/el/".$elected['url']."/comment",
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

$elected_info_url = "/el/".$elected['url']."/info"

?>


<div class="wr_menu">
    <div class="row">
        <div class="wr_elc_info col-md-12 col-xs-12">
            <div class="row">
                <div class="col-md-12 col-xs-2">
                    <div class="row wr_elc_profile">
                        <img class="wr_profile" src="<?=FILE.$elected['profile']?>">
                    </div>
                </div>
                <div class="col-md-12 col-xs-10">
                    <div class="row">
                        <p class="col-md-12 col-xs-12 name"><?=$elected['name']?></p>
                        <a href="<?=$elected_info_url?>">
                            <p class="col-md-12 col-xs-12 chair"><?=$elected['chair']?><i class="fa fa-info-circle" aria-hidden="true"></i>
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="wr_menu_list-group col-md-12 col-xs-12">
            <div class="row">
                <?php foreach ($mnu_list as $menu): ?>
                    <a href="<?=$menu['url']?>" class="wr_menu_list <?=$menu['class']?> col-md-12 col-xs-4">
                        <?=$menu['name']?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
