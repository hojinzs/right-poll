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

    /**
     * 당선자의 공약 카테고리 목록 가져오기
     * @param int $electedid 당선자ID
     * @return array array(id|label|description)
     */
    public static function getPolecatList($electedid)
    {
        $stmt = \db()->prepare("SELECT * FROM rightpoll.polecat WHERE elected_id= :id") ;
        $stmt->bindValue(':id', $electedid);
        $stmt->execute();
        $array = $stmt->fetchAll();
        return $array;
    }

    /**
     * 공약 카테고리의 상세 공약 목록 / 내용 가져오기
     * @param int $polcat_id 공약 카테고리 ID
     * @return array array(id|label|desc|...)
     */
    public static function getPolicyList($polcat_id)
    {
        $query="SELECT policy.id,polecat.label,title,policy.elected_id, polcat_id,like_c.likesum
                FROM rightpoll.policy
                INNER JOIN rightpoll.like_c, rightpoll.polecat
                WHERE policy.polcat_id=:id AND rightpoll.like_c.pol_id = rightpoll.policy.id AND rightpoll.polecat.id = rightpoll.policy.polcat_id
        ";

        $stmt = \db()->prepare($query);
        $stmt->bindValue(':id', $polcat_id);
        $stmt->execute();
        $array = $stmt->fetchAll();

        return $array;
    }

    /**
     * 공약의 상세 정보 가져오기
     * @param int $policy_id 공약 ID
     * @return array policy(id|label|desc|...)
     */
    public static function getPolicyInfo($policy_id)
    {
        $query="SELECT policy.id,polecat.label,title,policy.elected_id, polcat_id,like_c.likesum
                FROM rightpoll.policy
                INNER JOIN rightpoll.like_c, rightpoll.polecat
                WHERE policy.id=:id AND rightpoll.like_c.pol_id = rightpoll.policy.id AND rightpoll.polecat.id = rightpoll.policy.polcat_id";

        $stmt = \db()->prepare($query) ;
        $stmt->bindValue(':id', $policy_id);
        $stmt->execute();
        $row = $stmt->fetch();

        return $row;
    }

    /**
     * 공약의 이행안 목록 가져오기
     * @param int $policy_id [description]
     * @return array plan(id|name|pol_id)
     */
    public static function getPlanList($policy_id)
    {
        $stmt = \db()->prepare("SELECT id,name,pol_id FROM rightpoll.plan WHERE pol_id=:id") ;
        $stmt->bindValue(':id', $policy_id);
        $stmt->execute();
        $array = $stmt->fetchAll();

        return $array;
    }
}
