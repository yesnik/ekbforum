<?php
namespace main;

use PDO;
use utils\Utils;

class Model
{
    private $table;
    private $querySet;
    private $pdoStmt;

    public function __construct ($className)
    {
        $entityName = Utils::getEntityName($className);
        if ($entityName) {
            $this->table = $entityName . 's';
        } else {
            $this->table = strtolower($className) . 's';
        }
    }

    public function getAll ()
    {
        global $db;
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById ($id)
    {
        global $db;
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}