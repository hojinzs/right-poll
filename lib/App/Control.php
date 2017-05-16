<?php

namespace App;

/**
 * 데이터 셋업이나 컨트롤에 쓰이는 클래스
 */
class Control
{
    /**
     * 공약의 좋아요수 +1
     * @param int $policy_id 공약 아이디
     * @return var (success/error)
     */
    public static function setThumbsUp($policy_id)
    {
        $stmt = \db()->prepare("INSERT INTO rightpoll.like_c (pol_id, likesum) VALUES (:id, '1') ON DUPLICATE KEY UPDATE likesum = likesum + 1");
        $stmt->bindValue(':id', $policy_id);
        $stmt->execute();
        $call_result = $stmt->fetch();

        $stmt2 = \db()->prepare("INSERT INTO rightpoll.like(pol_id, ip) VALUES (:id, :ip)");
        $stmt2->bindValue(':id', $policy_id);
        $stmt2->bindValue(':ip', $_SESSION['ip']);
        $stmt2->execute();

        $result = "success";

        return $result;
    }

}
