<?php

class Database {
    static $db;
    public static function getConnection ()
    {
        if (self::$db) {
            return self::$db;
        }
        try {
            $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("set names utf8");
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
        self::$db = $db;
        return $db;
    }
}

