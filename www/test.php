<?php require_once __DIR__ . '/../core/init.php';
include 'head.php';
include 'new_nav.php';

if(isset($_SESSION['register'])){
    unset($_SESSION['register']);
}

$_SESSION['register']['stage'] = "3";
$_SESSION['register'][1] = "1";
$_SESSION['register'][2] = "2";
$_SESSION['register'][3] = "3";

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

<?php print_r($_SESSION['register']);?>
<br>
<?php foreach ($_SESSION['register'] as $key) {
    echo $key;
}
?>
