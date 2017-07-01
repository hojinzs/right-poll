<?php

/**
 * 인증서 전송
 */

$pubkey = file_get_contents(__DIR__.'/../../auth/ssl/rightpoll_pub.pem');
echo $pubkey;
