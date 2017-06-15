<?php require_once __DIR__ . '/../core/init.php';?>
<?php
$title = "TEST";
include 'head.php';

$elected=1;

$polecat = \App\Common::getPolecatList($elected);
$policy_list = \App\Common::getPolicyListByElected($elected);

foreach ($polecat as $num) {

    foreach ($policy_list as $policy) {

        if ($policy['polcat_id'] == $num['id']) {

        $polecat[$num['id']]['child'] = $policy;

        }

    }
}

print_r($polecat);
