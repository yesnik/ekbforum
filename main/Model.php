<?php
namespace main;

use PDO;

class Model
{
    private $table;
    private $querySet;
    private $pdoStmt;

    public function __construct ($className)
    {
        $wasFound = preg_match('/(\w+)(Model|Controller|View)/', $className, $matches);
        if ($wasFound) {
            $this->table = strtolower($matches[1]) . 's';
        } else {
            $this->table = strtolower($className) . 's';
        };

    }

    public function getAll ()
    {
        global $db;
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}