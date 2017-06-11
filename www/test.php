<?php require_once __DIR__ . '/../core/init.php';?>
<?php
$title = "TEST";
include 'head.php';

function getServerInfo()
{
    $dir= __DIR__;
    $inipath = '/../config.ini';
    $ini_array = parse_ini_file($dir.$inipath);

    define("FILE", $ini_array['FILESERVER'].$ini_array['FILESERVER_DIR']."/");

};

getServerInfo();

$file = "profile_stevelee.jpg";

?>

<img src="<?=FILE.$file?>">
