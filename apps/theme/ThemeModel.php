<?php
namespace apps\theme;

use main\Model;
use \PDO;

class ThemeModel extends Model {
    public $table;
    public function __construct () {
        parent::__construct(__CLASS__);
    }

    public function getAll ()
    {
        global $db;
        $query = 'SELECT t.id, t.title, t.created_at, t.comments_num,
                u2.name, c2.created_at AS last_comment_created_at,
                u.name AS last_comment_name FROM ' . $this->table . ' t
            LEFT JOIN comments c2 ON c2.theme_id = t.id
            LEFT JOIN (
                SELECT MAX(c.created_at) as max_date, c.theme_id
                FROM comments c
                GROUP BY c.theme_id
            ) AS com ON t.id = com.theme_id
            LEFT JOIN users u ON u.id = c2.user_id
            LEFT JOIN users u2 ON u2.id = t.user_id
            WHERE c2.created_at = max_date
                OR c2.created_at IS NULL';
        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById ($id)
    {
        global $db;
        $query = 'SELECT t.*, u.name FROM ' . $this->table . ' t
            LEFT JOIN users u ON u.id = t.user_id
            WHERE t.id = :id';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}