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

        // 1. 아이디가 존재하는지 확인
        $mailcheck = Common::getCurrentLoginId($login_id);
        if($mailcheck == false) return "error:: '".$login_id."' is not user";

        // 2. 해당 유저 정보(id/pw)를 DB에서 가져움
        $input_pw = hash('sha256', $pw);
        $user_pw = Common::getUserPassword($login_id);

        // 3. 비밀번호가 해당 회원과 일치하는지 확인
        if(strcmp($user_pw,$input_pw)) return "error:: password is not correct";

        // 4. user information 가져옴
        $id = Common::getUserId($login_id);

        // 5. 세션에 유저 정보 저장
        $_SESSION['login_type'] = 'user';
        $_SESSION['user_id'] = $id['id'];

        // 6. DB에 유저 로그인 정보 저장

        return "success";

    }


}
