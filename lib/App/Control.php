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

        $query =
        "INSERT INTO rightpoll.like_c (
            pol_id,
            likesum)
        VALUES (
            :id,
            '1')
            ON DUPLICATE KEY
        UPDATE
            likesum = likesum + 1";

        $stmt = \db()->prepare($query);
        $stmt->bindParam(':id', $pol_id);
        $stmt->execute();

        $query=
        "INSERT INTO rightpoll.like(
            pol_id,
            user_type,
            user_id,
            session)
        VALUES (
            :id,
            :user_type,
            :user_id,
            :session)";

        $stmt2 = \db()->prepare($query);
        $stmt2->bindParam(':id', $pol_id);
        $stmt2->bindParam(':user_type', $_SESSION['login_type']);
        $stmt2->bindParam(':user_id', $_SESSION['user_id']);
        $stmt2->bindParam(':session', $_SESSION['id']);
        $stmt2->execute();

        return "success";
    }

    /**
     * 댓글 등록하기
     * @param  array $postComment array[elected_id,content,policy_id(opt),parents_id(opt)]
     * @return var post_result
     */
    public static function setComment($postComment)
    {
        $success[0] = "success";

        // 값이 전달되지 않았을 경우의 예외 처리(에러로 되돌림)

        // owner_id 가 전달되었는가?
        if (array_key_exists ('owner_id',$postComment)) {
        } else {
            $error[0] = "error";
            $error[] = "not set elected_id";
        }

        // nickname이 전달되었는가?
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

        // contents 내용이 있는가?
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

        // 부모 코멘트 ID가 지정되었다면, 해당 부모 코멘트가 존재하는가??
        if ($postComment['parents_id'] != null)
        {
            $findComment = \App\Common::getCommentInfo($postComment['parents_id']);
            if ($findComment['id'] == null)
            {
                $error[] = "can not find parents comment";
            }
        }

        // 하나라도 ERROR 가 발생한다면 ERROR 리턴 처리
        if(isset($error))
        {
                return $error;
        }

        // 댓글 내용을 가공함.
        $stdContent = $postComment['content'];
        // <p>,<a>,<br>을 제외한 HTML 코드를 제거 -> html special c
        $stdContent = strip_tags($stdContent, '<p><a><br>');
        // 줄바꿈 처리
        $stdContent = nl2br($stdContent);

        $query =
        "INSERT INTO rightpoll.comment(
            parents_id,
            owner,
            owner_id,
            user_type,
            user_id,
            nick,
            content,
            ip_blind)
        VALUES (
            :parents_id,
            :owner,
            :owner_id,
            :user_type,
            :user_id,
            :nick,
            :content,
            :ip_blind)
        ";

        # ip주소를 가려서 저장
        $blind_ip = \App\Str::replaceIpAddress($_SESSION['ip']);

        $stmt = \db()->prepare($query);
        $stmt->bindParam(':parents_id', $postComment['parents_id']);
        $stmt->bindParam(':owner', $postComment['owner_type']);
        $stmt->bindParam(':owner_id', $postComment['owner_id']);
        $stmt->bindParam(':content', $stdContent);
        $stmt->bindParam(':nick', $_SESSION['user_nick']);
        $stmt->bindParam(':ip_blind', $blind_ip);
        $stmt->bindParam(':user_type', $_SESSION['login_type']);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->execute();

        // 등록에 성공한 댓글 정보 가져오기

        $pstd = \db()->lastInsertId();
        $pstdCmt = \App\Common::getCommentInfo($pstd);

        // parents_id가 없는 부모 댓글일 경우, parents_id를 id로 설정해줌.

        if($pstdCmt['parents_id'] == null):
            $query =
            "UPDATE rightpoll.comment
            SET parents_id =:id
            WHERE id=:where_id;
            ";

            $stmt = \db()->prepare($query);
            $stmt->bindParam(':id', $pstdCmt['id']);
            $stmt->bindParam(':where_id', $pstdCmt['id']);
            $stmt->execute();

        endif;

        // owner가 (policy)인, 공약에 달린 댓글일 경우 => policy_cmt_c의 sum을 카운트업 하여 댓글 수 +1

        if($pstdCmt['owner'] == "policy"){
            $query =
            "INSERT INTO rightpoll.policy_cmt_c (pol_id, cmt_sum)
            VALUES (:id, '1') ON DUPLICATE KEY
            UPDATE cmt_sum = cmt_sum + 1
            ";

            $stmt = \db()->prepare($query);
            $stmt->bindParam(':id', $pstdCmt['owner_id']);
            $stmt->execute();
        }

        $success[] = "success";
        return "success";
    }

    /**
     * 코멘트 추천/비추 여부 POST
     * @param int $cmt_id 대상 코멘트 ID
     * @param int $stt 좋아요/비추 여부 1=좋아요, 2=싫어요
     * @return var success(성공) / recommended(평가됨) / error(에러)
     */
    public static function postCommentRecommend($cmt_id,$stt)
    {

        # 공약을 평가 하였는지 확인

        $i = \App\Common::isCommentRateAvailable($cmt_id);

        if ($i != true) {
            # 공약 평가 가능 여부가 true가 아닐 경우
            return "recommended";
        }

        switch ($stt) {
            case 1:
                # 좋아요일 경우

                # rate에 status=1 기록 추가

                $query1 =
                    "INSERT INTO rightpoll.comment_rate (
                        cmt_id,
                        status,
                        user_type,
                        user_id,
                        session)
                    VALUES (
                        :id,
                        1,
                        :user_type,
                        :user_id,
                        :session)";

                # rate_c에 like를 +1

                $query2="INSERT INTO rightpoll.comment_rate_c (cmt_id, lke)
                        VALUES (:id, '1') ON DUPLICATE KEY
                        UPDATE lke = lke + 1";

                break;

            case 2:
                # 싫어요일 경우

                # rate에 status=2 기록 추가
                $query1 =
                "INSERT INTO rightpoll.comment_rate (
                    cmt_id,
                    status,
                    user_type,
                    user_id,
                    session)
                VALUES (
                    :id,
                    2,
                    :user_type,
                    :user_id,
                    :session)";

                # rate_c에 dislike를 +1
                $query2="INSERT INTO rightpoll.comment_rate_c (cmt_id, lke)
                        VALUES (:id, '2') ON DUPLICATE KEY
                        UPDATE dislke = dislke + 1";

                break;

            default:
                # 지정이 없을 경우, 에러 리턴
                return 'error';
                break;
        }

        # DB에 rate 기록 추가

        $stmt1 = \db()->prepare($query1);
        $stmt1->bindParam(':id', $cmt_id);
        $stmt1->bindParam(':session', $_SESSION['id']);
        $stmt1->bindParam(':user_type', $_SESSION['login_type']);
        $stmt1->bindParam(':user_id', $_SESSION['user_id']);
        $stmt1->execute();

        # DB에 해당 코멘트의 rate 여부 카운트

        $stmt2 = \db()->prepare($query2);
        $stmt2->bindParam(':id', $cmt_id);
        $stmt2->execute();

        return "success";
    }

}
