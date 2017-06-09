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

        // 일단 URL(영숫자)로 검색

        $stmt = \db()->prepare("SELECT * FROM rightpoll.elected WHERE url = :url");
        $stmt->bindValue(':url', $id);
        $stmt->execute();
        $row = $stmt->fetch();

        // 만약 검색이 안될 경우
        if($row==null){

            // id(숫자)값으로 검색
            $stmt = \db()->prepare("SELECT * FROM rightpoll.elected WHERE id = :id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();

        }

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
        $query =
            "SELECT
                p.id,
                c.label,
                p.title,
                p.elected_id,
                p.polcat_id,
                l.likesum
            FROM rightpoll.policy p
            JOIN rightpoll.like_c l
            JOIN rightpoll.polecat c
            WHERE
                p.id = :id
                AND l.pol_id = p.id
                AND c.id = p.polcat_id
            ";

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
        $stmt = \db()->prepare(
            "SELECT
                id,
                parents_id,
                name,
                pol_id
            FROM rightpoll.plan
            WHERE pol_id=:id
        ") ;
        $stmt->bindValue(':id', $policy_id);
        $stmt->execute();
        $array = $stmt->fetchAll();

        return $array;
    }

    /**
     * 공약의 좋아요 여부 (이미 좋아요를 하였는가?)
     * @param  int $policy_id 공약 번호
     * @return bool        좋아요 가능 여부(TRUE/FALSE)
     */
    public static function isThumbsupAvailable($policy_id)
    {

        $query =
            "SELECT
                like.id,
                like.pol_id,
                like.session
            FROM rightpoll.like
            WHERE like.pol_id=:id
                AND like.session=:session
            ";

        $stmt = \db()->prepare($query);
        $stmt->bindValue(':id', $policy_id);
        $stmt->bindValue(':session', $_SESSION['id']);
        $stmt->execute();
        $result = $stmt->fetchALL();

        if ($result != null){
            return false;
        }

        return true;

    }

    /**
     * 코멘트 평가 가능 여부 (이미 코멘트를 평가 하였는가?)
     * @param [type] $cmt_id [description]
     * @return bool 코멘트 평가 가능 여부(TRUE/FALSE)
     */
    public static function isCommentRateAvailable($cmt_id)
    {

        $query =
            "SELECT
                comment_rate.id,
                comment_rate.cmt_id,
                comment_rate.session
            FROM
                rightpoll.comment_rate
            WHERE
                comment_rate.cmt_id = :id
            AND comment_rate.session = :session
            ";

        $stmt = \db()->prepare($query);
        $stmt->bindValue(':id', $cmt_id);
        $stmt->bindValue(':session', $_SESSION['id']);
        $stmt->execute();
        $result = $stmt->fetchALL();

        if ($result != null){
            return false;
        }

        return true;

    }

    /**
     * 당선자의 코멘트 리스트 불러오기
     * @param  int $elected_id 당선자 ID
     * @return array     {id|comment_id|elected_id|text}
     */
    public static function getElctCommentList($elected_id)
    {

        # 당선자의 댓글 목록을 DB에서 가져옴

        $stmt = \db()->prepare(
            "SELECT
            c.id,
            c.comment_id,
            c.elected_id,
            c.policy_id,
            c.user_id,
            c.nick,
            c.content,
            c.ip_blind 'ip',
            c.created_at,
            ifnull(r.lke,0) 'lke',
            ifnull(r.dislke,0) 'dislke'
            FROM rightpoll.comment c
            	LEFT OUTER JOIN rightpoll.comment_rate_c r
            	ON r.cmt_id = c.id
            WHERE c.elected_id=:id
            AND c.policy_id is NULL
            order by c.comment_id desc, c.id asc
        ") ;
        $stmt->bindValue(':id', $elected_id);
        $stmt->execute();
        $array = $stmt->fetchAll();

        foreach ($array as $cmt) {
        # IP주소 가림 처리
        $cmt['ip'] = \App\Str::replaceIpAddress($cmt['ip']);
        }

        return $array;
    }

    /**
     * 공약의 코멘트 리스트 불러오기
     * @param  int $pol_id 공약ID
     * @return array     {id|comment_id|elected_id|text}
     */
    public static function getPolCommentList($pol_id)
    {
        $stmt = \db()->prepare(
            "SELECT
            c.id,
            c.comment_id,
            c.elected_id,
            c.policy_id,
            c.user_id,
            c.nick,
            c.content,
            c.ip_blind 'ip',
            c.created_at,
            ifnull(r.lke,0) 'lke',
            ifnull(r.dislke,0) 'dislke'
            FROM rightpoll.comment c
            	LEFT OUTER JOIN rightpoll.comment_rate_c r
            	ON r.cmt_id = c.id
            WHERE c.policy_id=:id
            order by c.comment_id desc, c.id asc
        ");
        $stmt->bindValue(':id', $pol_id);
        $stmt->execute();
        $array = $stmt->fetchAll();

        return $array;
    }


    /**
     * 댓글 정보 가져오기
     * @param  int $comment_id 댓글 ID
     * @return array          [id,comment_id,contents,etc..]
     */
    public static function getCommentInfo($comment_id)
    {
        $stmt = \db()->prepare(
            "SELECT *
            FROM rightpoll.comment
            WHERE id=:id
        ") ;
        $stmt->bindValue(':id', $comment_id);
        $stmt->execute();
        $array = $stmt->fetch();

        return $array;
    }
}
