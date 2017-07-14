<?php require_once __DIR__ . '/../core/init.php';
include 'head.php';
include 'new_nav.php';
?>

<script>

</script>

<form action="/pst/register/mail_send.php" method="post">
    <input name="email" type="email" placeholder="email send test"></input>
    <input type="submit" value="MAIL SEND"></input>
</form>

<form action="/pst/register/code_check.php" method="post">
    <input name="code" type="text" maxlength="5" placeholder="verify code test"></input>
    <input type="submit" value="CODE SEND"></input>
</form>

<form action="/pst/register/nick_check.php" method="post">
    <input name="nick" type="text" maxlength="12" placeholder="duplicate nick test"></input>
    <input type="submit" value="NICK SEND"></input>
</form>
