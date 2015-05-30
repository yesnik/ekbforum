<?php

require "../config/config.php";
require "../main/database.php";
require "../utils/DatabasePopulator.php";
require "../utils/ParseArgv.php";

use utils\ParseArgv;

$db = Database::getConnection();
$pop = new DatabasePopulator();
$args = (new ParseArgv())->params();

/*
There are errors on inserting big amount of data in DB:
- Warning: PDO::query(): MySQL server has gone away in ...
- Warning: PDO::query(): Error reading result set's header in ...
So we will insert rows by batches
*/
$batchSize = array_key_exists('batch', $args) && is_numeric($args['batch']) ? $args['batch'] : 800;

$themesToInsert = array_key_exists('n', $args) && is_numeric($args['n']) ? $args['n'] : 11;

function insertRows($amount)
{
    global $db;
    global $pop;

    $query = 'INSERT INTO themes (user_id, title, content, created_at, comments_num) VALUES ';
    while ($amount > 0) {
        $query .= '("' .
          implode('", "', array(
              $pop->getInt(1, 20),
              $pop->getString(),
              $pop->getText(),
              $pop->getDatetime(),
              $pop->getInt()
            )) . '"),';

        $amount--;
    }
    $query = rtrim($query, ',');

    $stmt = $db->query($query);

    if ($stmt) {
        echo "In table 'themes' was successfully inserted: " . $stmt->rowCount() . " rows\n";
    }
}

$processed = 0;

if ( $themesToInsert < $batchSize ) {
    insertRows($themesToInsert);
} else {
    $steps = floor($themesToInsert / $batchSize);
    echo 'Steps: '. $steps . "\n";
    if ($steps < 2) {
        insertRows($batchSize);
        insertRows($themesToInsert - $batchSize);
    } else {
        $stepsDone = 0;
        while ($stepsDone < $steps) {
            insertRows($batchSize);
            $stepsDone++;
            sleep(3);
        }
        insertRows($themesToInsert - ($batchSize * $steps));
    }
}
