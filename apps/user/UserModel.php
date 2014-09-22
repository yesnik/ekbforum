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

    }

    public function getUserByName($userName) {
        global $db;
        if (!$userName) {
            return false;
        }
        $query = "SELECT * FROM users WHERE name = :userName";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':userName', $userName, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}