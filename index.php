<?php

if ( !extension_loaded('pdo') ) {
    echo "Подключите PDO для mysql";
}
require 'config/config.php';
require 'main/bootstrap.php';

use apps\car\CarController;
use apps\site\SiteController;
use utils\Utils;

var_dump($actionName);

//Формирование контента страницы
$controller = new $controllerFilePath();

$vars = array();
eval('$vars["content"] = $controller->' . $actionMethod . ';');

//Добавляем скрипты
$vars['js'] = Utils::getScripts($controllerName, $actionName);

//Формирование шаблона сайта
$mainController = new SiteController();
echo $mainController->main($vars);