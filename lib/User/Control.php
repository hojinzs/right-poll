<?php

namespace User;

/**
 * 유저 정보의 수정 / 변경
 */
class Control
{
    /**
     * 새로운 유저 생성
     * @param var $user_id 로그인에 사용할 이메일
     * @param var $nick 사용할 닉네임
     * @param var $email 사용할 이메일
     * @param var $password 로그인에 사용할 암호
     * @return var "success" or not
     */
    public static function setNewUser($user_id,$nick,$email,$password){

        // 패스워드를 SHA256으로 암호화
        $password = hash('sha256', $password);

        // DB Insert
        $query =
        "INSERT INTO rightpoll.user
        (
            user_id,
            nick,
            email,
            password
        )
        VALUES
        (
            :user_id,
            :nick,
            :email,
            :password
        )
        ";
        $stmt1 = \db()->prepare($query);
        $stmt1->bindParam(':user_id', $user_id);
        $stmt1->bindParam(':nick', $nick);
        $stmt1->bindParam(':email', $email);
        $stmt1->bindParam(':password',$password);
        $stmt1->execute();

        return "success";
    }

    /**
     * 유저 정보 수정
     * @param [type] $user_id [description]
     * @param [type] $nick [description]
     * @param [type] $email [description]
     * @return [type] [description]
     */
    public static function editUserInformation($user_id,$nick,$email){
        // 빈 값 확인
        if($nick == "") return "error:: nickname is empty";
        if($email == "") return "error:: email is empty";

        // $user_id가 존재하는 ID인지 확인
        $check_id = \User\Common::getCurrentLoginId($user_id);
        if($check_id == false) return "error:: not user!";

        $origin_info = \User\Common::getUserInfomation($user_id);
        $switch = 0;

        // 이메일을 바꾸려 하는가?
        if($origin_info['email']!=$email){
            // 닉네임(nick)을 이미 사용중인지 확인
            $check_email = \User\Common::getCurrentUserEmail($email);
            if($check_email == true) return "error:: exist email";
            $switch ++;
        }

        // 닉네임(nick)을 바꾸려 하는가?
        if($origin_info['nick']!=$nick){
            // 닉네임(nick)을 이미 사용중인지 확인
            $check_nick = \User\Common::getCurrentUserNick($nick);
            if($check_nick == true) return "error:: exist nickname";
            $switch ++;
        }

        // 바꿀게 없는가?
        if($switch == 0) return "error:: nothing to change";

        // 문제가 없으면 유저 정보 변경
        $query =
            "UPDATE
                rightpoll.user
            SET
                nick=:nick,
                email=:email
            WHERE
            	user_id=:user_id
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nick', $nick);
        $stmt->execute();


        return "success";
    }

    /**
     * 비밀번호 정보 수정
     * @param var $user_id 비밀번호를 수정할 유저 아이디
     * @param var $password 수정할 비밀번호
     * @return var success=성공
     */
    public static function setUserPassword($user_id,$password){
        // 빈 값 확인
        if($password == "") return "error:: password is empty";

        //STEP1. user가 존재하는지 확인
        $check_id = \User\Common::getCurrentLoginId($user_id);
        if($check_id == false) return "error:: not user!";

        //STEP2. 변경할 패스워드를 해시로 변경
        $password = hash('sha256', $password);

        //STEP2. 문제가 없으면 패스워드 변경
        $query =
            "UPDATE
                rightpoll.user
            SET
                password=:password
            WHERE
                user_id=:user_id
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        return "success";

    }

}
