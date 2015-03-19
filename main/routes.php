<?php

// В зависимости от uri, который устанавливается при помощи .htaccess, 
// происходит определение контроллера и экшена
$uri = isset($_REQUEST['uri']) ? $_REQUEST['uri'] : '';
$id = null;

if ($uri) {
    $uriArr = explode('/', $uri);
    //Первая часть uri - имя контроллера
    if ($uriArr[0]) {
        $controllerName = $uriArr[0];
    }
    //Вторая часть uri - имя экшена
    if (!empty($uriArr[1])) {
        $actionName = $uriArr[1];
    } else {
        $actionName = 'index';
    }
    //Третья часть - id сущности
    //Пример: /theme/view/2
    if (isset($uriArr[2]) && is_numeric($uriArr[2])) {
        $id = $uriArr[2];
    }
} else {
    $actionName = 'index';
    $controllerName = 'theme';
}

//Если совместно с действием передан id, то передаем его в контроллер
if ($id != null && is_numeric($id)) {
    $actionMethod = $actionName . "($id)";
} else {
    $actionMethod = $actionName . "()";
}

$controllerFilePath = '\\apps\\' . $controllerName . '\\' . $controllerName . 'Controller';
