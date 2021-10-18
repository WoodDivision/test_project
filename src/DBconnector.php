<?php

class DBconnector
{

    private static $_connect = null;

    public static function getConnection() : DBconnector
    {
        static $host = '127.0.0.1';
        static $port = '5432';
        static $db_name = 'test';
        static $user = 'dxrist';
        static $pass = '112233';
        static $dsn = "pgsql: host=$host; port=$port; dbname=$db_name";
        static $pdo_option = [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION];
        if (self::$_connect === null) {
            self::$_connect = new PDO($dsn, $user, $pass, $pdo_option);
            echo " соединение установлено 1";
        }
        return self::$_connect;
    }

    private function __construct()
    {
        
    }

    private function __clone()
    {
        
    }

    private function __wakeup()
    {
        throw new Exception("Обьект уже существует");
    }
}

$s1 = DBconnector::getConnection();
echo $s1;

$s2 = DBconnector::getConnection();
echo $s2;




