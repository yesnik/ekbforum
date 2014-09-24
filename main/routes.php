<?php

//В зависимости от uri происходит определение контроллера и экшена

$uri = isset($_REQUEST['uri']) ? $_REQUEST['uri'] : '';
$id = null;

if ($uri) {
    $uriArr = explode('/', $uri);
    if (sizeof($uriArr) > 1 && !empty($uriArr[1])) {
        $controllerName = $uriArr[0];
        $actionName = $uriArr[1];
    } else {
        $controllerName = $uriArr[0];
        $actionName = 'index';
    }
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