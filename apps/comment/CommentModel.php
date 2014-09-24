<?php
namespace apps\comment;

use main\Model;
use \PDO;

class CommentModel extends Model {
    public function __construct () {
        parent::__construct(__CLASS__);
    }

    public function getAll()
    {
        global $db;
        $query = "SELECT c.id, c.theme_id, c.created_at, a.name FROM " . $this->table . " c
                LEFT JOIN users a ON a.id = c.user_id";
        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getForTheme($themeId)
    {
        global $db;
        $query = "SELECT c.id, c.theme_id, c.comment, c.created_at, u.name, u.created_at AS user_created_at
                FROM " . $this->table . " c
                LEFT JOIN users u ON u.id = c.user_id
                WHERE theme_id = :theme_id
                ORDER BY created_at ASC";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':theme_id', $themeId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function increaseCommentCounter($id)
    {
        global $db;
        $query = 'SET @counter := (SELECT comments_num FROM themes WHERE id = :id);
            UPDATE themes SET comments_num = @counter + 1 WHERE id = :id';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

}