<?php

//В зависимости от uri происходит определение контроллера и экшена

$uri = isset($_REQUEST['uri']) ? $_REQUEST['uri'] : '';
$id = null;

if ($uri) {
    $uriArr = explode('/', $uri);
    if (sizeof($uriArr) > 1 && !empty($uriArr[1])) {
        $controller = $uriArr[0];
        $action = $uriArr[1];
    } else {
        $controller = $uriArr[0];
        $action = 'index';
    }
    if (isset($uriArr[2]) && is_numeric($uriArr[2])) {
        $id = $uriArr[2];
    }
} else {
    $action = 'index';
    $controller = 'theme';
}

//Если совместно с действием передан id, то передаем его в контроллер
if ($id != null && is_numeric($id)) {
    $action .= "($id)";
} else {
    $action .= "()";
}

$controllerName = '\\apps\\' . $controller . '\\' . $controller . 'Controller';