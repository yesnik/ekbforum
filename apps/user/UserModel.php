<?php
namespace apps\user;

use main\Model;
use \PDO;

/**
 * Класс для работы с пользователями
 * Class UserModel
 *
 * @package apps\user
 */
class UserModel extends Model {
    public function __construct () {
        parent::__construct(__CLASS__);
    }

    /**
     * Добавление пользователя в таблицу users
     * @param $userName
     *
     * @return string
     */
    public function create ($userName)
    {
        global $db;
        $query = 'INSERT INTO ' . $this->table . ' (name) VALUES (:name)';
        $stmt = $db->prepare($query);
        $wasInserted = $stmt->execute(array('name' => $userName));
        if ($wasInserted) {
            return $db->lastInsertId();
        }
        return false;
    }
}