<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

$whoops = new \Whoops\Run();
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();

function db(): \PDO
{
    static $pdo;

    if (!$pdo) {
        $dbname = 'rightpoll';
        $host = 'localhost';
        $dsn = "mysql:dbname={$dbname};host={$host};port=33060;charset=utf8mb4";
        $option = [
            \PDO::ATTR_TIMEOUT => 5,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_EMULATE_PREPARES => false,
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = '+09:00'",
        ];

       $pdo = new \PDO($dsn, 'root', 'Mandarin:0714', $option);
       $wait_timeout = php_sapi_name() == 'cli' ? 15 : 5;
       $pdo->query("SET SESSION wait_timeout = {$wait_timeout}");
    }

    return $pdo;
}
