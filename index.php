<?php

if ( !extension_loaded('pdo') ) {
    echo "Подключите PDO для mysql";
}

require 'app/bootstrap.php';

use app\cars;

$a = new CarModel();

//echo '$controller: ' . $controller;
//echo '$action: ' . $action;

//$carController = new CarController();



/*
require 'templates/head.php';

$stmt = $db->query('SELECT * FROM forum_posts');

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    var_dump($row);
}

require 'templates/footer.php';
*/
