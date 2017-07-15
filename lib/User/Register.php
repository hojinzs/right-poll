<?php

namespace User;
use App;

/**
 * 회원가입 관련 클래스
 */
class Register
{
    /**
     * 인증 이메일 발송
     * @param var $email 인증메일을 발송할 이메일
     * @return var 발송 결과(success,fail,error:: exist email)
     */
    public static function sendVerifiyEmail($email){

        // 이미 해당 메일로 가입한 회원이 있는지 확인한다.
        $mailcheck = Common::getCurrentUserEmail($email);
        if($mailcheck == true){
            return "error:: exist email";
        }

        // 인증 코드 생성
        $code = rand(00000,99999);
        $_SESSION['register']['email'] = $email;
        $_SESSION['register']['issued_code'] = $code;

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
        $sendResult = App\Mail::sendMail($subject,$contents,$email,$email);

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
     * @return var {success} or {error:: message}
     */
    public static function matchVerifyCode($code){

        // 세션에 register_code가 발급 되었는지 확인
        if(!isset($_SESSION['register']['issued_code'])){
            return "error:: register_code is not issued";
        }

        $inputCode = $code;
        $issuedCode = $_SESSION['register']['issued_code'];

        // 입력된 코드가 register_code와 일치하는지 체크
        if($inputCode == $issuedCode){
            # 일치할 경우, register 단계를 추가하고 success
            $_SESSION['register']['checked_email'] = $_SESSION['register']['email'];
            return "success";
        } else {
            # 일치하지 않을 경우 error
            return "error:: register_code is not matched";
        }
    }

    /**
     * 닉네임 사용 가능 여부 (이미 중복되는 닉네임이 있는지) 확인
     * @param var $nick 체크할 닉네임
     * @return var 'ok'=사용 가능, 'exist nickname'= 존재하는 닉네임.
     */
    public static function checkCurrentNick($nick){

        // $nick 이 존재하는 닉네임인지 확인
        $result = Common::getCurrentUserNick($nick);

        if($result==true){
            # 닉네임 검색 결과가 있을 경우
            return "error:: exist nickname";
        } else {
            # 중복되는 닉네임이 없을 경우
            return "ok";
        }
    }

    /**
     * 회원 가입
     * @param var $email 가입할 이메일
     * @param var $nick 가입할 닉네임
     * @param var $password 로그인시 사용할 비밀번호
     */
    public static function setRegister($email,$nick,$password){
        // $_SESSION['register']가 설정 되어 있는지 확인.

        // STAGE 1 :: 이메일 중복 여부 재확인
        $check_mail = Common::getCurrentUserEmail($email);
        if($check_mail == true) return "error:: exist email";

        // STAGE 2 :: 닉네임 중복 여부 재확인
        $check_nick = Common::getCurrentUserNick($nick);
        if($check_nick == true) return "error:: exist nickname";

        // STAGE 3 :: 비밀번호 유효성 확인
        $check_pw = App\Str::checkPasswordStrength($password);
        if($check_pw == false) return "error:: not strength password";

        // 다 통과했다면 새로운 유저 생성
        $result = Common::setNewUser($email,$nick,$password);

        // 유저 생성 결과가 Success가 아니라면 에러문구 리턴
        if(!$result=="success") return $result;

        return "success";

    }
}
