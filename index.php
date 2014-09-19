<?php

if ( !extension_loaded('pdo') ) {
    echo "Подключите PDO для mysql";
}
require 'config/config.php';
require 'main/bootstrap.php';

use apps\car\CarController;
use apps\site\SiteController;
//use apps\car\CarModel;


$controller = new CarController();
$vars = array();
$vars['cars'] = array(
    array(
        'id' => 1,
        'title' => 'BMW',
        'color' => 'red'
    ),
    array(
        'id' => 2,
        'title' => 'Audi',
        'color' => 'black'
    ),
);



$content = $controller->index();

//$content = $controller->view->parse($vars);

$mainController = new SiteController();
echo $mainController->main($content);




//ob_start();


//$html = ob_get_clean();


//ob_end_flush();

//$controller = new CarController();
//$controller->index();

//$model = new CarModel();
//$rows = $model->getAll();
//var_dump($rows);




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
