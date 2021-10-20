<?php

define('HOST', '127.0.0.1');
define('PORT', '5432');
define('DB_NAME', 'test');
define('USER', 'dxrist');
define('PASS', '112233');

class DBconnector
{

    private static $_connect = null;

    public static function getConnection()
    {
        static $dsn = "pgsql: host=" . HOST . "; port=" . PORT . "; dbname=" . DB_NAME;
        static $pdo_option = [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION];
        if (self::$_connect === null) {
            self::$_connect = new PDO($dsn, USER, PASS, $pdo_option);
        }
        return self::$_connect;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
        throw new Exception("Обьект уже существует");
    }
}
