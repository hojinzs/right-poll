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

        $code = rand(00000,99999);
        $contents = "
        공약지킴이 가입 인증 메일<br>
        <h1>보안 코드</h1><br>
        다음 보안코드를 사용해 회원 가입을 진행해주세요.<br>
        보안 코드: <b>".$code."</b><br>
        <br>
        감사합니다.<br>
        ";
        $subject = "공약지킴이 가입 인증 코드";

        $sendResult = Mail::sendMail($subject,$contents,$email,$email);

        if ($sendResult = 'Message sent!') {
            return 'success';
        }

        return $sendResult;
    }
}
