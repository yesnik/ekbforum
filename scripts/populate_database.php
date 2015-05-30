<?php

require "../config/config.php";
require "../main/database.php";
require "../utils/DatabasePopulator.php";
require "../utils/ParseArgv.php";

use utils\ParseArgv;

$db = Database::getConnection();
$pop = new DatabasePopulator();

$args = (new ParseArgv())->params();
$themesToInsert = array_key_exists('n', $args) && is_numeric($args['n']) ? $args['n'] : 11;

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
    echo "In table 'themes' was successfully inserted: " . $stmt->rowCount() . " rows";
}
