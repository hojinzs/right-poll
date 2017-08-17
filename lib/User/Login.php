<?php

namespace User;

/**
 * 유저의 로그인 관련 함수
 */
class Login
{

    /**
     * 유저 로그인
     * @param var $login_id 로그인 시도 ID(아이디)
     * @param var $pw 로그인 시도 PW
     * @return var "success" or "error::reason"
     */
    public static function userLogin($login_id,$pw){
        // 0. 빈 값 확인
        if($login_id == "") return "error: login_id is empty!";
        if($pw == "") return "error: password is empty!";

        // 1. 아이디가 존재하는지 확인
        $mailcheck = Common::getCurrentLoginId($login_id);
        if($mailcheck == false) return "error:: '".$login_id."' is not user";

        // 2. 해당 유저 정보(id/pw)를 DB에서 가져움
        $input_pw = hash('sha256', $pw);
        $user_pw = Common::getUserPassword($login_id);

        // 3. 비밀번호가 해당 회원과 일치하는지 확인
        if(strcmp($user_pw,$input_pw)) return "error:: password is not correct";

        // 5. user infomation 가져옴
        $user_info = Common::getUserInfomation($login_id);

        // 5. 세션에 유저 정보 저장
        $_SESSION['login_type'] = 'user';
        $_SESSION['user_id'] = $user_info['user_id'];
        $_SESSION['user_nick'] = $user_info['nick'];

        // 6. DB에 유저 로그인 정보 저장
        $query = "INSERT INTO rightpoll.log_login
        (
            ip,
            user_id
        )
        VALUES
        (
            :ip,
            :user_id
        )
        ";

        $stmt1 = \db()->prepare($query);
        $stmt1->bindParam(':ip', $_SESSION['ip']);
        $stmt1->bindParam(':user_id',$user_info['user_id']);
        $stmt1->execute();

        // success
        return "success";

    }


}
