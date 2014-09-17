<?php

class Database {
    static $db;
    public static function getConnection ()
    {
        if (self::$db) {
            return self::$db;
        }

        $host = 'localhost';
        $dbname = 'test';
        $user = 'root';
        $password = '';

        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
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

