<?php

namespace App;

/**
 * 데이터 셋업이나 컨트롤에 쓰이는 클래스
 */
class Control
{
    /**
     * 공약의 좋아요수 +1
     * @param int $pol_id 공약 아이디
     * @return var (success/error)
     */
    public static function setThumbsUp($pol_id)
    {

        $i = \App\Common::isThumbsupAvailable($pol_id);

        if ($i == false){
            return "liked";
        }


        $query="INSERT INTO rightpoll.like_c (pol_id, likesum)
                VALUES (:id, '1') ON DUPLICATE KEY
                UPDATE likesum = likesum + 1";

        $stmt = \db()->prepare($query);
        $stmt->bindParam(':id', $pol_id);
        $stmt->execute();

        $stmt2 = \db()->prepare("INSERT INTO rightpoll.like(pol_id, ip, session) VALUES (:id, :ip, :session)");
        $stmt2->bindParam(':id', $pol_id);
        $stmt2->bindParam(':ip', $_SESSION['ip']);
        $stmt2->bindParam(':session', $_SESSION['id']);
        $stmt2->execute();

        return "success";
    }

}
