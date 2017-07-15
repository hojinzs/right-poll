<?php
use User;
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

$whoops = new \Whoops\Run();
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();

getDbInfo();
getServerInfo();
getMailSetting();

session_set_cookie_params(7200, '/', DOMAIN);
session_start();
getUserInfo();

/**
 * [getUserInfo description]
 */
function getUserInfo(){

    if (!isset($_SESSION['login_type'])) {
        $id = session_id();

        # login 상태가 아니라면
        $_SESSION['id'] = $id;
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        User\Guest::setNewGuestUser();
    }
}

/**
 * getDBinfo
 */
function getDbInfo()
{

    $dir= __DIR__;
    $inipath = '/../config.ini';
    $ini_array = parse_ini_file($dir.$inipath);

    define("DB_NAME", $ini_array['NAME']);
    define("DB_HOST", $ini_array['HOST']);
    define("DB_PORT", $ini_array['PORT']);
    define("DB_USERNAME", $ini_array['USERNAME']);
    define("DB_PASSWORD", $ini_array['PASSWORD']);

    return;
}

/**
 * connect DB use PDO
 * @return PDO response queryresult
 */
function db(): \PDO
{

    static $pdo;

    if (!$pdo) {
        $dbname = DB_NAME;
        $host = DB_HOST;
        $port = DB_PORT;
        $id = DB_USERNAME;
        $password = DB_PASSWORD;
        // $dsn = "mysql:dbname={$dbname};host={$host};port={$port};charset=utf8mb4";
        $dsn = "mysql:host={$host};port={$port};charset=utf8mb4";
        $option = [
            \PDO::ATTR_TIMEOUT => 5,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_EMULATE_PREPARES => false,
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = '+09:00'",
        ];

       $pdo = new \PDO($dsn, $id, $password, $option);
       $wait_timeout = php_sapi_name() == 'cli' ? 15 : 5;
       $pdo->query("SET SESSION wait_timeout = {$wait_timeout}");
    }

    return $pdo;
}

function getMailSetting()
{
    $inipath = '/../config.ini';
    $ini_array = parse_ini_file(__DIR__.$inipath);

    define("SMTP_USER",$ini_array['SMTP_USER']);
    define("SMTP_NAME",$ini_array['SMTP_NAME']);
    define("SMTP_PASSWORD",$ini_array['SMTP_PASSWORD']);

}

/**
 * get server info (File, batch etc...)
 */
function getServerInfo()
{
    // $dir= __DIR__;
    $inipath = '/../config.ini';
    $ini_array = parse_ini_file(__DIR__.$inipath);

    define("DOMAIN",$ini_array['DOMAIN']);
    define("FILE", $ini_array['HTTP'].$ini_array['FILE_SUBDOMAIN'].".".$ini_array['DOMAIN'].$ini_array['FILE_DIR']);

    switch ($ini_array['SERVICE']) {
        case 'product':
            # 서비스 타입이 'product'일 경우
            define("SERVICE","product");
            break;

        case 'develop':
            # 서비스 타입이 'develop'일 경우
            define("SERVICE","develop");
            break;

        default:
            # 서비스 타입이 이상할 경우
            define("SERVICE","develop");
            break;
    }

};
