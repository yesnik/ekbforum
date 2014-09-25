<?php
namespace main;

use PDO;
use utils\Utils;

class Model
{
    public $table;
    private $querySet;
    private $pdoStmt;

    public function __construct($className)
    {
        $entityName = Utils::getEntityName($className);
        if ($entityName) {
            $this->table = $entityName . 's';
        } else {
            $this->table = strtolower($className) . 's';
        }
    }

    public function getAll()
    {
        global $db;
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        global $db;
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getWhere($columnName, $columnValue)
    {
        global $db;
        $query = 'SELECT * FROM ' . $this->table . ' WHERE ' . $columnName . ' = :columnValue';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':columnValue', $columnValue);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Создает запись в таблице модели на основании массива переданных параметров
     * @param $vars array
     * Пример: $vars = array('user_id' => 10, 'comment' => 'Привет')
     * Ключи массива должны соответствовать названиям полей в таблице
     *
     * @return bool|string
     */
    public function create($vars)
    {
        global $db;
        $arKeys = array_keys($vars);
        $keysStr = join(',', $arKeys);
        $arValues = array_values($vars);
        $valuesNum = sizeof($arValues);
        $valuesPattern = rtrim(str_repeat("?,", $valuesNum), ',');
        $query = 'INSERT INTO ' . $this->table . ' (' . $keysStr . ') VALUES (' . $valuesPattern . ' )';
        $stmt = $db->prepare($query);
        $wasInserted = $stmt->execute($arValues);
        if ($wasInserted) {
            return $db->lastInsertId();
        }
        return FALSE;
    }
}