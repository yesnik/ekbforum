<?php

use apps\site\SiteController;
use utils\Utils;

require 'main/bootstrap.php';

$vars = array();

$controller = new $controllerFilePath();

eval('$vars["content"] = $controller->' . $actionMethod . ';');

//Добавляем скрипты
$vars['js'] = Utils::getScripts($controllerName, $actionName);

//Формирование шаблона сайта
$mainController = new SiteController();
echo $mainController->main($vars);
