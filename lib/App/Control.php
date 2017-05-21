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

    /**
     * 댓글 등록하기
     * @param  array $postComment array[elected_id,content,policy_id(opt),comment_id(opt)]
     * @return var              post_result
     */
    public static function setComment($postComment)
    {
        $success[0] = "success";

        if (array_key_exists ('elected_id',$postComment)) {
        } else {
            $error[0] = "error";
            $error[] = "not set elected_id";
        }

        if(array_key_exists ('nickname',$postComment)) {
            if ($postComment['nickname'] == "")
            {
                $error[0] = "error";
                $error[] = "not set nickname";
            }
        } else {
            $error[0] = "error";
            $error[] = "not set nickname";
        }

        if(array_key_exists ('content',$postComment)) {
            if ($postComment['content'] == "")
            {
                $error[0] = "error";
                $error[] = "not set content";
            }
        } else {
            $error[0] = "error";
            $error[] = "not set content";
        }

        if (array_key_exists ('policy_id',$postComment))
        {
            $findPolicy = \App\Common::getPolicyInfo($postComment['policy_id']);
            if ($findPolicy['id'] == null)
            {
                $error[0] = "error";
                $error[] = "can not find policy_id";
            }
        } else {
            $postComment['policy_id']=null;
        }

        if ($postComment['comment_id'] != null)
        {
            $findComment = \App\Common::getCommentInfo($postComment['comment_id']);
            if ($findComment['id'] == null)
            {
                $error[] = "can not find parents comment";
            }
        }

        if(isset($error))
        {
                return $error;
        }

        $query =
        "INSERT INTO rightpoll.comment(
            elected_id,
            policy_id,
            comment_id,
            nick,
            content,
            ip,
            session)
        VALUES (
            :elected_id,
            :policy_id,
            :comment_id,
            :nick,
            :content,
            :ip,
            :session)
        ";

        $stmt = \db()->prepare($query);
        $stmt->bindParam(':elected_id', $postComment['elected_id']);
        $stmt->bindParam(':content', $postComment['content']);
        $stmt->bindParam(':nick', $postComment['nickname']);
        $stmt->bindParam(':comment_id', $postComment['comment_id']);
        $stmt->bindParam(':policy_id', $postComment['policy_id']);
        $stmt->bindParam(':ip', $_SESSION['ip']);
        $stmt->bindParam(':session', $_SESSION['id']);
        $stmt->execute();

        $pstd = \db()->lastInsertId();
        $pstdComment = \App\Common::getCommentInfo($pstd);

        if($pstdComment['comment_id'] == null){
            $query =
            "UPDATE rightpoll.comment
            SET comment_id =:id
            WHERE id=:where_id;
            ";

            $stmt = \db()->prepare($query);
            $stmt->bindParam(':id', $pstdComment['id']);
            $stmt->bindParam(':where_id', $pstdComment['id']);
            $stmt->execute();
        }

        $success[] = "댓글이 정상적으로 등록되었습니다.";
        return $success;
    }

}
