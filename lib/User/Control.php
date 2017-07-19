<?php

namespace User;

/**
 * 유저 정보의 수정 / 변경
 */
class Control
{
    public static function editUserInformation($id,$email,$nick){
        // $id가 존재하는 ID인지 확인
        $check_id = \User\Common::getCurrentUserID($id);
        if($check_id == false) return "error:: not user!";

        $origin_info = \User\Common::getUserInfomation($id);
        $switch = 0;

        // 이메일을 바꾸려 하는가?
        if($origin_info['email']!=$email){
            // $email이 이미 사용중인지 확인
            $check_mail = \User\Common::getCurrentUserEmail($email);
            if($check_mail == true) return "error:: exist email";
            $switch ++;
        }

        // 닉네임을 바꾸려 하는가?
        if($origin_info['nick']!=$nick){
            // $nick이 이미 사용중인지 확인
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
                email=:email,
                nick=:nick
            WHERE
            	id=:id
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nick', $nick);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return "success";
    }
}
