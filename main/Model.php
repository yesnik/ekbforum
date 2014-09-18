<?php
namespace main;

class Model
{
    private $table;
    private $querySet;

    public function __construct ($params)
    {
        $this->table = $params['table'];
    }

    public function getAll ()
    {
        global $db;
        $query = 'SELECT * FROM ' . $this->table;
        echo 'Query: ' . $query;
        $stmt = $db->query($query);
        return $stmt;
    }
}