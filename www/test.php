<?php require_once __DIR__ . '/../core/init.php';?>

<?php

/**
 * [getPolicyList description]
 * @param [type] $polcat_id [description]
 * @return [type] [description]
 */
function getPolicyList($polcat_id)
{
    $stmt = \db()->prepare("SELECT * FROM rightpoll.policy WHERE polcat_id=:id") ;
    $stmt->bindValue(':id', $polcat_id);
    $stmt->execute();
    $array = $stmt->fetchAll();
    return $array;
}

$array = getPolicyList(2);
print_r($array);
