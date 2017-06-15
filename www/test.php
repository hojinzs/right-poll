<?php require_once __DIR__ . '/../core/init.php';?>
<?php
$title = "TEST";
include 'head.php';

$elected=1;

$polecat = \App\Common::getPolecatList($elected);
$policy_list = \App\Common::getPolicyListByElected($elected);

foreach ($polecat as $num) {

    $tmp_policy[$num['id']] = $num;

    foreach ($policy_list as $policy) {

        if ($policy['polcat_id'] == $num['id']) {

        $tmp_policy[$num['id']]['child'][] = $policy;

        }

    }
}

foreach ($tmp_policy as $num) {

    print_r($num);
    echo "<hr>";
}
