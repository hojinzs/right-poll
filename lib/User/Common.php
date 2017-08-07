<?php

namespace User;

/**
 * 유저 정보의 조회 / 컨트롤 관련 클래스
 */
class Common
{

    /**
     * 존재하는 USER idx(번호) 인지 확인
     * @param var $idx 유저 아이디
     * @return bool true=있음/false=없음
     */
    public static function getCurrentUserIdx($idx){
        $query =
            "SELECT
                u.idx
            FROM
                rightpoll.user u
            WHERE
                u.idx = :idx
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':idx', $idx);
        $stmt->execute();
        $row = $stmt->fetch();

        if($row == null){
            return false;
        } else {
            return true;
        }
    }

    /**
     * 존재하는 USER user_id(로그인 아이디)인지 확인
     * @param var $user_id 유저 아이디
     * @return bool true=있음/false=없음
     */
    public static function getCurrentLoginId($user_id){
        $query =
            "SELECT
                u.idx
            FROM
                rightpoll.user u
            WHERE
                u.user_id = :user_id
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $row = $stmt->fetch();

        if($row == null){
            return false;
        } else {
            return true;
        }
    }

    /**
     * 이미 가입한 회원 중 중복된 이메일을 사용하는 회원이 있는지 조회함.
     * @param var $email 이메일 주소
     * @return bool false="조회 결과 없음",true="조회 결과 있음"
     */
    public static function getCurrentUserEmail($email){

        // DB에서 $email과 동일한 이메일을 사용하는 회원 조회
        $query =
            "SELECT
                u.idx
            FROM
                rightpoll.user u
            WHERE
                u.email = :email
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch();

        if($row == null){
            return false;
        } else {
            return true;
        }
    }

    /**
     * 이미 가입한 회원 중 중복된 닉네임을 사용하는 회원이 있는지 조회 함.
     * @param var $nick 중복 체크할 닉네임
     * @return bool false="조회 결과 없음", true="조회 결과 있음"
     */
    public static function getCurrentUserNick($nick){

         // DB에서 $email과 동일한 닉네임을 사용하는 회원 조회
         $query =
             "SELECT
                 u.idx
             FROM
                 rightpoll.user u
             WHERE
                 u.nick = :nick
             ";
         $stmt = \db()->prepare($query);
         $stmt->bindParam(':nick', $nick);
         $stmt->execute();
         $row = $stmt->fetch();

         if($row == null){
             return false;
         } else {
             return true;
         }
     }

    /**
    * [getUserPassword description]
    * @param [type] $login_id [description]
    * @return [type] [description]
    */
    public static function getUserPassword($login_id){
        $query =
            "SELECT
                u.password
            FROM
                rightpoll.user u
            WHERE
                u.user_id = :login_id
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':login_id', $login_id);
        $stmt->execute();
        $row = $stmt->fetch();

         return $row[0];
    }

    /**
     * 로그인 ID로 유저 ID 가져오기
     * @param var $login_id 검색할 유저 이메일
     * @return var 유저 ID
     */
    public static function getUserId($login_id){
        $query =
            "SELECT
                u.idx
            FROM
                rightpoll.user u
            WHERE
                u.user_id = :user_id
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':user_id', $login_id);
        $stmt->execute();
        $row = $stmt->fetch();

        return $row['idx'];
    }

    /**
    * 유저 데이터 불러오기
    * @param var $user_id 불러올 사용자 ID
    * @return array (email,nick)
    */
    public static function getUserInfomation($user_id){
        $query =
            "SELECT
                u.user_id,
                u.email,
                u.nick
            FROM
                rightpoll.user u
            WHERE
                u.user_id = :user_id
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $row = $stmt->fetch();

        return $row;
    }
    
    /**
     * 인증 이메일 발송
     * @param var $email 인증메일을 발송할 이메일
     * @return var 발송 결과(success,fail,error:: exist email)
     */
    public static function sendVerifiyEmail($email){

        // 인증 코드 생성
        $code = rand(10000,99999);
        $_SESSION['findpw']['email'] = $email;
        $_SESSION['findpw']['issued_code'] = $code;

        // 이메일 발송 준비
        $contents = "
        공약지킴이 인증 메일<br>
        <h1>보안 코드</h1><br>
        다음 보안코드를 사용해 비미ㄹ버ㄴ호 차ㅈ기르ㄹ 진행해주세요.<br>
        보안 코드: <b>".$code."</b><br>
        <br>
        감사합니다.<br>
        ";
        $subject = "공약지킴이 가입 인증 코드";

        // 이메일 발송 결과 호출
        $sendResult = \App\Mail::sendMail($subject,$contents,$email,$email);

        // 발송에 성공했다면 success
        if ($sendResult = 'Message sent!') {
            return 'success';
        }

        // 발송 결과가 success가 아니라면, 발송 에러를 출력한다.
        return $sendResult;
    }

    /**
     * 입력한 인증코드가 발급된 인증코드와 일치하는지 확인
     * @param var $code 입력된 인증코드
     * @param var $email Email for Verify
     * @return var {success} or {error:: message}
     */
    public static function matchVerifyCode($code,$email){

        // 세션에 register_code가 발급 되었는지 확인
        if(!isset($_SESSION['findpw']['issued_code'])){return "error:: register_code is not issued";}
        if(!isset($_SESSION['findpw']['email'])){return "error:: email is not issued";}
		
		// 입력된 email이 $issued_email 일치하는지 체크
        $inputEmail = $email;
        $issuedEmail = $_SESSION['findpw']['email'];
        if($inputEmail != $issuedEmail){
            # 일치하지 않을 경우 error
            return "error:: email is not matched";
        }

        // 입력된 코드가 issued_code와 일치하는지 체크
        $inputCode = $code;
        $issuedCode = $_SESSION['findpw']['issued_code'];
        if($inputCode != $issuedCode){
            # 일치하지 않을 경우 error
            return "error:: register_code is not matched";
        }
        
        return "success";
    }


}
