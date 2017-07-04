<?php

namespace App;

/**
 * 유저 관련 함수
 */
class User
{
    /**
     * [postNewGuestUser description]
     * @return [type] [description]
     */
    public static function setNewGuestUser(){
        $nickname = "";
        $query =
        "INSERT INTO rightpoll.user_guest
        (
            nick,
            session,
            ip
        )
        VALUES
        (
            :nick,
            :session,
            :ip
        )
        ";

        $stmt1 = \db()->prepare($query);
        $stmt1->bindParam(':session', $_SESSION['id']);
        $stmt1->bindParam(':ip', $_SESSION['ip']);
        $stmt1->bindParam(':nick',$nickname);
        $stmt1->execute();

        // 등록된 유저 정보 가져오기
        $pstd = \db()->lastInsertId();

        // USER_ID 등록 (guest_12344 형식)
        $user_id = 'guest_'.$pstd;

        //user_id 저장
        $query =
            "UPDATE rightpoll.user_guest
                SET user_id =:id
            WHERE id=:where_id;
            ";
        $stmt1 = \db()->prepare($query);
        $stmt1->bindParam(':id', $user_id);
        $stmt1->bindParam(':where_id', $pstd);
        $stmt1->execute();

        // 세션에 게스트 유저 정보 저장
        $_SESSION['login_type'] = 'guest';
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_nick'] = '';
    }

    /**
     * 게스트 유저의 닉네임을 변경/저장함.
     * @param var $nick 변경할 유저의 닉네임
     */
    public static function setGuestUserNick($nick){
        // 세션 로그인 타입을 다시 한번 확인
        if (!$_SESSION['login_type']='guest') {
            # Guest가 아니라면 fail
            return 'not guestuser';
        }

        // 12자가 넘어가면 자름
        $mb_nick = mb_strimwidth($nick, '0', '30','','utf-8');

        // 세선샹의 닉네임 변경
        $_SESSION['user_nick'] = $mb_nick;

        // DB에 변경된 닉네임 저장
        $query =
            "UPDATE rightpoll.user_guest
            SET nick=:nick
            WHERE id=:id
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':nick', $mb_nick);
        $stmt->bindParam(':id', $_SESSION['user_id']);
        $stmt->execute();

    }

}
