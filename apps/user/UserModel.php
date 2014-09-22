<?php
namespace apps\user;

use main\Model;
use \PDO;

class UserModel extends Model {
    protected $table;
    public function __construct () {
        parent::__construct(__CLASS__);
    }

    public function getAll ()
    {
        global $db;
        /*
        $query = 'SELECT t.id, t.title, t.content, comments_num, a.name FROM ' . $this->table . ' t ' .
        ' LEFT JOIN authors a ON a.id = t.author_id';
        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        */
    }
}