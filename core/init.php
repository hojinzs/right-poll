<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

$whoops = new \Whoops\Run();
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();

getDbInfo();


/**
 * getDBinfo
 */
function getDbInfo(){
    $ini_array = parse_ini_file("../config.ini");

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
