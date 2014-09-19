<?php

if ( !extension_loaded('pdo') ) {
    echo "Подключите PDO для mysql";
}
require 'config/config.php';
require 'main/bootstrap.php';

use apps\car\CarController;
use apps\site\SiteController;

var_dump($action);


//Формирование контента страницы
$controller = new $controllerName();

$content = '';
eval('$content = $controller->' . $action . ';');

//Формирование шаблона сайта
$mainController = new SiteController();
echo $mainController->main($content);