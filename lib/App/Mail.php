<?php

namespace App;

/**
 * 메일 설정 / 발송 관련 클래스
 */

use PHPMailer;

class Mail
{

    /**
     * 메일발송하기 (참조:http://www.coolio.so/php에서-smtpgmail-메일발송/)
     * @param var $SUBJECT 메일 제목
     * @param var $CONTENT 메일 본문
     * @param var $MAILTO 받는 사람 메일 주소
     * @param var $MAILTONAME 받는 사람 이름
     * @return var 발송 결과
     */
    public static function sendMail($SUBJECT, $CONTENT, $MAILTO, $MAILTONAME){

        $EMAIL = SMTP_USER;
        $NAME = SMTP_NAME;

        $mail = new PHPMailer();
        $body = $CONTENT;

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->Host       = "www.manifesto-direct.com"; // SMTP server
        // $mail->SMTPDebug  = 3;                     // enables SMTP debug information (for testing)
        $mail->CharSet    = "utf-8";
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
        $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
        $mail->Username   = SMTP_USER;  // GMAIL username
        $mail->Password   = SMTP_PASSWORD;       // GMAIL password

        $mail->SetFrom($EMAIL, $NAME);

        $mail->AddReplyTo($EMAIL, $NAME);

        $mail->Subject    = $SUBJECT;

        $mail->MsgHTML($body);

        $address = $MAILTO;
        $mail->AddAddress($address, $MAILTONAME);

        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
          } else {
            echo "Message sent!";
          }
        }
}
