<?php require_once __DIR__ . '/../core/init.php';?>
use App\Common;

<?php

$id = 2;

// function getPolecatList($electedid)
// {
//     $stmt = \db()->prepare("SELECT * FROM rightpoll.polecat WHERE elected_id=:id") ;
//     $stmt->bindValue(':id', $electedid);
//     $stmt->execute();
//     $array = $stmt->fetchAll();
//     return $array;
// }
// $array = getPolecatList($id);

$array = \App\Common::getPolecatList($id);
print_r($array);
