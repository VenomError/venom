<?php

namespace VenomError\Venom\Helper;

use VenomError\Venom\Helper\Env;

class DB
{

    private static $host;
    private static $port = 3306;
    private static $user;
    private static $password;
    private static $database;

    private static $conn;

    private static $sql;
    public static function setHost(?string $host): void
    {
        self::$host = $host;
    }

    public static function setPort(?int $port): void
    {
        self::$port = $port;
    }
    public static function setUser(?string $user): void
    {
        self::$user = $user;
    }
    public static function setPassword(?string $password): void
    {
        self::$password = $password;
    }

    public static function setDatabase(?string $database): void
    {
        self::$database = $database;
    }

    public static function getHost()
    {
        return self::$host;
    }

    public static function getPort()
    {
        return self::$port;
    }

    public static function getUser()
    {
        return self::$user;
    }

    public static function getPassword()
    {
        return self::$password;
    }

    public static function getDatabase()
    {
        return self::$database;
    }

    public function __construct()
    {
        self::setHost(Env::get('DB_HOST'));
        self::setPort(Env::get('DB_PORT'));
        self::setUser(Env::get('DB_USERNAME'));
        self::setPassword(Env::get('DB_PASSWORD'));
        self::setDatabase(Env::get('DB_NAME'));
    }

    public static function getConnection()
    {
        $host = self::getHost();
        $port = self::getPort();
        $user = self::getUser();
        $password = self::getPassword();
        $database = self::getDatabase();
        try {
            // self::$conn = new \mysqli($host, $user, $password, $database, $port);
            self::$conn = new \PDO("mysql:host=$host:$port;dbname=$database", $user, $password);
            self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return self::$conn;
        } catch (\PDOException $e) {
            print "Connection failed: " . $e->getMessage() . "\n";
            return false;
        }
    }
    public static function getSqlConnection()
    {
        $host = self::getHost();
        $port = self::getPort();
        $user = self::getUser();
        $password = self::getPassword();
        try {
            // self::$conn = new \mysqli($host, $user, $password, $database, $port);
            self::$conn = new \PDO("mysql:host=$host:$port", $user, $password);
            self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return self::$conn;
        } catch (\PDOException $e) {
            print "Connection failed: " . $e->getMessage() . "\n";
            return false;
        }
    }

    public function __destruct()
    {
        self::$conn = null;
    }

}
