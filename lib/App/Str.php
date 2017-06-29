<?php

namespace App;

/**
 * 문자열 처리나 재가공을 위한 함수 목록
 */
class Str
{
    /**
     * IP주소 가림 처리
     * 레퍼런스: http://blog.tjsrms.me/php-ip%EC%A3%BC%EC%86%8C-%EA%B0%90%EC%B6%94%EA%B8%B0/
     * @param [var] $ip 가리고자 하는 IP 주소
     * @return [var] 가려진 IP 주소 (127.0.$.$)
     */
    public static function replaceIpAddress($ip)
    {
        if (empty($ip)) {
            return false;
        }

        if( is_numeric($ip) ) {
    	$ip = long2ip($ip);
        }

        return preg_replace("/([0-9]+).([0-9]+).([0-9]+).([0-9]+)/", "\\1.\\2.&#9825;.&#9825;", $ip);
    }

}
