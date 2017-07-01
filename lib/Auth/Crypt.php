<?php

namespace Auth;

/**
 * 인증의 암호화 관련 함수
 */
class Crypt
{

    /**
     * RSA 공개키 암호화 함수
     * @param var $plaintext 평문 텍스트
     * @return var 암호화 후 인코딩(BASE64)된 텍스트
     */
    public static function rsaEncrypt($plaintext){

        // 공개키 파일 읽어옴
        $pubkey = file_get_contents(__DIR__.'/../../auth/ssl/rightpoll_pub.pem');

        // 공개키의 PEM 형식 디코딩
        $pubkey_decoded = $pubkey;
        $pubkey_decoded = openssl_pkey_get_public($pubkey);
        if ($pubkey_decoded === false) return "Public Key Decoding Fail";

        // 공개키로 평문 암호화
        $status = openssl_public_encrypt($plaintext, $ciphertext, $pubkey_decoded);
        if (!$status || $ciphertext === false) return "Password Encrypt Fail";

        // 암호화된 텍스트를 BASE64로 암호화
        $encodedtext = base64_encode($ciphertext);

        return $encodedtext;
    }

    /**
     * RSA 개인키 복호화 함수
     * @param var $encodetext 암호화 후 인코딩(BASE64)된 텍스트
     * @return var 복호화된 평문 텍스트
     */
    public static function rsaDecrypt($encodetext){

        // 개인키 읽어옴
        $prikey = file_get_contents(__DIR__.'/../../auth/ssl/rightpoll.pem');

        // 개인키의 PEM 형식 디코딩
        $privkey_decoded  = $prikey;
        $privkey_decoded = openssl_pkey_get_private($prikey);
        if ($privkey_decoded === false) return "Private Key Decoding Fail";

        //BASE64로 인코딩된 텍스트 디코딩
        $decodedtext = base64_decode($encodetext);

        // return "encoded:: \n".$encodetext."\nencrypted::\n".$decodedtext;

        //디코딩된 텍스트를 평문으로 복호화
        $status = openssl_private_decrypt($decodedtext, $plaintext, $privkey_decoded);
        openssl_pkey_free($privkey_decoded);
        if (!$status || $plaintext === false) return "Password Decrypt Fail";

        return $plaintext;
    }
}
