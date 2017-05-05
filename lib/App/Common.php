<?php

namespace App;

/**
 * 흔히쓰는 클래스
 */
class Common
{
    /**
     * 단일 후보 가져오기
     * @param int $id 후보 idx
     * @return array id|user|name|chair|...
     */
    public static function getElectedInfo($id)
    {
        $stmt = \db()->prepare("SELECT * FROM rightpoll.elected WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row;
    }

    /**
     * 당선자 리스트 가져오기
     * @return array array(id|user|name|chair|...)
     */
    public static function getElectedList()
    {
        $stmt = \db()->prepare("SELECT * FROM rightpoll.elected");
        $stmt->execute();
        $array = $stmt->fetchAll();
        return $array;
    }
}
