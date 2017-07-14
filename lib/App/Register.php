<?php

namespace App;

/**
 * 회원가입 관련 클래스
 */
class Register
{
    /**
     * 인증 이메일 발송
     * @param var $email 인증메일을 발송할 이메일
     * @return var 발송 결과(success,fail)
     */
    public static function sendVerifiyEmail($email){

        // 이미 해당 메일로 가입한 회원이 있는지 확인한다.
        $mailcheck = Register::getCurrentUserEmail($email);
        if($mailcheck == true){
            return "error";
        }

        // 인증 코드 생성
        $code = rand(00000,99999);
        $_SESSION['register_code'] = $code;

        // 이메일 발송 준비
        $contents = "
        공약지킴이 가입 인증 메일<br>
        <h1>보안 코드</h1><br>
        다음 보안코드를 사용해 회원 가입을 진행해주세요.<br>
        보안 코드: <b>".$code."</b><br>
        <br>
        감사합니다.<br>
        ";
        $subject = "공약지킴이 가입 인증 코드";

        // 이메일 발송 결과 호출
        $sendResult = Mail::sendMail($subject,$contents,$email,$email);

        // 발송에 성공했다면 success
        if ($sendResult = 'Message sent!') {
            return 'success';
        }

        // 발송 결과가 success가 아니라면, 발송 에러를 출력한다.
        return $sendResult;
    }


    /**
     * 이미 가입한 회원 중 중복된 이메일을 사용하는 회원이 있는지 조회함.
     * @param var $email 이메을 주소
     * @return bool fales="조회 결과 없음",true="조회 결과 있음"
     */
    public static function getCurrentUserEmail($email){

        // DB에서 $email과 동일한 이메일을 사용하는 회원 조회
        $query =
            "SELECT
                u.id
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
     * 입력한 인증코드가 발급된 인증코드와 일치하는지 확인
     * @param var $code 입력된 인증코드
     * @return var {success} or {error:: message}
     */
    public static function matchVerifyCode($code){

        // 세션에 register_code가 발급 되었는지 확인
        if(!isset($_SESSION['register_code'])){
            return "error:: register_code is not issued";
        }

        $inputCode = $code;
        $issuedCode = $_SESSION['register_code'];

        // 입력된 코드가 register_code와 일치하는지 체크
        if($inputCode == $issuedCode){
            # 일치할 경우 success
            return "success";
        } else {
            # 일치하지 않을 경우 error
            return "error:: register_code is not matched";
        }
    }
}
