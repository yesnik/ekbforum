<?php
require "../config/config.php";
require "../main/database.php";
require "../utils/DatabasePopulator.php";

$db = Database::getConnection();
$pop = new DatabasePopulator();

$themesToInsert = 10;

$query = 'INSERT INTO themes (user_id, title, content, created_at, comments_num) VALUES ';
while ($themesToInsert > 0) {
    $query .= '("' .
      implode('", "', array(
          $pop->getInt(1, 20),
          $pop->getString(),
          $pop->getText(),
          $pop->getDatetime(),
          $pop->getInt()
        )) . '"),';

    $themesToInsert--;
}
$query = rtrim($query, ',');

$stmt = $db->query($query);

if ($stmt) {
    echo 'В таблицу "themes" успешно вставлено строк: ' . $stmt->rowCount();
}
