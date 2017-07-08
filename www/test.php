<?php require_once __DIR__ . '/../core/init.php';

$result = \App\Mail::sendMail(
    $subject = "abc",
    $contents = "defg",
    $mailto = "hojinzs@gmail.com",
    $mailtoname = "Steve Lee"
);

return $result;
