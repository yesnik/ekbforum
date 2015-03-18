<?php

use apps\site\SiteController;
use utils\Utils;

require 'main/bootstrap.php';

//Формирование контента страницы
$controller = new $controllerFilePath();

$vars = array();
eval('$vars["content"] = $controller->' . $actionMethod . ';');

//Добавляем скрипты
$vars['js'] = Utils::getScripts($controllerName, $actionName);

//Формирование шаблона сайта
$mainController = new SiteController();
echo $mainController->main($vars);
